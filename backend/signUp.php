<?php
    function validateAndSanitizeInput(&$firstName, &$lastName, &$address, &$phone, &$username, &$email, &$password) {
        $firstName = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
        $lastName = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($email))
            return false;
        return true;
    }

    function enterDataInDatabase(&$firstName, &$lastName, &$address, &$role, &$department, &$phone, &$username, &$email, &$password) {
        $employeeQuery = "INSERT INTO employee (first_Name, last_Name, address, phone, username, email, password, role_Name, dept_Name) VALUES ('{$firstName}', '{$lastName}', '{$address}', '{$phone}', '{$username}', '{$email}', '{$password}', '{$role}', '{$department}');";
        $departmentQuery = "UPDATE department SET count = count + 1 WHERE dept_Name = '{$department}';";
        $roleQuery = "UPDATE role SET count = count + 1 WHERE role_Name = '{$role}';";

        include ("./database.php");
        $conn = connectToDB();
        try {
            if (mysqli_query($conn, $employeeQuery) && mysqli_query($conn, $roleQuery) && mysqli_query($conn, $departmentQuery))
                header("location: ../frontend/signIn.html");
        } catch (mysqli_sql_exception) {
            echo "<html>
                <p class='warning'>An employee with such username or email or phone already exists!</p>
                </html>";
        }
        mysqli_close($conn);
    }

    if (isset($_POST["signup"])) {
        $firstName = $_POST["fname"];
        $lastName = $_POST["lname"];
        $address = $_POST["address"];
        $role = $_POST["role"];
        $department = $_POST["dept"];
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        if (validateAndSanitizeInput($firstName, $lastName, $address, $phone, $username, $email, $password)) {
            enterDataInDatabase($firstName, $lastName, $address, $role, $department, $phone, $username, $email, $password);
        }

    }
?>