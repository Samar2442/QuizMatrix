class UIAnimationAndAudio {
  constructor() {
    this.canvas = document.getElementById('matrix-canvas');
    if (this.canvas) {
      this.ctx = this.canvas.getContext('2d');
      this.initMatrix();
      window.addEventListener('resize', () => this.resizeMatrix());
    }
    this.initAudioContext();
  }

  // Matrix Background Effect
  initMatrix() {
    this.canvas.width = window.innerWidth;
    this.canvas.height = window.innerHeight;
    
    // Hacker/Matrix characters
    this.chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*()_+={}[]|;:<>,.?/~'.split('');
    
    this.fontSize = 16;
    this.columns = this.canvas.width / this.fontSize;
    this.drops = [];
    
    for (let x = 0; x < this.columns; x++) {
      this.drops[x] = 1;
    }
    
    // 33 ms ~ 30fps
    if (this.matrixInterval) clearInterval(this.matrixInterval);
    this.matrixInterval = setInterval(() => this.drawMatrix(), 33);
  }
  
  resizeMatrix() {
    this.canvas.width = window.innerWidth;
    this.canvas.height = window.innerHeight;
    this.columns = this.canvas.width / this.fontSize;
    this.drops = [];
    for (let x = 0; x < this.columns; x++) {
      this.drops[x] = 1;
    }
  }

  drawMatrix() {
    // Translucent black to show trail
    this.ctx.fillStyle = 'rgba(5, 5, 5, 0.05)';
    this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
    
    this.ctx.fillStyle = '#0F0'; // Green text
    this.ctx.font = this.fontSize + 'px "Share Tech Mono", monospace';
    
    for (let i = 0; i < this.drops.length; i++) {
        const text = this.chars[Math.floor(Math.random() * this.chars.length)];
        // x coordinate is i * fontSize, y is drops[i] * fontSize
        this.ctx.fillText(text, i * this.fontSize, this.drops[i] * this.fontSize);
        
        // Randomly reset drop to top
        if (this.drops[i] * this.fontSize > this.canvas.height && Math.random() > 0.975) {
            this.drops[i] = 0;
        }
        
        this.drops[i]++;
    }
  }

  // Web Audio Synthesis for Hacker Vibes
  initAudioContext() {
    // Using AudioContext on user interaction
    const AudioContext = window.AudioContext || window.webkitAudioContext;
    this.audioCtx = new AudioContext();
    this.audioEnabled = false;

    // Must be enabled by user interaction
    const enableAudio = () => {
      if (this.audioCtx.state === 'suspended') {
        this.audioCtx.resume();
      }
      this.audioEnabled = true;
      document.removeEventListener('click', enableAudio);
    };
    document.addEventListener('click', enableAudio);
  }

  playTone(frequency, type, duration, vol) {
    if (!this.audioEnabled || !this.audioCtx) return;
    
    const oscillator = this.audioCtx.createOscillator();
    const gainNode = this.audioCtx.createGain();
    
    oscillator.type = type;
    oscillator.frequency.value = frequency;
    
    gainNode.gain.setValueAtTime(vol, this.audioCtx.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.001, this.audioCtx.currentTime + duration);
    
    oscillator.connect(gainNode);
    gainNode.connect(this.audioCtx.destination);
    
    oscillator.start();
    oscillator.stop(this.audioCtx.currentTime + duration);
  }

  playHoverSound() {
    this.playTone(300, 'square', 0.1, 0.05);
  }

  playClickSound() {
    this.playTone(600, 'square', 0.1, 0.1);
  }

  playSuccessSound() {
    if (!this.audioEnabled) return;
    this.playTone(440, 'sine', 0.1, 0.1);
    setTimeout(() => this.playTone(554, 'sine', 0.1, 0.1), 100);
    setTimeout(() => this.playTone(659, 'sine', 0.2, 0.1), 200);
  }

  playErrorSound() {
    if (!this.audioEnabled) return;
    this.playTone(200, 'sawtooth', 0.1, 0.1);
    setTimeout(() => this.playTone(150, 'sawtooth', 0.3, 0.1), 100);
  }
}

// Global instance
const sysFX = new UIAnimationAndAudio();

// Bind button effects
document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.cyber-btn, .option-btn, .category-card');
  buttons.forEach(btn => {
    btn.addEventListener('mouseenter', () => sysFX.playHoverSound());
    btn.addEventListener('click', () => sysFX.playClickSound());
  });
});
