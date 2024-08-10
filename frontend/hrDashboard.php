<?php
    session_start();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Dashboard | HRMS</title>
    <link rel='stylesheet' href='./style.css'>
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