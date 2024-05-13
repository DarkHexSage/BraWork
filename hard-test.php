<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shell in a Box and Exercises</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            display: flex;
            height: 100%;
        }

        #shell-container {
            width: 72%;
            height: 100%;
            border-right: 1px solid #ccc;
        }

        #exercises-container {
            width: 50%;
            height: 100%;
            overflow-y: scroll;
            padding: 20px;
            position: relative;
        }

        #timer {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            color: white;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .green {
            background-color: green;
        }

        .yellow {
            background-color: yellow;
        }

        .red {
            background-color: red;
        }

        .challenge-button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .challenge-button:hover {
            background-color: #0056b3;
        }

        .success {
            background-color: green;
            color: white;
        }

        .failure {
            background-color: red;
            color: white;
        }

        .challenge {
            margin-bottom: 20px;
        }

        .challenge h3 {
            margin-bottom: 10px;
        }

        .challenge p {
            margin-bottom: 15px;
        }

        .challenge strong {
            font-weight: bold;
        }

        .challenge ul {
            list-style-type: none;
            padding-left: 0;
        }

        .challenge li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Shell in a Box -->
        <div id="shell-container">
            <iframe src="http://131.186.0.96:4603"></iframe>
            <!-- Replace "http://localhost:4200" with the URL of your Shell in a Box server -->
        </div>

        <!-- Exercises -->
        <div id="exercises-container">
            <h1>Linux Exercises Hard 1</h1>
                <strong>Username:</strong> candidate <br>
                <strong>Password:</strong> candidate123 <br>
            <div id="timer">30:00</div> <!-- Timer added here -->
            <div class="challenge">
                <h3>Challenge 1:</h3>
                <p><strong>Scenario:</strong><br>
                    Our weather script a critical tool for daily forecasting, abruptly ceased functioning following a system reboot. As users rely heavily on this application for weather updates, restoring its functionality is imperative.</p>
                <p><strong>Objective:</strong><br>
                    Investigate with strace and rectify the issue with the weather application.</p>
                <p><strong>Context:</strong><br>
                    The weather script file is located at "<strong>/opt/weatherapp/weather.sh </strong>".</p>
                <button id="challenge1Button" class="challenge-button" onclick="verifyChallenge(1)">Verify Challenge 1</button>
            </div>

            <div class="challenge">
                <h3>Challenge 2:</h3>
<p><strong>Task: Network Traffic Analysis for Usernames and Passwords</strong></p>
<p><strong>Objective:</strong><br>
Our organization is proactively enhancing network security by analyzing HTTP traffic within our network environment. The primary goal of this initiative is to identify instances of sensitive information, particularly usernames and passwords, being transmitted in clear text over HTTP protocols.</p>
<p><strong>Instructions:</strong><br>
Please analyze the provided pcap file located at "/challenge/captured_traffic.pcap". Your task is to extract all usernames and passwords found within the HTTP traffic. Once identified, please store each username-password pair in separate text files using the following format:</p>
<p>username:password</p>
<p>For instance, if the username is "john" and the password is "password", they should be stored in a file named /challenge/creds1.txt. Similarly, if the username is "goblin" and the password is "solaire12", they should be stored in a file named /challenge/creds2.txt, and so forth.</p>
<ul>
    <li><strong>creds1.txt:</strong> creds from referer: http://sct.gob.mx/login/</li>
    <li><strong>creds2.txt:</strong> creds from referer: http://testphp.vulnweb.com/login.php</li>
    <li><strong>creds3.txt:</strong> creds from referer: http://dsoluciones.com.ar/sistema/login.php</li>
</ul>


                
                <button id="challenge2Button" class="challenge-button" onclick="verifyChallenge(2)">Verify Challenge 2</button>
            </div>


            <br><strong> Wishing you the best of luck on your Linux adventure!</strong>
        </div>
    </div>

    <script>
        function updateColor(minutes) {
            const timer = document.getElementById('timer');

            if (minutes >= 15 && minutes <= 30) {
                timer.className = 'green';
            } else if (minutes >= 5 && minutes < 15) {
                timer.className = 'yellow';
            } else if (minutes >= 0 && minutes < 5) {
                timer.className = 'red';
            }
        }

        function startTimer() {
            let totalSeconds = 30 * 60;

            function update() {
                let minutes = Math.floor(totalSeconds / 60);
                let seconds = totalSeconds % 60;

                updateColor(minutes);

                if (totalSeconds > 0) {
                    document.getElementById('timer').innerText = pad(minutes) + ":" + pad(seconds);
                    totalSeconds--;
                    setTimeout(update, 1000); // Update every second (1000 milliseconds)
                }
            }

            update(); // Start the initial update
        }

        function pad(val) {
            const valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        }

        function executeCommand(command) {
            // Execute the provided command
            alert("Executing command: " + command);
            // Implement your logic to execute the command here
        }

        function verifyChallenge(challengeNumber) {
            var buttonId = "challenge" + challengeNumber + "Button";
            var button = document.getElementById(buttonId);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        if (xhr.responseText.trim() === 'success') {
                            if (button.classList.contains("failure")) { // Check if the button failed
                                // Reset the button after 2 seconds
                                setTimeout(function() {
                                    button.innerText = "Verify Challenge " + challengeNumber;
                                    button.classList.remove("failure");
                                    button.classList.remove("success");
                                }, 2000);
                            }
                            button.innerText = "Success";
                            button.classList.remove("failure");
                            button.classList.add("success");
                        } else {
                            button.innerText = "Failure"; // Update the button text to indicate failure
                            button.classList.remove("success");
                            button.classList.add("failure");

                            // Reset the button after 2 seconds
                            setTimeout(function() {
                                button.innerText = "Verify Challenge " + challengeNumber;
                                button.classList.remove("failure");
                                button.classList.remove("success");
                            }, 2000);
                        }
                    }
                }
            };
            xhr.open("GET", "/verify-challenge-hard" + challengeNumber + ".php", true);
            xhr.send();
        }

        window.onload = startTimer;
    </script>
</body>
</html>
