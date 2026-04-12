# 🧠 QuizMatrix

### *Enter the Matrix of Knowledge*

QuizMatrix is a **modern, hacker-themed quiz web application** built using **HTML, CSS, JavaScript, and PHP**. It delivers an interactive and visually engaging quiz experience with a **dark neon cyberpunk UI**, structured quiz flow, and detailed performance analysis — all without using a database.

---

## 🚀 Features

### 🎬 Intro Animation Page

* Stylish hacker-themed intro with glitch/matrix effects
* Displays **QuizMatrix branding** with neon glow
* Automatically redirects to main page

---

### 🧾 User Entry System

* Collects basic user details (Name)
* Stored using **localStorage/session** (no database required)
* Personalized quiz experience

---

### 🧩 Category Selection System

* Initially displays **5 main categories**
* Additional **7+ categories hidden under “More” button**
* Smooth expand/collapse animation

---

### 🎯 Structured Quiz Flow

1. Select Category
2. Choose Difficulty Level:

   * Beginner
   * Moderate
   * Advanced
3. Select Number of Questions:

   * 5 / 10 / 15
4. Start Quiz (enabled only after all selections)

---

### 🧠 Quiz Engine

* Category-wise and difficulty-based questions
* Dummy questions stored in **JavaScript/PHP arrays**
* Multiple Choice Questions (MCQs)
* Optional timer and progress tracking

---

### 📊 Result & Performance Analysis

* Displays:

  * User Name
  * Category
  * Difficulty Level
  * Final Score
* Performance feedback message

---

### 🔍 Answer Review System

* “Review Answers” feature
* Shows:

  * Selected answers
  * Correct answers
  * Highlights mistakes (❌ incorrect / ✅ correct)
* Helps users learn from errors

---

### 🎨 UI/UX Design

* Dark hacker theme (#0a0a0a background)
* Neon glow effects (green, cyan, purple)
* Smooth animations & transitions
* Glassmorphism UI elements
* Fully responsive (mobile, tablet, desktop)

---

## 🛠️ Tech Stack

* HTML5 – Structure
* CSS3 – Styling & animations (Neon UI)
* JavaScript (Vanilla) – Logic & interactivity
* PHP – Optional routing/structure
* LocalStorage – Data persistence (No database)

---

## 📁 Project Structure

```
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
```

---

## ⚙️ How to Run the Project

### 🖥️ Method 1: Using XAMPP (Recommended)

1. Install XAMPP
2. Move the project folder to:
   C:\xampp\htdocs\
3. Start Apache server from XAMPP Control Panel
4. Open browser and go to:
   http://localhost/QuizMatrix/

---

### 💻 Method 2: Direct Run (Without PHP features)

1. Open project folder
2. Run `intro.html` directly in browser
3. Note:

   * PHP features won’t work
   * JS-based features will run normally

---

## 📌 Usage Instructions

1. Launch the website → Intro animation plays
2. Automatically redirected to main page
3. Enter your name
4. Select a quiz category
5. Choose difficulty level
6. Select number of questions
7. Click **Start Quiz**
8. Answer questions
9. View results and performance
10. Click **Review Answers** to analyze mistakes

---

## 🔮 Future Improvements

* Add database integration (MySQL)
* User login & leaderboard system
* Real-time multiplayer quizzes
* API-based dynamic questions
* Admin panel for managing quizzes

---

## 👨‍💻 Author

SAMARESH DEBNATH (QuizMatrix Developer)

* Passionate about Cybersecurity & Development
* Focused on building modern, interactive web apps

---

## ⭐ Conclusion

QuizMatrix combines **learning + aesthetics + interactivity** into one platform.
Its **cyberpunk UI and structured quiz flow** make it both engaging and professional.
