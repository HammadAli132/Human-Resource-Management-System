<?php
    session_start();
    if (empty($_SESSION["username"])) {
        header("location: ./signIn.html");
    }
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Dashboard | HRMS</title>
    <link rel='stylesheet' href='./style.css'>
    <script src="./employee.js" defer></script>
</head>
<body>
    <header>
        <nav>
            <h1 id='site-title'>HRMS</h1>
            <div id='loggings'>
                <form id="logout-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <button type="submit" name="logout" id="logout" class="btn">Log Out</button>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <div class="sideBar">
            <p id="user-fullname">
                <?php echo "{$_SESSION['first_Name']} {$_SESSION['last_Name']}"?>
            </p>
            <p id="user-role">
                <?php echo ucfirst($_SESSION['role_Name']) ?>
            </p>
            <hr>
            <ul>
                <li id="view-profile" class="function">My Profile</li>
                <li id="leave-request" class="function">Request Leave</li>
                <li id="view-leaves" class="function">My Leaves</li>
            </ul>
        </div>
        <section id="profile">
            <p>
                <span class="bold">Name: </span>
                <?php echo "{$_SESSION['first_Name']} {$_SESSION['last_Name']}"?>
            </p>
            <p>
                <span class="bold">Address: </span>
                <?php echo ucfirst($_SESSION['address']) ?>
            </p>
            <p>
                <span class="bold">Phone Number: </span>
                <?php echo ucfirst($_SESSION['phone']) ?>
            </p>
            <p>
                <span class="bold">Role: </span>
                <?php echo ucfirst($_SESSION['role_Name']) ?>
            </p>
            <p>
                <span class="bold">Department: </span>
                <?php 
                    switch ($_SESSION['dept_Name']) {
                        case "qa":
                            echo "Quality Assurance";
                            break;
                        case "dev":
                            echo "Development";
                            break;
                        case "cyb-sec":
                            echo "Cyber Security";
                            break;
                        case "dev-ops":
                            echo "Dev Ops";
                            break;
                    }
                ?>
            </p>
            <p>
                <span class="bold">Username: </span>
                <?php echo $_SESSION['username'] ?>
            </p>
            <p>
                <span class="bold">Email: </span>
                <?php echo $_SESSION['email'] ?>
            </p>
            <p>
                <span class="bold">Password: </span>
                <?php echo $_SESSION['password'] ?>
            </p>
        </section>
        <section id="leave">
            
        </section>
        <section id="leave-table">
            
        </section>
    </main>
</body>
</html>

<?php
    if (isset($_POST["logout"])) {
        session_destroy();
        header("location: ./signIn.html");
        exit();
    }
?>