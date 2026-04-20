<?php
        session_start();
        
        function sanitizeData($data) {
                return preg_replace('/[^a-zA-Z0-9]/', '', $data);
        }

        $errormsg = "";

        if(isset($_GET['action']) && $_GET['action'] === 'logout') {
                session_unset();
                session_destroy();
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = sanitizeData($_POST['username'] ?? '');
                $password = sanitizeData($_POST['password'] ?? '');

                if($username === 'admin' && $password === 'password') {
                        $_SESSION['logged_in'] = true;
                        $_SESSION['username'] = $username;
                        header("Location: " . $_SERVER['PHP_SELF']);
                        exit();
                }
                else {
                        $errormsg = "Invalid login.";
                }
        }
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <title>Login</title>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width" />
        </head>
        <body>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                        <h1>Logged in.</h1>
                        <a href="?action=logout" class="logout-link">Logout</a>
                <?php else: ?>
                        <?php if($errormsg) {
                                        echo $errormsg; 
                                }
                        ?>
                        <form action="login.php" method="post">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" required><br>
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required><br>
                                <input type="submit" value="Submit">
                        </form>
                <?php endif; ?>
        </body>
</html>