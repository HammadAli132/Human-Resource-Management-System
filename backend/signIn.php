<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signning In | HRMS</title>
    <link rel="stylesheet" href="../frontend/style.css">
</head>
<body>
</body>
</html>

<?php
    function sessionCreated(&$username, &$password) {
        include ("./database.php");
        $conn = connectToDB();
        $query = "SELECT * FROM employee
                  WHERE employee.username = '{$username}' 
                  AND employee.password = '{$password}';";
        $data = mysqli_query($conn, $query);
        mysqli_close($conn);
        $result = mysqli_fetch_all($data, MYSQLI_ASSOC);
        if (empty($result)) return false;
        foreach ($result as $row => $employee) {
            foreach ($employee as $key => $value) {
                $_SESSION["{$key}"] = "{$value}";
            }
        }
        return true;
    }

    if (isset($_POST["signIn"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (sessionCreated($username, $password)) {
            switch ($_SESSION["role_Name"]) {
                case "employee":
                    header("location: ../frontend/employeeDashboard.php");
                    break;
                case "hr":
                    header("location: ../frontend/hrDashboard.php");
                    break;
                case "admin":
                    header("location: ../frontend/adminDashboard.php");
                    break;
            }
        }
        else
            echo "<html>
                    <p class='warning'>Wrong Login Credentials!</p>
                </html>";
    }
?>