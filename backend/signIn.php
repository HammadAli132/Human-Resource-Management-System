<?php
    session_start();

    function sessionCreated(&$username, &$password) {
        include ("./database.php");
        $conn = connectToDB();
    }

    if (isset($_POST["signIn"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (sessionCreated($username, $password)) {
            header("location: ../frontend/dashboard.html");
        }
        else
        echo "<html>
                  <p class='warning'>Wrong Login Credentials!</p>
              </html>";
    }
?>