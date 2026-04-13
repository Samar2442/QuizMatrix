document.addEventListener('DOMContentLoaded', () => {
    // Get parameters from URL
    const urlParams = new URLSearchParams(window.location.search);
    const categoryQuery = urlParams.get('category');
    const difficultyQuery = urlParams.get('diff');
    let qtyQuery = parseInt(urlParams.get('qty')) || 5;
    
    // Fallback and validation
    if (!categoryQuery || !difficultyQuery || !quizData[categoryQuery] || !quizData[categoryQuery][difficultyQuery]) {
        // Redirect if invalid configuration
        window.location.href = 'index.php';
        return;
    }

    // Capture precise requested questions
    const allQuestions = quizData[categoryQuery][difficultyQuery];
    const questions = allQuestions.slice(0, qtyQuery);
    
    // State variables
    let currentQuestionIndex = 0;
    let score = 0;
    let timeLeft = 15;
    let timerInterval;
    let quizHistory = [];

    // DOM Elements
    const questionText = document.getElementById('question-text');
    const optionsContainer = document.getElementById('options-container');
    const timerDisplay = document.getElementById('timer-display');
    const progressBar = document.getElementById('progress-bar');
    const scoreDisplay = document.getElementById('score-display');
    const nextBtn = document.getElementById('next-btn');

    // Initialize Quiz
    loadQuestion();

    function loadQuestion() {
        resetState();
        
        const q = questions[currentQuestionIndex];
        questionText.textContent = q.question;
        
        q.options.forEach((option, index) => {
            const button = document.createElement('button');
            button.className = 'option-btn';
            button.textContent = option;
            button.dataset.index = index;
            
            button.addEventListener('mouseenter', () => {
                if (window.sysFX) sysFX.playHoverSound();
            });

            button.addEventListener('click', selectAnswer);
            optionsContainer.appendChild(button);
        });

        startTimer();
        updateProgress();
    }

    function resetState() {
        clearInterval(timerInterval);
        timeLeft = 15;
        timerDisplay.textContent = `00:${timeLeft < 10 ? '0' + timeLeft : timeLeft}`;
        timerDisplay.classList.remove('warning');
        
        while (optionsContainer.firstChild) {
            optionsContainer.removeChild(optionsContainer.firstChild);
        }
        
        nextBtn.style.display = 'none';
        
        scoreDisplay.textContent = `Score: ${score}`;
    }

    function startTimer() {
        timerInterval = setInterval(() => {
            timeLeft--;
            timerDisplay.textContent = `00:${timeLeft < 10 ? '0' + timeLeft : timeLeft}`;
            
            if (timeLeft <= 5) {
                timerDisplay.classList.add('warning');
            }
            
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                handleTimeOut();
            }
        }, 1000);
    }

    function selectAnswer(e) {
        clearInterval(timerInterval);
        const selectedBtn = e.target;
        const selectedIndex = parseInt(selectedBtn.dataset.index);
        const correctIndex = questions[currentQuestionIndex].correct;

        const isCorrect = selectedIndex === correctIndex;
        
        quizHistory.push({
            question: questions[currentQuestionIndex].question,
            options: questions[currentQuestionIndex].options,
            correctIndex: correctIndex,
            selectedIndex: selectedIndex
        });

        if (isCorrect) {
            selectedBtn.classList.add('correct');
            score++;
            if (window.sysFX) sysFX.playSuccessSound();
        } else {
            selectedBtn.classList.add('wrong');
            if (window.sysFX) sysFX.playErrorSound();
        }

        disableOptions(correctIndex);
        scoreDisplay.textContent = `Score: ${score}`;
        nextBtn.style.display = 'inline-block';
    }

    function handleTimeOut() {
        if (window.sysFX) sysFX.playErrorSound();
        const correctIndex = questions[currentQuestionIndex].correct;
        
        quizHistory.push({
            question: questions[currentQuestionIndex].question,
            options: questions[currentQuestionIndex].options,
            correctIndex: correctIndex,
            selectedIndex: -1 // Timeout
        });

        disableOptions(correctIndex);
        nextBtn.style.display = 'inline-block';
    }

    function disableOptions(correctIndex) {
        Array.from(optionsContainer.children).forEach(button => {
            button.disabled = true;
            if (parseInt(button.dataset.index) === correctIndex) {
                button.classList.add('correct');
            }
        });
    }

    function updateProgress() {
        const progressPercentage = (currentQuestionIndex / questions.length) * 100;
        progressBar.style.width = `${progressPercentage}%`;
    }

    nextBtn.addEventListener('click', () => {
        currentQuestionIndex++;
        
        if (currentQuestionIndex < questions.length) {
            loadQuestion();
        } else {
            // End of quiz - Save to storage explicitly mapping length
            sessionStorage.setItem('finalScore', score);
            sessionStorage.setItem('totalQuestions', questions.length);
            sessionStorage.setItem('sys_history', JSON.stringify(quizHistory));
            window.location.href = `result.php`;
        }
    });

    scoreDisplay.textContent = `Score: ${score}`;
});
