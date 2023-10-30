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
                question: "Pergunta 1: O que você deve fazer quando alguém em um jogo online pede suas informações pessoais em troca de prêmios ou dinheiro?",
                options: ["Dizer não para compartilhar suas informações e contar para um adulto de confiança.","Dar suas informações pessoais logo de cara.","Convidar seus amigos para o jogo e compartilhar suas informações com todos."],
                answer: "Dizer não para compartilhar suas informações e contar para um adulto de confiança."
            },
            {
                question: "Pergunta 2: Ao jogar na internet, o que pode acontecer de ruim às crianças?",
                options: ["Espalhar informações pessoais na internet.", "Se divertir com segurança nos jogos.", "Usar a imaginação e ser criativo."],
                answer: "Espalhar informações pessoais na internet."
            },
            {
                question: "Pergunta 3: Como podemos manter as crianças seguras quando elas brincam na internet?",
                options: ["Não deixar as crianças usarem a internet de jeito nenhum.", "Ensinar às crianças sobre as coisas que podem ser perigosas e ajudá-las a fazer escolhas seguras.", "Permitir que as crianças usem a internet sozinhas, sem ninguém cuidando delas."],
                answer: "Ensinar às crianças sobre as coisas que podem ser perigosas e ajudá-las a fazer escolhas seguras."
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

            let status_jogos;
            if (score >= passingScore) {
                status_jogos = 'aprovado';
                statusElement.textContent = "Aprovado!";
                statusElement.style.color = "green";
            } else {
                status_jogos = 'reprovado';
                statusElement.textContent = "Reprovado!";
                statusElement.style.color = "red";
            }

            const sessacao = document.getElementById('sessacao').value;

             let formData = new FormData();
             console.log(sessacao);
             formData.append("id", parseInt(sessacao));
 
             formData.append("status_jogos", status_jogos);
             let request = new XMLHttpRequest();
             request.open("POST", '../banco/stsJogos.php');
             request.send(formData)
             request.onreadystatechange = function () {
                 if (request.readyState == 4 && request.status_jogos == 200) {
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