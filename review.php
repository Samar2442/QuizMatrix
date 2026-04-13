<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMatrix - Action Report Analysis</title>
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
                <span>User: <span id="display-alias" style="color: var(--neon-cyan);">Unknown</span></span>
                <button onclick="logoutMatrix()" style="background: transparent; border: 1px solid var(--neon-red); color: var(--neon-red); padding: 0.3rem 0.8rem; border-radius: 4px; cursor: pointer; font-family: var(--font-mono); font-size: 0.8rem;">[LOGOUT]</button>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="glass-panel" style="max-width: 1000px; width: 100%;">
            <h2>Action Report Analysis_</h2>
            
            <div id="review-container" style="margin-top: 2rem;">
                <!-- Review Cards Injected via JS -->
            </div>

            <div style="margin-top: 2rem; text-align: center;">
                <a href="hub.php" class="cyber-btn purple">Return to Hub</a>
            </div>

        </div>
    </main>

    <script src="assets/js/effects.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alias = localStorage.getItem('sys_alias') || 'Guest';
            document.getElementById('display-alias').textContent = alias;

            const reviewContainer = document.getElementById('review-container');
            const historyData = sessionStorage.getItem('sys_history');

            if (!historyData) {
                reviewContainer.innerHTML = '<p class="subtitle">No history data found in matrix blocks. Cannot analyze.</p>';
                return;
            }

            const history = JSON.parse(historyData);

            if (history.length === 0) {
                reviewContainer.innerHTML = '<p class="subtitle">Log is empty.</p>';
                return;
            }

            history.forEach((item, qIndex) => {
                const card = document.createElement('div');
                card.className = `review-card ${item.selectedIndex === item.correctIndex ? 'correct' : 'incorrect'}`;
                
                const qTitle = document.createElement('h3');
                qTitle.style.textAlign = 'left';
                qTitle.style.color = 'var(--text-main)';
                qTitle.textContent = `Q${qIndex + 1}: ${item.question}`;
                card.appendChild(qTitle);

                item.options.forEach((opt, optIdx) => {
                    const optEl = document.createElement('div');
                    optEl.className = 'review-option';
                    optEl.textContent = opt;

                    if (optIdx === item.correctIndex) {
                        optEl.classList.add('is-correct');
                        optEl.innerHTML += ' <span style="float: right;">[CORRECT]</span>';
                    } else if (optIdx === item.selectedIndex) {
                        optEl.classList.add('is-wrong');
                        optEl.innerHTML += ' <span style="float: right;">[YOURS]</span>';
                    }

                    card.appendChild(optEl);
                });

                if (item.selectedIndex === -1) {
                    const timeoutEl = document.createElement('div');
                    timeoutEl.style.color = 'var(--neon-red)';
                    timeoutEl.style.marginTop = '1rem';
                    timeoutEl.textContent = ">> STATUS: Connection timeout. No answer logged.";
                    card.appendChild(timeoutEl);
                }

                reviewContainer.appendChild(card);
            });
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
