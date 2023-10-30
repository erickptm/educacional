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
    <h2>Jogos On-Line</h2>

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
                question: "Pergunta 1: Por que é legal conversar com as crianças sobre o que elas fazem na internet?",
                options: ["Para que os pais possam ajudar e proteger as crianças quando elas usam a internet.","Porque as crianças já sabem tudo sobre a internet.","Para que as crianças aprendam a ser independentes na internet."],
                answer: "Para que os pais possam ajudar e proteger as crianças quando elas usam a internet."
            },
            {
                question: "Pergunta 2: Ao jogar na internet, o que pode acontecer de ruim às crianças?",
                options: ["Ensinando sobre como se manter seguro online e dizendo regras.", "Colocando um robô para observar tudo o que fazem na internet.", "Deixando seus filhos compartilharem todas as informações online."],
                answer: "Ensinando sobre como se manter seguro online e dizendo regras."
            },
            {
                question: "Pergunta 3: Como podemos ajudar as crianças a se manterem seguras na internet?",
                options: ["A internet é sempre segura para crianças, então não precisa se preocupar.", "É legal aceitar todas as amizades online que aparecem.", "Devemos ensinar as crianças a não compartilharem informações pessoais na internet e a não conversarem com pessoas que não conhecem."],
                answer: "Devemos ensinar as crianças a não compartilharem informações pessoais na internet e a não conversarem com pessoas que não conhecem."
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

            let status_riscos;
            if (score >= passingScore) {
                status_riscos = 'aprovado';
                statusElement.textContent = "Aprovado!";
                statusElement.style.color = "green";
            } else {
                status_riscos = 'reprovado';
                statusElement.textContent = "Reprovado!";
                statusElement.style.color = "red";
            }

            const sessacao = document.getElementById('sessacao').value;

            let formData = new FormData();
             console.log(sessacao);
             formData.append("id", parseInt(sessacao));
 
             formData.append("status_riscos", status_riscos);
             let request = new XMLHttpRequest();
             request.open("POST", '../banco/stsRiscos.php');
             request.send(formData)
             request.onreadystatechange = function () {
                 if (request.readyState == 4 && request.status_riscos == 200) {
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