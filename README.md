🧠 QuizMatrix
Enter the Matrix of Knowledge

QuizMatrix is a modern, hacker-themed quiz web application built using HTML, CSS, JavaScript, and PHP. It delivers an interactive and visually engaging quiz experience with a dark neon cyberpunk UI, structured quiz flow, and detailed performance analysis — all without using a database.

🚀 Features
🎬 Intro Animation Page
Stylish hacker-themed intro with glitch/matrix effects
Displays QuizMatrix branding with neon glow
Automatically redirects to main page
🧾 User Entry System
Collects basic user details (Name)
Stored using localStorage/session (no database required)
Personalized quiz experience
🧩 Category Selection System
Initially displays 5 main categories
Additional 7+ categories hidden under “More” button
Smooth expand/collapse animation
🎯 Structured Quiz Flow
Select Category
Choose Difficulty Level:
Beginner
Moderate
Advanced
Select Number of Questions:
5 / 10 / 15
Start Quiz (enabled only after all selections)
🧠 Quiz Engine
Category-wise and difficulty-based questions
Dummy questions stored in JavaScript/PHP arrays
Multiple Choice Questions (MCQs)
Optional timer and progress tracking
📊 Result & Performance Analysis
Displays:
User Name
Category
Difficulty Level
Final Score
Performance feedback message
🔍 Answer Review System
“Review Answers” feature
Shows:
Selected answers
Correct answers
Highlights mistakes (❌ incorrect / ✅ correct)
Helps users learn from errors
🎨 UI/UX Design
Dark hacker theme (#0a0a0a background)
Neon glow effects (green, cyan, purple)
Smooth animations & transitions
Glassmorphism UI elements
Fully responsive (mobile, tablet, desktop)
🛠️ Tech Stack
HTML5 – Structure
CSS3 – Styling & animations (Neon UI)
JavaScript (Vanilla) – Logic & interactivity
PHP – Optional routing/structure
LocalStorage – Data persistence (No database)
📁 Project Structure
QuizMatrix/
│── index.php
│── intro.html
│── style.css
│── script.js
│── quiz.js
│── assets/
│   ├── images/
│   ├── icons/
│── README.md
⚙️ How to Run the Project
🖥️ Method 1: Using XAMPP (Recommended)
Install XAMPP

Move the project folder to:

C:\xampp\htdocs\
Start:
Apache server (from XAMPP Control Panel)

Open browser and go to:

http://localhost/QuizMatrix/
💻 Method 2: Direct Run (Without PHP features)
Open project folder
Run intro.html directly in browser
Note:
PHP features won’t work
JS-based features will run normally
📌 Usage Instructions
Launch the website → Intro animation plays
Automatically redirected to main page
Enter your name
Select a quiz category
Choose difficulty level
Select number of questions
Click Start Quiz
Answer questions
View results and performance
Click Review Answers to analyze mistakes
🔮 Future Improvements
Add database integration (MySQL)
User login & leaderboard system
Real-time multiplayer quizzes
API-based dynamic questions
Admin panel for managing quizzes
👨‍💻 Author

Samaresh Debnath (QuizMatrix Developer)

Passionate about Cybersecurity & Development
Focused on building modern, interactive web apps
⭐ Conclusion

QuizMatrix combines learning + aesthetics + interactivity into one platform.
Its cyberpunk UI and structured quiz flow make it both engaging and professional.
