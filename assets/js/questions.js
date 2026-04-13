// Base question bank
const rawQuizData = {
    programming: {
        beginner: [
            { question: "What does HTML stand for?", options: ["Hyper Text Markup Language", "Home Tool Markup Language", "Hyperlinks Text", "Hyper Tool Language"], correct: 0 },
            { question: "Inside which HTML element do we put the JavaScript?", options: ["<javascript>", "<scripting>", "<js>", "<script>"], correct: 3 },
            { question: "How do you create a variable in JavaScript?", options: ["v varName;", "let varName;", "variable varName;", "define varName;"], correct: 1 },
            { question: "Which language is used to style web pages?", options: ["HTML", "JQuery", "CSS", "XML"], correct: 2 },
            { question: "What symbol points to an id in CSS?", options: [".", "#", "*", "@"], correct: 1 }
        ],
        moderate: [
            { question: "What is a closure in JavaScript?", options: ["A function with preserved outer scope", "A closed modal", "End of a script", "A syntax error"], correct: 0 },
            { question: "Which method adds an element to the end of an array?", options: ["push()", "pop()", "shift()", "unshift()"], correct: 0 },
            { question: "What does PHP stand for?", options: ["Private Home Page", "Personal Hypertext Processor", "PHP: Hypertext Preprocessor", "Programming Home Page"], correct: 2 },
            { question: "In Git, how do you create a new branch?", options: ["git make branch", "git checkout -b", "git new branch", "git create <branch>"], correct: 1 },
            { question: "What does API stand for?", options: ["Application Programming Interface", "Applied Public Interface", "Array Programming Index", "Application Process Integration"], correct: 0 }
        ],
        advanced: [
            { question: "What is the time complexity of a binary search?", options: ["O(n)", "O(n log n)", "O(log n)", "O(1)"], correct: 2 },
            { question: "In React, what hook is used to perform side effects?", options: ["useState", "useContext", "useReducer", "useEffect"], correct: 3 },
            { question: "What does CORS stand for?", options: ["Cross-Origin Resource Sharing", "Central Online Routing System", "Cross-Object Routing Sequence", "Control Origin Resource Setup"], correct: 0 },
            { question: "Which design pattern restricts instantiation of a class to one object?", options: ["Factory", "Observer", "Singleton", "Decorator"], correct: 2 },
            { question: "What is memoization?", options: ["Memorizing syntax", "Caching function results", "Memory leaking", "Code splitting"], correct: 1 }
        ]
    },
    cybersecurity: {
        beginner: [
            { question: "What does DDoS stand for?", options: ["Distributed Denial of Service", "Data Destruction of Servers", "Direct Denial of System", "Digital Domain"], correct: 0 },
            { question: "What is a strong password?", options: ["Password123", "admin", "12345678", "h8!Kz#9Qp$v"], correct: 3 },
            { question: "What is phishing?", options: ["Catching fish", "Fake emails tricking users", "A firewall type", "Antivirus software"], correct: 1 },
            { question: "What is malware?", options: ["Malicious software", "Hardware error", "A type of firewall", "Network protocol"], correct: 0 },
            { question: "What is a VPN?", options: ["Virtual Public Network", "Virtual Private Network", "Visual Processing Node", "Vector Phase Network"], correct: 1 }
        ],
        moderate: [
            { question: "What port does HTTPS use?", options: ["21", "80", "443", "22"], correct: 2 },
            { question: "What is social engineering?", options: ["Building social apps", "Manipulating people for data", "Networking events", "Encryption protocol"], correct: 1 },
            { question: "What is SQL Injection?", options: ["A database optimization trick", "Code injection into inputs", "Adding memory via SQL", "A networking attack"], correct: 1 },
            { question: "What is the purpose of a honey pot?", options: ["Store sweet data", "Trap and analyze attackers", "Speed up connection", "Encrypt passwords"], correct: 1 },
            { question: "Which attack intercepts communication between two parties?", options: ["DDoS", "Ransomware", "Man-in-the-Middle", "Trojan"], correct: 2 }
        ],
        advanced: [
            { question: "What is an XSS vulnerability?", options: ["Cross-Site Scripting", "XML Schema Styling", "X-Ray System Scan", "Cross-Server Setup"], correct: 0 },
            { question: "What does SIEM stand for?", options: ["Security Information and Event Management", "System Integrity Evaluation Matrix", "Secure Internet Exchange Mechanism", "Standard Internal Enterprise Model"], correct: 0 },
            { question: "Which hashing algorithm is widely considered broken?", options: ["SHA-256", "bcrypt", "MD5", "Argon2"], correct: 2 },
            { question: "What is an indicator of compromise (IOC)?", options: ["A firewall setting", "Evidence of a security breach", "A network diagram", "A strong password policy"], correct: 1 },
            { question: "What does zero-day refer to?", options: ["A virus that deletes data instantly", "A newly discovered, unpatched exploit", "The day a network is installed", "Time to resolve a ticket"], correct: 1 }
        ]
    },
    general: {
        beginner: [
            { question: "How many continents are there?", options: ["5", "6", "7", "8"], correct: 2 },
            { question: "What is the capital of Japan?", options: ["Seoul", "Beijing", "Tokyo", "Bangkok"], correct: 2 }
        ],
        moderate: [
            { question: "Who wrote 'Hamlet'?", options: ["Charles Dickens", "William Shakespeare", "Jane Austen", "Mark Twain"], correct: 1 }
        ],
        advanced: [
            { question: "What year did the Titanic sink?", options: ["1912", "1905", "1898", "1923"], correct: 0 }
        ]
    },
    science: {
        beginner: [
            { question: "What is the chemical symbol for Oxygen?", options: ["O", "Ox", "O2", "H2O"], correct: 0 },
            { question: "How many planets are in our solar system?", options: ["7", "8", "9", "10"], correct: 1 }
        ],
        moderate: [
            { question: "What gas do plants absorb during photosynthesis?", options: ["Oxygen", "Carbon Dioxide", "Nitrogen", "Hydrogen"], correct: 1 }
        ],
        advanced: [
            { question: "What is the hardest natural substance on Earth?", options: ["Gold", "Iron", "Diamond", "Quartz"], correct: 2 }
        ]
    },
    math: {
        beginner: [
            { question: "What is 5 + 7?", options: ["10", "11", "12", "13"], correct: 2 },
            { question: "What is 10 * 10?", options: ["100", "1000", "10", "20"], correct: 0 }
        ],
        moderate: [
            { question: "What is the square root of 144?", options: ["10", "11", "12", "14"], correct: 2 },
            { question: "Solve: 3x = 15. What is x?", options: ["3", "4", "5", "10"], correct: 2 }
        ],
        advanced: [
            { question: "What is the derivative of x^2?", options: ["x", "2x", "x^3", "2"], correct: 1 },
            { question: "What is Euler's identity?", options: ["e^(i*pi) + 1 = 0", "E=mc^2", "c^2 = a^2 + b^2", "V = IR"], correct: 0 }
        ]
    },
    hardware: {
        beginner: [
            { question: "What does CPU stand for?", options: ["Central Process Unit", "Computer Personal Unit", "Central Processing Unit", "Central Processor Unit"], correct: 2 },
            { question: "What is RAM?", options: ["Random Access Memory", "Read Access Memory", "Run Application Memory", "Random Application Memory"], correct: 0 }
        ],
        moderate: [
            { question: "What is a PSU?", options: ["Primary Storage Unit", "Power Supply Unit", "Processing Speed Unit", "Performance Scaling Unit"], correct: 1 },
            { question: "What does a GPU mostly render?", options: ["Sound", "Graphics", "Text", "Calculations"], correct: 1 }
        ],
        advanced: [
            { question: "What is a characteristic of RISC architecture?", options: ["Complex instructions", "Reduced instruction set", "Massive cooling required", "High power usage"], correct: 1 },
            { question: "What is the purpose of a Southbridge on older motherboards?", options: ["CPU communication", "High-speed memory", "Slower I/O components", "Video processing"], correct: 2 }
        ]
    },
    space: {
        beginner: [
            { question: "Which planet is known as the Red Planet?", options: ["Jupiter", "Venus", "Mars", "Saturn"], correct: 2 }
        ],
        moderate: [
            { question: "What is the largest moon of Saturn?", options: ["Titan", "Europa", "Ganymede", "Io"], correct: 0 }
        ],
        advanced: [
            { question: "What is a pulsar?", options: ["A black hole", "A highly magnetized rotating neutron star", "A dying dwarf star", "An exploding comet"], correct: 1 }
        ]
    }
};

// Utility to expand and safely return the requested number of questions
const quizData = {};

Object.keys(rawQuizData).forEach(category => {
    quizData[category] = {};
    const difficulties = ['beginner', 'moderate', 'advanced'];
    
    difficulties.forEach(diff => {
        let baseQuestions = rawQuizData[category][diff] || [ { question: "Dummy Question?", options: ["A","B","C","D"], correct: 0 } ];
        
        // Ensure we always have at least 15 items by looping the base questions
        let expanded = [];
        while (expanded.length < 15) {
            expanded = expanded.concat(baseQuestions);
        }
        
        // Shuffle the array simply
        expanded = expanded.sort(() => 0.5 - Math.random());
        
        quizData[category][diff] = expanded;
    });
});
