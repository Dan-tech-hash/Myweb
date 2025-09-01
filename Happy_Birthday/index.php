<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    if ($code === "manang") {
        header("Location: message.php");
        exit();
    } else {
        $error = "Oops! Wrong code ❌";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Surprise</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: "Poppins", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #000000, #1a1a1a, #2c2c2c);
            color: white;
            padding: 20px;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.05);
            padding: 30px 25px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.8);
            width: 100%;
            max-width: 400px;
        }
        h2 { margin-bottom: 15px; font-size: 22px; }
        input[type="text"] {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            border: none;
            margin: 12px 0;
            font-size: 16px;
            text-align: center;
            outline: none;
        }
        input[type="submit"] {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #ff4081;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 8px;
            transition: 0.3s;
        }
        input[type="submit"]:hover { background: #e73370; }
        .hint { margin-top: 12px; font-size: 14px; color: #bbb; }
        .error { color: #ff6b6b; margin-top: 10px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔒 Enter Secret Code</h2>
        <form method="post">
            <input type="text" id="code" name="code" placeholder="Enter code">
            <input type="submit" value="Unlock">
        </form>
        <?php if (!empty($error)) { echo "<div class='error'>$error</div>"; } ?>
        <div class="hint">Hint: It’s what I always call you 🖤</div>
    </div>
</body>
</html>
