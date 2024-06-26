
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
            <iframe src="http://131.186.0.96:4802"></iframe>
            <!-- Replace "http://localhost:4200" with the URL of your Shell in a Box server -->
        </div>

        <!-- Exercises -->
        <div id="exercises-container">
            <h1>K8s Exercises Mid 2</h1>
                <strong>Username:</strong> candidate <br>
                <strong>Password:</strong> candidate123 <br>
            <div id="timer">30:00</div> <!-- Timer added here -->
            <div class="challenge">
                           <!-- Challenge 1 -->
            <div class="challenge-container">
                <h3>Challenge 1: Netpods</h3>
               <p><strong>Scenario:</strong><br>
                     ZenCorp requires a pod named netcapod image alpine, with "NET_ADMIN"  capability within namespace netprod on its Kubernetes cluster to monitor network traffic and diagnose potential issues..</p>
                <p><strong>Objective:</strong><br>
                    Deploy a pod with netcap administrative capabilities, allowing it to capture and analyze network traffic for diagnostic and troubleshooting purposes within the Kubernetes cluster. The pod should be named accordingly, reside in the appropriate namespace, and use the specified image..</p>
                <button id="challenge1Button" class="challenge-button" onclick="verifyChallenge(1)">Verify Challenge 1</button>
            </div>

            <!-- Challenge 2 -->
            <div class="challenge-container">
                <h3>Challenge 2: RBAC Provisioning</h3>
                <p><strong>Scenario: ZenCorp needs to define user roles and permissions within its Kubernetes cluster to manage access to resources effectively.

</strong><br>
                    </p>
                <p><strong>Objective:</strong><br>
                    In this exercise, create a new namespace named "rbac-example", define a Role titled "pod-reader" enabling users to list and read Pods within the namespace, and establish a RoleBinding named "read-pods" associating the "pod-reader" Role with the default ServiceAccount.</p>
                <button id="challenge2Button" class="challenge-button" onclick="verifyChallenge(2)">Verify Challenge 2</button>
            </div>


            <br><strong> Wishing you the best of luck on your Kubernetes adventure!</strong>
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
            xhr.open("GET", "/verify-challengek8s-mediumt" + challengeNumber + ".php", true);
            xhr.send();
        }

        window.onload = startTimer;
    </script>
</body>
</html>
