<?php
include('../banco/protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Seja seguro na Web</title>
    <link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../estilo/quizz.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>

</head>

<body>
    <h1>Quiz</h1>
    <h2>O que é Cyberbullying?</h2>
    <input type="hidden" value="<?php echo $_SESSION['id'] ?>" id="sessacao">


    <div id="quiz-container">
        <div id="question"></div>
        <div id="options"></div>
        <button id="next-button">Próxima Pergunta</button>
    </div>
    <div id="result" style="display: none;">
        <h2>Resultado</h2>
        <p>Acertos: <span id="score">0</span></p>
        <p>Status: <span id="status"></span></p>
        <button class="meu-botao" onclick="window.location.href='../paginasBanco/avaliacaoBD.php'">Sair</button>
    </div>

    <script>
        const questions = [
            {
                question: "Pergunta 1: O que é fazer coisas ruins na internet?",
                options: ["Falar com amigos de maneira legal.", "Usar computadores e celulares para fazer mal a alguém, ameaçar ou falar coisas ruins sobre eles.", "Descobrir como resolver problemas quando brigamos na internet."],
                answer: "Usar computadores e celulares para fazer mal a alguém, ameaçar ou falar coisas ruins sobre eles."
            },
            {
                question: "Pergunta 2: O que pode acontecer quando alguém é maltratado online de forma ruim?",
                options: ["Ficar mais amiguinho.", "Ficar mais confiante em si mesmo.", "Ficar triste e preocupado."],
                answer: "Ficar triste e preocupado."
            },
            {
                question: "Pergunta 3: O que devemos fazer para parar o cyberbullying na internet?",
                options: ["Não ligar para as mensagens más.", "Brincar e ser amigo online com os bullies.", "Contar a um adulto de confiança ou professor."],
                answer: "Contar a um adulto de confiança ou professor."
            }
        ];

        let currentQuestionIndex = 0;
        let score = 0;

        const questionElement = document.getElementById("question");
        const optionsElement = document.getElementById("options");
        const nextButton = document.getElementById("next-button");
        const resultElement = document.getElementById("result");
        const scoreElement = document.getElementById("score");
        const statusElement = document.getElementById("status");

        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }

        function showQuestion() {
            const currentQuestion = questions[currentQuestionIndex];
            questionElement.textContent = currentQuestion.question;
            optionsElement.innerHTML = "";

            const shuffledOptions = [...currentQuestion.options];
            shuffleArray(shuffledOptions);

            shuffledOptions.forEach(option => {
                const button = document.createElement("button");
                button.textContent = option;
                button.addEventListener("click", () => checkAnswer(option));
                optionsElement.appendChild(button);
            });

            if (currentQuestionIndex === questions.length - 1) {
                nextButton.textContent = "Ver Resultado";
            }
        }

        function checkAnswer(selectedOption) {
            const currentQuestion = questions[currentQuestionIndex];
            if (selectedOption === currentQuestion.answer) {
                score++;
            }
            currentQuestionIndex++;

            if (currentQuestionIndex < questions.length) {
                showQuestion();
            } else {
                showResult();
            }
        }

        async function showResult() {
            questionElement.style.display = "none";
            optionsElement.style.display = "none";
            nextButton.style.display = "none";
            resultElement.style.display = "block";

            scoreElement.textContent = score + " de " + questions.length;

            const passingScore = Math.floor(questions.length / 2);

            let status_cyberbullying;
            if (score >= passingScore) {
                status_cyberbullying = 'aprovado';
                statusElement.textContent = "Aprovado!";
                statusElement.style.color = "green";
            } else {
                status_cyberbullying = 'reprovado';
                statusElement.textContent = "Reprovado!";
                statusElement.style.color = "red";
            }

            const sessacao = document.getElementById('sessacao').value;

            let formData = new FormData();
            console.log(sessacao);
            formData.append("id", parseInt(sessacao));

            formData.append("status_cyberbullying", status_cyberbullying);
            let request = new XMLHttpRequest();
            request.open("POST", '../banco/stsCyberbullying.php');
            request.send(formData)
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status_cyberbullying == 200) {
                    console.log('ok test')
                    console.log(request.responseText)
                }
            }
        }

        nextButton.addEventListener("click", () => showQuestion());

        showQuestion();

        const retryButton = document.getElementById("retry-button");
        retryButton.addEventListener("click", () => restartQuiz());
    </script>
</body>

</html>