<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMatrix - Assessment Protocol</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <canvas id="matrix-canvas"></canvas>
    <div class="overlay-scanline"></div>

    <header class="global-header">
        <a href="hub.php" class="header-title">QuizMatrix</a>
        <div class="header-tagline">Enter the Matrix of Knowledge</div>
    </header>

    <main class="container">
        <div class="glass-panel">
            
            <div class="progress-container">
                <div class="progress-bar" id="progress-bar"></div>
            </div>

            <div class="quiz-header">
                <div class="score-display" id="score-display">Score: 0</div>
                <div class="timer-display" id="timer-display">00:15</div>
            </div>

            <h2 id="question-text" class="question-text">Initializing parameters...</h2>

            <div class="options-container" id="options-container">
                <!-- Options injected by JS -->
            </div>

            <div class="quiz-footer">
                <button id="next-btn" class="cyber-btn" style="display: none;">Next <span style="font-family: monospace;">&gt;&gt;</span></button>
            </div>

        </div>
    </main>

    <script src="assets/js/effects.js"></script>
    <script src="assets/js/questions.js"></script>
    <script src="assets/js/quiz.js"></script>
</body>
</html>
