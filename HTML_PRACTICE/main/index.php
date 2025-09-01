<?php
session_start();

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded username and password
    $valid_username = "admin";
    $valid_password = "pass";

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if entered credentials are correct
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['logged_in'] = true; // set session
        header("Location: dashboard.php"); // redirect to next page
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Reset & Body */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Login Card */
        .login-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0px 6px 16px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
        }

        .login-container img {
            width: 80px;
            margin-bottom: 15px;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #1e3a8a;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 6px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 16px;
            outline: none;
            transition: 0.2s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #2563eb;
            box-shadow: 0 0 5px rgba(37,99,235,0.5);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #1e3a8a;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #2563eb;
        }

        .footer-text {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Logo -->
        <img src="Adobe Express - file.png" alt="CSR-SCC Logo">

        <h2>Login to Dashboard</h2>
        <?php if (!empty($error)) echo "<p class='error-message'>$error</p>"; ?>

        <form method="post" action="">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
        </form>

        <p class="footer-text">© 2025 CSR-SCC • All Rights Reserved</p>
    </div>

</body>
</html>
