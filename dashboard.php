<?php
  // Retrieve data from the database or perform necessary calculations
  $milkQuantity = "1000 liters";
  $feedAmount = " 1,00000 kg";
  $profit = "30,000$";

  // Check if the user has selected a mode
  $mode = isset($_POST['mode']) ? $_POST['mode'] : '';

  // Set the theme based on the selected mode
  if ($mode === 'dark') {
    $themeClass = 'dark-theme';
    $menuClass = 'dark-menu';
  } else {
    $themeClass = 'light-theme';
    $menuClass = 'light-menu';
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DairyBot Farm Dashboard</title>
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
  <style>
    body {
      background-color: #f8f8f8;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Theme Styles */

    .dark-theme {
      background-color: #333;
      color: #fff;
    }

    .dark-theme .header {
      background-color: #222;
    }

    .dark-theme .profile,
    .dark-theme .menu {
      color: #fff;
    }

    .dark-theme .menu a {
      color: #fff;
    }

    .dark-menu {
      border: 2px solid #007bff;
      background-color: #333;
    }

    /* End of Theme Styles */

    .header {
      background-color: #FFFFFF;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #f7c35f;
      margin-bottom: 30px;
      font-size: 30px;
      font-weight: bold;
    }

    h3 {
      color: #f7c35f;
      font-size: 24px;
      margin-top: 2px;
      margin-bottom: 20px;
    }

    span {
      margin-right: 20px;
    }

    .profile {
      display: flex;
      align-items: center;
      margin-left: auto;
    }

    #image {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    #adminWord {
      color: #f7c35f;
      font-size: 18px;
      cursor: pointer;
    }

    .menu {
      display: flex;
      flex-direction: column;
      margin-top: 20px;
      border-radius: 8px;
      padding: 20px;
      opacity: 0;
      transform: translateY(-20px);
      animation: slideInMenu 0.5s forwards;
    }

    #menuWord {
      color: #f7c35f;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .menu a {
      color: #000;
      text-decoration: none;
      margin-bottom: 10px;
      font-size: 16px;
    }

    .menu a:hover {
      text-decoration: underline;
    }

    @keyframes slideInMenu {
      0% {
        opacity: 0;
        transform: translateY(-20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .container {
      display: flex;
      padding: 10px;
    }

    .content {
      margin-left: 50px;
      margin-top: 30px;
      background-color: #FFFFCC;
      padding: 20px;
      width: 100%;
      font-size: 14px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .logo {
      margin: 0 10px;
      max-width: 200px;
      max-height: 100px;
    }

    @media (min-width: 600px) {
      .logo{
        margin: 0 calc(10px / (2 - 1));
    }
}

    .dashboard-section {
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .section-heading1 {
      color: #f7c35f;
      font-size: 24px;
      margin-bottom: 20px;
      font-weight: bold;
    }

    .section-heading2 {
      color: #fff;
      font-size: 20px;
      margin-bottom: 10px;
    }

    .section-heading3 {
      color: #f7c35f;
      font-size: 24px;
      margin-bottom: 20px;
      margin-top: 20px;
      font-weight: bold;
    }
    .section-heading1{
      color: #f7c35f;
    }

    p {
      color: black;
    }

    .group {
      color: #007bff;
      margin-bottom: 10px;
      word-spacing: 5em;
    }

    .button {
      background-color: #f7c35f;
      color: #fff;
      padding: 12px 22px;
      border: none;
      border-radius: 4px;
      margin-right: 10px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
      margin-bottom: 35px;
      
    }

    .button:hover {
      background-color: #5d9e56;
      color: black;
    }

    .button-container {
  display: flex;
   }

  .button {
  flex-grow: 1;
  /* Other button styles */
   }

    .count {
      color: green;
      margin-left: 5px;
      justify-content: space-between;
    }

    .box {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      animation: slideIn 1s ease-in-out;
    }

    @keyframes slideIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .box div {
      background-color: #fff;
      flex: 1;
      padding: 20px;
      margin-right: 10px;
      background-color: #f7c35f;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }

    .box div:hover {
      transform: scale(1.05);
      color: #5d9e56;
    }

    .groupName {
      color: #007bff;
      font-weight: bold;
      text-align: center;
      margin-bottom: 10px;
    }

    .scroll {
      overflow-x: hidden;
      overflow-y: auto;
    }

    .logout-link {
      color: #007bff;
      text-decoration: none;
      font-size: 16px;
      padding: 8px 16px;
      background-color: #71BC68;
      border-radius: 15px;
      transition: background-color 0.3s ease-in-out;
    }

    .logout-link:hover {
      background-color: #5d9e56;
    }

    /* Dark and Light Mode */

    .dark-mode-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 9999;
    }

    .dark-mode-btn button {
      background-color: #71BC68;
      color: black;
      border: nones;
      border-radius: 15px;
      padding: 8px 16px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .dark-mode-btn button:hover {
      background-color: #f7c35f;
    }

    /* Dark Mode Styles */

    .dark-theme body {
      background-color: #333;
      color: #fff;
    }

    .dark-theme .header {
      background-color: #222;
    }

    .dark-theme .profile,
    .dark-theme .menu {
      color: #fff;
    }

    .dark-theme .menu a {
      color: #fff;
    }

    .dark-theme .dashboard-section {
      background-color: #444;
    }

    .dark-theme .box div {
      background-color: #666;
    }

    .dark-theme .groupName {
      color: #71BC68;
    }

    .dark-theme .group {
      color: #fff;
    }
  </style>
</head>

<body class="<?php echo $themeClass; ?>">
  <div class="header">
  <img src="assets/img/logo.png" class="logo" alt="LOGO">
    <h1>DairyBot Farm</h1>
    <div class="profile">
      <img src="assets/img/Profile icon.avif" id="image" alt="Admin Profile Picture">
      <span>
        <a href="#" id="adminWord">Admin</a>
      </span>
    </div>
  </div>

  <div class="container">
    <div class="menu <?php echo $menuClass; ?>">
      <div class="dashboard-section">
        <h3>Dashboard</h3>
        <h3>Menu</h3>
        <div class="box">
          <a href="profile.php">Profile of Cattle</a>
        </div>
        <div class="box">
          <a href="animal.php">Animal Account</a>
        </div>
        <div class="box">
          <a href="diet.php">Diet Plans</a>
        </div>
        <div class="box">
          <a href="charts.php">Charts</a>
        </div>
        <div class="box">
          <a href="alert.php">Alerts</a>
        </div>
        <br><hr><br>
        <h3>Profit/Loss Reports</h3>
        <div class="box">
          <a href="DailyChart.php">Daily Reports</a>
        </div>
        <div class="box">
          <a href="WeeklyChart.php">Weekly Reports</a>
        </div>
        <div class="box">
          <a href="MonthlyChart.php">Monthly Reports</a>
        </div>
        <div class="box">
          <a href="report.php">Yearly Reports</a>
        </div>
        <br><br><br>
        <a href='admin.php' class="logout-link">Profile</a> <br><br>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <a href='logout.php' class="logout-link">Logout</a>
        </form><br>
      </div>      
    </div>

    <div class="content">
      <div class="dashboard-section">
        <h1>Statistics</h1>
        <div class="section-heading1">Monthly Statistics</div>
        <div class="box">
          <div>
            <div class="section-heading2">Milk Quantity</div>
            <p>200 litres</p>
          </div>
          <div>
            <div class="section-heading2">Feed Amount</div>
            <p>1,000 kg</p>
          </div>
          <div>
            <div class="section-heading2">Profit</div>
            <p>300$</p>
          </div>
        </div><br>
        <div class="section-heading1">Yearly Statistics</div>
        <div class="box">
          <div>
            <div class="section-heading2">Milk Quantity</div>
            <p><?php echo $milkQuantity; ?></p>
          </div>
          <div>
            <div class="section-heading2">Feed Amount</div>
            <p><?php echo $feedAmount; ?></p>
          </div>
          <div>
            <div class="section-heading2">Profit</div>
            <p><?php echo $profit; ?></p>
          </div>
        </div>

        <br><br><br>
        <div class="section-heading3">Animal Types</div>
        <div class="button-container">
          <button class="button">Non-Pregnant Heifer</button>
          <button class="button">Pregnant Heifer</button>
          <button class="button">Cow</button>
          <button class="button">Pregnant Cow</button>
          <button class="button">Male</button>
        </div>

        <div class="box">
          <div>
            <h3 class="groupName">Animal Groups</h3>
            <p class="group">Group1 <span class="count">10</span></p>
            <hr>
            <p class="group">Group2 <span class="count">15</span></p>
            <hr>
            <p class="group">Group3 <span class="count">18</span></p>
          </div>
          <div class="scroll">
            <h3 class="groupName">Reproduction Status</h3>
            <p class="group">Fresh <span class="count">4</span></p>
            <hr>
            <p class="group">Suckling <span class="count">5</span></p>
            <hr>
            <p class="group">Non-pregnant <span class="count">12</span></p>
            <hr>
            <p class="group">Blacklist <span class="count">6</span></p>
          </div>
          <div class="scroll">
            <h3 class="groupName">Lactation</h3>
            <p class="group">Lactation1 <span class="count">1</span></p>
            <hr>
            <p class="group">Lactation2 <span class="count">3</span></p>
            <hr>
            <p class="group">Lactation3 <span class="count">10</span></p>
            <hr>
            <p class="group">Lactation4 <span class="count">4</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-mode-btn">
    <button onclick="toggleDarkMode()">Toggle Dark Mode</button>
  </div>

  <script>
    function toggleDarkMode() {
      const body = document.querySelector('body');
      body.classList.toggle('dark-theme');

      const menu = document.querySelector('.menu');
      menu.classList.toggle('dark-theme');
    }
  </script>
</body>

</html>
    