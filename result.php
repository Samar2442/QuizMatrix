<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMatrix - After Action Report</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <canvas id="matrix-canvas"></canvas>
    <div class="overlay-scanline"></div>

    <header class="global-header">
        <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto;">
            <div>
                <a href="hub.php" class="header-title">QuizMatrix</a>
                <div class="header-tagline">Enter the Matrix of Knowledge</div>
            </div>
            <div style="color: var(--neon-purple); font-family: var(--font-mono); display: flex; align-items: center; gap: 1rem;">
                <span>User: <span id="header-alias" style="color: var(--neon-cyan);">Unknown</span></span>
                <button onclick="logoutMatrix()" style="background: transparent; border: 1px solid var(--neon-red); color: var(--neon-red); padding: 0.3rem 0.8rem; border-radius: 4px; cursor: pointer; font-family: var(--font-mono); font-size: 0.8rem;">[LOGOUT]</button>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="glass-panel" style="text-align: center;">
            
            <h2>Assessment Complete_</h2>
            
            <div class="user-info-bar">
                <div id="stat-alias">User: Unknown</div>
                <div id="stat-protocol">Protocol: ???</div>
                <div id="stat-security">SecLevel: ???</div>
            </div>

            <div class="result-score" id="final-score">X/X</div>
            <div class="result-message" id="result-message">Analyzing data...</div>

            <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="review.php" class="cyber-btn cyan">Analyze Action Report</a>
                <a href="hub.php" class="cyber-btn purple">Return to Hub</a>
            </div>

        </div>
    </main>

    <script src="assets/js/effects.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alias = localStorage.getItem('sys_alias') || 'Guest';
            const category = sessionStorage.getItem('current_category') || 'Unknown';
            const difficulty = sessionStorage.getItem('current_difficulty') || 'Unknown';
            
            document.getElementById('stat-alias').textContent = `User: ${alias}`;
            // Set header alias as well
            const headerAlias = document.getElementById('header-alias');
            if(headerAlias) headerAlias.textContent = alias;

            document.getElementById('stat-protocol').textContent = `Protocol: ${category}`;
            document.getElementById('stat-security').textContent = `Level: ${difficulty}`;

            const score = parseInt(sessionStorage.getItem('finalScore') || '0');
            const total = parseInt(sessionStorage.getItem('totalQuestions') || '5');
            
            // clear session storage to prevent reloading bugs
            sessionStorage.removeItem('finalScore');
            sessionStorage.removeItem('totalQuestions');

            const scoreElement = document.getElementById('final-score');
            const messageElement = document.getElementById('result-message');
            
            scoreElement.textContent = `${score}/${total}`;

            const percentage = (score / total) * 100;
            
            if (percentage === 100) {
                messageElement.textContent = "Root access granted. Excellent work.";
                messageElement.style.color = "var(--neon-green)";
            } else if (percentage >= 70) {
                messageElement.textContent = "System compromised. Good performance.";
                messageElement.style.color = "var(--neon-cyan)";
            } else if (percentage >= 40) {
                messageElement.textContent = "Access denied. Average performance.";
                messageElement.style.color = "var(--text-main)";
            } else {
                messageElement.textContent = "Intrusion detected. Connection closed.";
                messageElement.style.color = "var(--neon-red)";
                scoreElement.style.color = "var(--neon-red)";
                scoreElement.style.textShadow = "0 0 20px var(--neon-red)";
            }

            if (window.sysFX) {
                setTimeout(() => sysFX.playHoverSound(), 500);
            }
        });

        function logoutMatrix() {
            if(window.sysFX) sysFX.playErrorSound();
            localStorage.removeItem('sys_alias');
            sessionStorage.clear();
            window.location.href = 'hub.php';
        }
    </script>
</body>
</html>
