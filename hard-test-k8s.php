
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
            <iframe src="http://131.186.0.96:4803"></iframe>
            <!-- Replace "http://localhost:4200" with the URL of your Shell in a Box server -->
        </div>

        <!-- Exercises -->
        <div id="exercises-container">
            <h1>K8s Exercises Hard</h1>
            <div id="timer">30:00</div> <!-- Timer added here -->
            <div class="challenge">
                           <!-- Challenge 1 -->
            <div class="challenge-container">
                <h3>Exercise 1: Persistent Volume Claim (PVC)</h3>
                <p><strong>Scenario:</strong><br>
                    Your company needs you to set up Persistent storage for one of it's pods</p>
                <p><strong>Objective:</strong><br>
                    Create a PVC named "app-data-pvc" with a storage class of your choice, requesting 1Gi of storage.
Deploy a pod named "web-app" using an image of your choice and mount the PVC to the path "/app/data" within the container all resource must be on default namespace.
Verify that the pod is successfully running and the PVC is bound..</p>
                <button id="challenge1Button" class="challenge-button" onclick="verifyChallenge(1)">Verify Challenge 1</button>
            </div>

            <!-- Challenge 2 -->
            <div class="challenge-container">
                <h3>Exercise 2: Service Account</h3>
                <p><strong>Scenario:</strong><br>
                    Zencomp needs you to create a Service Account and bind it to a pod..</p>
                <p><strong>Objective:</strong><br>
		    Create a Service Account named "app-sa" within the default namespace.
Deploy a pod named "app-pod" using an image of your choice and bind the "app-sa" Service Account to it.
Verify that the pod is running and uses the specified Service Account..</p>
                <button id="challenge2Button" class="challenge-button" onclick="verifyChallenge(2)">Verify Challenge 2</button>
            </div>

            <!-- Challenge 3 -->
            <div class="challenge-container">
                <h3>Exercise 3: Resource Limitation</h3>
                <p><strong>Scenario:</strong><br>
                    Enforce CPU and memory resource limitations for a deployment..</p>
                <p><strong>Objective:</strong><br>
                    Deploy an application named "resource-app" using an image of your choice.
Configure resource limits of 500m CPU and 512Mi memory for the application.
Scale the deployment to 3 replicas.
Verify that the resources are properly limited for each replica..</p>
                <button id="challenge3Button" class="challenge-button" onclick="verifyChallenge(3)">Verify Challenge 3</button>
            </div>

            <!-- Challenge 4 -->
            <div class="challenge-container">
                <h3>Exercise 4: Services and Ingress</h3>
                <p><strong>Scenario:</strong><br>
                   Configure Environment Variables using ConfigMaps</p>
                <p><strong>Objective:</strong><br>
                    Create a ConfigMap named app-config containing environment variables for an application.

Deploy a pod named app-pod redis image within the configspace namespace.

Mount the ConfigMap to the pod's environment to access the configuration.

Create a ConfigMap named app-config with the following key-value pairs:
DB_HOST: db-server
DB_PORT: 5432
APP_ENV: production
</p>

                <button id="challenge4Button" class="challenge-button" onclick="verifyChallenge(4)">Verify Challenge 4</button>
            </div>

            <br><strong> Wishing you the best of luck on your K8s adventure!</strong>
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
            xhr.open("GET", "/verify-challengek8s-hard" + challengeNumber + ".php", true);
            xhr.send();
        }

        window.onload = startTimer;
    </script>
</body>
</html>

