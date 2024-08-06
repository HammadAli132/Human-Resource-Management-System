<?php
    function connectToDB() {
        $db_server = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "hrms";
        $db_connection = null;

        try {
            $db_connection = mysqli_connect($db_server, $db_username, $db_password, $db_name);
            return $db_connection;
        } catch (mysqli_sql_exception) {
            echo "<html>
                        <p class='warning'>sorry! couldn't connect to database.</p>
                  </html>";
        }
    }
?>