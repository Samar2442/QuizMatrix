<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMatrix - Enter the Matrix of Knowledge</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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



    <!-- Auth Modal Overlay -->
    <div class="auth-modal hidden" id="auth-modal">
        <div class="auth-form">
            <h2>Identify Yourself_</h2>
            <p class="subtitle" style="margin-bottom: 0;">Enter your Alias to access the mainframe.</p>
            <input type="text" id="alias-input" class="neon-input" placeholder="e.g. Neo, Trinity..." autocomplete="off">
            <button class="cyber-btn purple" onclick="submitAlias()">Initialize</button>
        </div>
    </div>

    <main class="container">
        <div class="glass-panel text-center">
            
            <div class="wizard-progress">
                <div class="step-indicator active" id="indicator-step1">1. Protocol</div>
                <div class="step-indicator" id="indicator-step2">2. Security Level</div>
                <div class="step-indicator" id="indicator-step3">3. Payload Size</div>
            </div>

            <!-- STEP 1: CATEGORY -->
            <div class="step-section active" id="step-1">
                <h2>Select Protocol Module</h2>
                <p class="subtitle">Choose your target knowledge base.</p>
                <div class="selection-grid">
                    
                    <div class="selection-card" data-category="programming" onclick="selectCategory(this)">
                        <i class="fa-solid fa-code category-icon" style="color: #0cf574;"></i>
                        <div class="selection-title">Programming</div>
                        <div class="selection-desc">Syntax and Structure</div>
                    </div>

                    <div class="selection-card" data-category="cybersecurity" onclick="selectCategory(this)">
                        <i class="fa-solid fa-shield-halved category-icon" style="color: #0ff;"></i>
                        <div class="selection-title">Cyber Security</div>
                        <div class="selection-desc">Defense & Exploits</div>
                    </div>

                    <div class="selection-card" data-category="general" onclick="selectCategory(this)">
                        <i class="fa-solid fa-globe category-icon" style="color: #b026ff;"></i>
                        <div class="selection-title">General Intel</div>
                        <div class="selection-desc">Global Data</div>
                    </div>

                    <div class="selection-card" data-category="science" onclick="selectCategory(this)">
                        <i class="fa-solid fa-flask category-icon" style="color: #ff2a2a;"></i>
                        <div class="selection-title">Science</div>
                        <div class="selection-desc">Physical Laws</div>
                    </div>

                    <!-- Hidden Categories -->
                    <div class="selection-card hidden-category" data-category="math" onclick="selectCategory(this)">
                        <i class="fa-solid fa-calculator category-icon" style="color: #ff9900;"></i>
                        <div class="selection-title">Mathematics</div>
                        <div class="selection-desc">Logic & Numbers</div>
                    </div>

                    <div class="selection-card hidden-category" data-category="hardware" onclick="selectCategory(this)">
                        <i class="fa-solid fa-microchip category-icon" style="color: #aaa;"></i>
                        <div class="selection-title">Hardware</div>
                        <div class="selection-desc">Physical Systems</div>
                    </div>

                    <div class="selection-card hidden-category" data-category="space" onclick="selectCategory(this)">
                        <i class="fa-solid fa-rocket category-icon" style="color: #0077ff;"></i>
                        <div class="selection-title">Space</div>
                        <div class="selection-desc">Cosmic Data</div>
                    </div>

                </div>
                <div style="margin-top: 1.5rem; text-align: center;">
                    <button class="cyber-btn purple" id="toggle-more-btn" onclick="toggleCategories()" style="font-size: 0.9rem;">Access More Protocols...</button>
                </div>
            </div>

            <!-- STEP 2: DIFFICULTY -->
            <div class="step-section" id="step-2">
                <h2>Security Level</h2>
                <p class="subtitle">Set the encryption strength of the questions.</p>
                <div class="selection-grid">
                    <div class="selection-card" data-difficulty="beginner" onclick="selectDifficulty(this)">
                        <div class="selection-title">Beginner</div>
                        <div class="selection-desc">Tier 1 clear text</div>
                    </div>
                    <div class="selection-card" data-difficulty="moderate" onclick="selectDifficulty(this)">
                        <div class="selection-title" style="color: var(--neon-cyan)">Moderate</div>
                        <div class="selection-desc">Tier 2 hashed</div>
                    </div>
                    <div class="selection-card" data-difficulty="advanced" onclick="selectDifficulty(this)">
                        <div class="selection-title" style="color: var(--neon-red)">Advanced</div>
                        <div class="selection-desc">Tier 3 salted encryption</div>
                    </div>
                </div>
                <div style="margin-top:2rem;">
                    <button class="cyber-btn" onclick="goToStep(1)">Back</button>
                </div>
            </div>

            <!-- STEP 3: NUMBER OF QUESTIONS -->
            <div class="step-section" id="step-3">
                <h2>Payload Size</h2>
                <p class="subtitle">How many packets do you want to extract?</p>
                <div class="selection-grid">
                    <div class="selection-card" data-qty="5" onclick="selectQty(this)">
                        <div class="selection-title">5 Items</div>
                    </div>
                    <div class="selection-card" data-qty="10" onclick="selectQty(this)">
                        <div class="selection-title">10 Items</div>
                    </div>
                    <div class="selection-card" data-qty="15" onclick="selectQty(this)">
                        <div class="selection-title">15 Items</div>
                    </div>
                </div>
                <div style="margin-top:2rem;">
                    <button class="cyber-btn" onclick="goToStep(2)">Back</button>
                    <button class="cyber-btn cyan" id="start-btn" onclick="startQuiz()" disabled>Start Quiz</button>
                </div>
            </div>

        </div>
    </main>

    <!-- Loader Screen -->
    <div class="loader-screen" id="loader">
        <div class="loader-terminal">
            <p>> Establishing connection...</p>
            <p style="animation-delay: 0.5s;">> Bypassing firewall...</p>
            <p style="animation-delay: 1.0s;">> Extracting Data Packets...</p>
            <p style="animation-delay: 1.5s;">> Root Access Granted.</p>
        </div>
    </div>

    <script src="assets/js/effects.js"></script>
    <script>
        // Auth Logic
        document.addEventListener('DOMContentLoaded', () => {
            const alias = localStorage.getItem('sys_alias');
            if (!alias) {
                document.getElementById('auth-modal').classList.remove('hidden');
            } else {
                document.getElementById('display-alias').textContent = alias;
            }
        });

        function logoutMatrix() {
            if(window.sysFX) sysFX.playErrorSound();
            localStorage.removeItem('sys_alias');
            sessionStorage.clear();
            document.getElementById('auth-modal').classList.remove('hidden');
        }

        function submitAlias() {
            const input = document.getElementById('alias-input').value.trim();
            if (input.length > 0) {
                localStorage.setItem('sys_alias', input);
                document.getElementById('display-alias').textContent = input;
                document.getElementById('auth-modal').classList.add('hidden');
                if(window.sysFX) sysFX.playSuccessSound();
            } else {
                if(window.sysFX) sysFX.playErrorSound();
            }
        }

        // Expanded Categories Logic
        function toggleCategories() {
            if(window.sysFX) sysFX.playClickSound();
            const hiddenElements = document.querySelectorAll('.hidden-category');
            hiddenElements.forEach(el => {
                el.classList.add('show');
            });
            document.getElementById('toggle-more-btn').style.display = 'none';
        }

        // State
        let config = {
            category: null,
            difficulty: null,
            qty: null
        };

        function selectCategory(el) {
            if(window.sysFX) sysFX.playClickSound();
            document.querySelectorAll('#step-1 .selection-card').forEach(c => c.classList.remove('selected'));
            el.classList.add('selected');
            config.category = el.dataset.category;
            
            setTimeout(() => goToStep(2), 300);
        }

        function selectDifficulty(el) {
            if(window.sysFX) sysFX.playClickSound();
            document.querySelectorAll('#step-2 .selection-card').forEach(c => c.classList.remove('selected'));
            el.classList.add('selected');
            config.difficulty = el.dataset.difficulty;
            
            setTimeout(() => goToStep(3), 300);
        }

        function selectQty(el) {
            if(window.sysFX) sysFX.playClickSound();
            document.querySelectorAll('#step-3 .selection-card').forEach(c => c.classList.remove('selected'));
            el.classList.add('selected');
            config.qty = el.dataset.qty;
            
            // Enable start button
            document.getElementById('start-btn').disabled = false;
        }

        function goToStep(step) {
            if(window.sysFX) sysFX.playClickSound();
            // Hide all
            document.querySelectorAll('.step-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.step-indicator').forEach(i => i.classList.remove('active', 'completed'));
            
            // Show target
            document.getElementById(`step-${step}`).classList.add('active');

            // Update indicators
            for (let i = 1; i < step; i++) {
                document.getElementById(`indicator-step${i}`).classList.add('completed');
            }
            document.getElementById(`indicator-step${step}`).classList.add('active');
        }

        function startQuiz() {
            if (!config.category || !config.difficulty || !config.qty) return;
            
            if(window.sysFX) sysFX.playSuccessSound();

            const loader = document.getElementById('loader');
            loader.classList.add('active');

            // Clear old history
            sessionStorage.removeItem('sys_history');
            sessionStorage.setItem('current_category', config.category);
            sessionStorage.setItem('current_difficulty', config.difficulty);

            setTimeout(() => {
                window.location.href = `quiz.php?category=${config.category}&diff=${config.difficulty}&qty=${config.qty}`;
            }, 2000);
        }
    </script>
</body>
</html>
