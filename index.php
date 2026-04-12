<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMatrix - Initializing...</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="overflow: hidden; justify-content: center; align-items: center; background: #000;">
    <canvas id="matrix-canvas" style="opacity: 0.6; z-index: 0;"></canvas>
    
    <div style="position: relative; z-index: 10; text-align: center;">
        <h1 class="glitch-text" style="font-size: 4rem; opacity: 0; animation: fadeInIntro 1s forwards 0.5s;">QuizMatrix</h1>
        <p class="tagline-intro" style="font-family: var(--font-mono); color: var(--neon-purple); font-size: 1.5rem; text-shadow: 0 0 10px var(--neon-purple); opacity: 0; animation: fadeInIntro 1s forwards 1.5s;">Enter the Matrix of Knowledge</p>
        
        <div class="loading-bar-container" style="width: 300px; height: 4px; background: rgba(0,255,255,0.2); margin: 2rem auto; border-radius: 2px; overflow: hidden; opacity: 0; animation: fadeInIntro 0.5s forwards 2s;">
            <div class="loading-bar-fill" style="height: 100%; width: 0; background: var(--neon-cyan); box-shadow: 0 0 10px var(--neon-cyan); animation: fillBar 1.5s ease forwards 2s;"></div>
        </div>
        <p class="status-text" style="font-family: var(--font-mono); color: var(--neon-green); font-size: 1rem; opacity: 0; animation: fadeInIntro 0.5s forwards 2s;">> Establishing secure connection...</p>
    </div>

    <script src="assets/js/effects.js"></script>
    <script>
        setTimeout(() => {
            window.location.href = 'hub.php';
        }, 3500); // 3.5 seconds
    </script>
</body>
</html>
