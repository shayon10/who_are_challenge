<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Which Character Are You? - Question</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        /* Additional styling for the animated question pattern */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            
        }
        body {
            background-color: white;
            font-family: Arial, sans-serif;
            margin: 10;
            padding: 10;
        }

        .question {
            width: 400px;
            height: 300px;
            
            background-color: rgb(255, 255, 128);

            border-radius: 10px;
            padding: 20px;
            margin: 30px 20px 20px 0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            font-size: 20px;
            font-weight: bold;
            display: inline-block;
            
        }

        .question.active {
            opacity: 1;
        }

        #nextBtn {
            margin-top: 20px;
        }

        .result {
            margin-top: 30px;
            display: none; /* Initially hide the result */
        }

        /* Additional styling for the glitch effect on the header */
        .glitch-wrapper {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: #20B2AA;
            
        }

        .glitch {
            position: relative;
            font-size: 80px;
            font-weight: bold;
            color: #FFFFFF;
            letter-spacing: 3px;
            z-index: 1;
        }

        .glitch:before,
        .glitch:after {
            display: block;
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0.8;
        }

        .glitch:before {
            animation: glitch-it 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) both infinite;
            color: #00FFFF;
            z-index: -1;
        }

        .glitch:after {
            animation: glitch-it 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) reverse both infinite;
            color: #FF00FF;
            z-index: -2;
        }

        @keyframes glitch-it {
            0% {
                transform: translate(0);
            }
            20% {
                transform: translate(-2px, 2px);
            }
            40% {
                transform: translate(-2px, -2px);
            }
            60% {
                transform: translate(2px, 2px);
            }
            80% {
                transform: translate(2px, -2px);
            }
            to {
                transform: translate(0);
            }
        }

        img {
            width: 100%;
            max-width: 500px;
             height: 400px; /* Set the height */
             object-fit: cover;
               border: 10px solid #20B2AA; /* Add a white border */
               border-radius: 20px;
              margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="glitch-wrapper">
        <div class="glitch" data-text="Question">Question</div>
    </div>
    <div class="container">
        <div id="questions">
            <?php
            // Sample questions and options
            $questions = array(
                "When playing cricket, what's your preferred role on the field?",
                "How do you handle pressure during a match?",
                "What's your leadership style on the cricket field?",
                "How do you approach challenges on the cricket field?",
                "What's your attitude towards teamwork in cricket?"
            );

            $options = array(
                array('All-rounder', 'batsman', 'bowler', 'Captain', 'Wicketkeeper'),
                array('Calm and focused', 'Aggressively', 'Strategically', 'Motivationally', 'Confidently'),
                array('Lead from the front', 'Lead by example', 'Motivate and inspire', 'Lead with strategic thinking', 'Lead with passion'),
                array('Analyze and adapt', 'Stay aggressive and attack', 'Stay calm and execute plan', 'Lead the team through difficult times', 'Find innovative solutions'),
                array('Value individual contributions', 'Encourage teamwork and unity', 'Trust in team efforts', 'Lead by setting an example', 'Communicate and collaborate')
            );

            // Loop through questions and options to display them
            for ($i = 0; $i < count($questions); $i++) {
                echo "<div class='question'>";
                echo "<p>$questions[$i]</p>";
                echo "<form>"; // You may adjust this structure as needed
                foreach ($options[$i] as $option) {
                    echo "<input type='radio' name='question_$i' value='$option'> $option<br>";
                }
                echo "</form>";
                echo "</div>";
            }
            ?>

        </div>
        <button id="nextBtn" class="btn" onclick="nextQuestion()">Next</button> 
        <!-- Button to navigate to the next question -->
            <!-- Retry button -->
        <a href="questionnaire.php" class="btn">Retry</a>

        <!-- Home button -->
        <a href="index.php" class="btn">Home</a>

        <!-- Result container -->
        <div id="result" class="result">
            <!-- Result will be dynamically inserted here -->
        </div>
    </div>

    <script>
        // JavaScript for animated question pattern
        const questions = document.querySelectorAll('.question');
        let currentQuestionIndex = 0;

        function showQuestion(index) {
            questions.forEach((question, idx) => {
                if (idx === index) {
                    question.classList.add('active');
                } else {
                    question.classList.remove('active');
                }
            });
        }

        function nextQuestion() {
            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion(currentQuestionIndex);
            } else {
                showResult(); // Show the result when all questions are answered
            }
        }

        function showResult() {
            const resultContainer = document.getElementById('result');
            const userResponses = []; // Array to store user's responses

            // Loop through all questions
            questions.forEach((question, index) => {
                const selectedOption = question.querySelector('input[name="question_' + index + '"]:checked');
                if (selectedOption) {
                    // Add the selected option to the user's responses
                    userResponses.push(selectedOption.value);
                } else {
                    // If no option is selected, handle it accordingly (you may choose to ignore or prompt the user)
                    console.error('Please answer question ' + (index + 1));
                    return; // Exit the loop
                }
            });

            // Define characters with associated traits and initialize scores
            const characters = [
                {
                    name: "Shakib Al Hasan",
                    traits: ["All-rounder", "Aggressive player", "Leadership qualities"],
                    image: "https://live-production.wcms.abc-cdn.net.au/9ec653b99fc1c309269efbad6d85addd?impolicy=wcms_crop_resize&cropH=1125&cropW=2000&xPos=0&yPos=120&width=862&height=485"
                },
                {
                    name: "Mushfiqur Rahim",
                    traits: ["Wicketkeeper", "Calm under pressure", "Strategic thinker"],
                    image: "https://akm-img-a-in.tosshub.com/sites/visualstory/wp/2023/09/Mushfiqur-Rahim-4.jpg?size=*:900"
                },
                {
                    name: "Tamim Iqbal",
                    traits: ["batsman", "Aggressive player", "Team motivator"],
                    image: "https://www.bssnews.net/assets/news_photos/2022/06/09/image-65559-1654775851.jpg"
                },
                {
                    name: "Mashrafe Mortaza",
                    traits: ["bowler", "Inspirational captain", "Resilient"],
                    image: "https://p.imgci.com/db/PICTURES/CMS/223900/223989.6.jpg"
                },
                {
                    name: "Mustafizur Rahman",
                    traits: ["bowler", "Deceptive variations", "Cool-headed"],
                    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYsBgxt_A_Al-Il142mPms8X1v8kp8-hUyaEFHp5252Q&s"
                }
            ];

            // Calculate the score for each character based on user's responses
            const characterScores = {};
            characters.forEach(character => {
                characterScores[character.name] = 0; // Initialize scores to 0
                userResponses.forEach(response => {
                    if (character.traits.includes(response)) {
                        characterScores[character.name]++;
                    }
                });
            });

            // Find the character with the highest score
            let maxScore = -1;
            let resultCharacter = null;
            for (const [character, score] of Object.entries(characterScores)) {
                if (score > maxScore) {
                    maxScore = score;
                    resultCharacter = character;
                }
            }

            // Display the result
            if (resultCharacter) {
                const resultCharacterData = characters.find(char => char.name === resultCharacter);
                resultContainer.innerHTML = `<h2 id="name">You are ${resultCharacter}!</h2><img src="${resultCharacterData.image}" alt="${resultCharacter}">`;
            } else {
                resultContainer.innerHTML = `<h2>No result found.</h2>`;
            }
            resultContainer.style.display = 'block'; // Show the result container
        }

        // Show the first question initially
        showQuestion(currentQuestionIndex);
    </script>
</body>
</html>
