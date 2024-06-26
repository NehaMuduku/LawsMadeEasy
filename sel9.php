<!DOCTYPE html>
<html>
<head>
    <title>Vertical Frames Example</title>
    <style>
        body {
            background-color: #0e4254; /* Set your desired background color here */
            text-align: center; /* Center-align text */
            font-family: Arial, sans-serif; /* Define a font-family */
            color: #fff; /* Set text color */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }
        iframe {
            margin: 20px 0; /* Add some space above and below the iframe */
        }
        h3 {
            margin: 10px 0; /* Add some space above and below each heading */
        }
        .container {
            max-width: 800px;
            max-height: auto; /* Set your desired maximum height */
            margin: 0 auto; /* Center the container horizontally */
            padding: 20px; /* Add some padding to the container */
            background-color: rgba(146, 208, 225, 0.9); /* Set a semi-transparent white background */
            border-radius: 10px; /* Add rounded corners to the container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a shadow to the container */
        }
        h1 {
            color: #3498db; /* Set a different color for headings */
        }
    </style>
</head>
<body>
    <center>
        <section>
            <div>
                <div>
                <div id="google_translate_element"></div>
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                <script type="text/javascript">
                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                }
                </script>
                </div>

                <!-- Your PHP code here -->
                <?php
                // Database configuration
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "website";

                // Create a connection to the database
                $conn = new mysqli($servername, $username, $password, $database);

                // Check the connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }


                $article = 'The Right of Children to Free and Compulsory Education Act, 2009 (RTE Act)';

                echo "<div class='container'>";
                echo "<img src='img/road5.jpeg' width=50%  height=50%/>";


                if ($article) {
                    $sql = "SELECT * FROM advaya where article='$article'";

                    // Execute the query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<h1 style='color:blue'>" . "ARTICLE: " . "</h1><p style='color:purple; font-size :25px'>" . " " . $row["article"] . "<br>";
                            echo "<h3 style='color:blue'>" . "  SECTIONS: " . "</h3><p style='color:purple;font-size:25px'>" . $row["sections"] . "</p><br>";
                            echo "<h3 style='color:blue'>" . " INFORMATION: " . "</h3><p style='color:purple;font-size:25px'>" . $row["info"] . "</p><br>";
                            echo "<h3 style='color:blue'>" . " PUNISHABLE " . "</h3><p style='color:purple;font-size:25px'>" . $row["punish"] . "<br><br><br><br><br><br><br>";
                        }
                    } else {
                        echo "0 results";
                    }
                }

                // Close the database connection
                $conn->close();
                echo "</div>";
                ?>
                <!-- End of your PHP code -->

            </div>
        </section>
    </center>
</body>
</html>
