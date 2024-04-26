<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the "Which Character Are You?" Quiz Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:black;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure that the body takes up at least the full viewport height */
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            text-align: center;
            flex-grow: 1; /* Allow the container to grow to fill the available space */
        }

        h1 {
            color:#fff ;
            font-size: 36px;
            margin-bottom: 10px;
        }

        p {
            color: #fff;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: #ff5722;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #ff7043;
        }

        .main-image {
            width: 700px;
            height: 500px;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .features {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            
        }

        .feature {
            margin: 0 20px;
        }

        .feature-icon {
            font-size: 48px;
            color: #fff;
            margin-bottom: 10px;
        }

        .feature-title {
            color: #fff;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .feature-description {
            color: #fff;
            font-size: 16px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            flex-shrink: 0; /* Prevent the footer from shrinking */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the "Which Character Are You?" Quiz Game</h1>
        <p>Discover which Bangladesh cricketer best matches your personality!</p>
        <a href="questionnaire.php" class="btn">Start Quiz</a>
        <img src="https://ecdn.dhakatribune.net/contents/cache/images/1100x618x1/uploads/dten/2021/10/21/bangladesh-cricket.jpeg" alt="Quiz Image" class="main-image">
        
        <div class="features">
            <div class="feature">
                <span class="feature-icon">🏏</span>
                <div class="feature-title">Cricketer Personalities</div>
                <div class="feature-description">Explore a variety of cricketer personalities and find out which one resonates with you the most.</div>
            </div>
            <div class="feature">
                <span class="feature-icon">🔍</span>
                <div class="feature-title">Detailed Analysis</div>
                <div class="feature-description">Get a detailed analysis of your personality traits and how they align with each cricketer's characteristics.</div>
            </div>
            <div class="feature">
                <span class="feature-icon">💬</span>
                <div class="feature-title">Share Results</div>
                <div class="feature-description">Share your quiz results with friends and challenge them to discover their own cricketing personality.</div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024  Quiz App</p>
    </footer>
</body>
</html>
