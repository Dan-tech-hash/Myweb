
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php"); // if not logged in, go back to login
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <style>
    * {
      color: white;
      box-sizing: border-box;
    }

    .CA1, h2, h5 {
      margin: 0px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      letter-spacing: 1px;
    }
    h2 {
      font-size: 23px;
    }
    h5 {
      font-size: 11px;
      color: darkgray;
    }

    body {
      margin: 0px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    header {
      background-color: #1e3a8a;
      padding: 10px 16px;
    }

    img {
      width: 50px;
      display: flex;
      align-items: center;
    }

    .box {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .CA1 {
      flex-grow: 1;
      margin-left: 10px;
    }

    nav ul {
      gap: 40px;
      display: flex;
      margin: 0;
      padding: 0;
      list-style: none;
    }

    nav ul li {
      margin: 0;
    }

    nav a {
      text-decoration: none;
      color: white;
      font-size: 16px;
      font-weight: 600;
    }

    /* Hamburger menu button */
    .menu-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 26px;
      cursor: pointer;
      color: white;
    }

    /* Responsive design */
    @media (max-width: 768px) {
      nav ul {
        display: none; /* hide menu by default */
        flex-direction: column;
        background: #1e3a8a;
        position: absolute;
        top: 60px;
        right: 16px;
        width: 200px;
        border-radius: 6px;
        padding: 12px;
      }

      nav ul.show {
        display: flex;
      }

      .menu-toggle {
        display: block;
      }
  
  </style>
</head>
<body>

<header>
  <div class="box">
    <div> 
      <img src="Adobe Express - file.png" alt="logo"> 
    </div>
    <div class="CA1">
      <h2>Colegio De Santa Rita Inc</h2>
      <h5>Admin Cantojos | CSR SCC</h5>
    </div>
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
   
    <nav class="des">
      <ul id="menu">
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </nav>
  </div>
</header>

  <script>
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");

    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("hidden");
      main.classList.toggle("full");
    });
  </script>
  <a href="logout.php" style="background: #1e3a8a;">Logout</a>
</body>
</html>
