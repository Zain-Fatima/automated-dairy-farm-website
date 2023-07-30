<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <style>
        body {
            background-color: #FFFFFF;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

       
        .header {
      background-color: #FFFFFF;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
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
    h1 {
      color: #f7c35f;
      margin-bottom: 30px;
      font-size: 30px;
      font-weight: bold;
    }

        h2 {
            color: #E0D800;
            margin-top: 40px;
            margin-left: 20px;
        }

        .container {
            background-color: #FFFFCC;
            margin-left: 20px;
            margin-right: 300px;
        }

        .component {
            background-color: #71BC68;
            padding: 30px;
        }

        .section-heading2 a {
            font-size: 16pt;
        }

        a :hover {
            color: blue;
            text-decoration: underline;
        }

        .content {
            margin-left: 20px;
            margin-top: 30px;
            margin-right: 20px;
            background-color: #FFFFCC;
            padding: 20px;
            width: 100%;
            font-size: 14px;
        }

        .section-heading2 {
            color: #007bff;
            font-size: 20px;
            margin-bottom: 10px;
            /* margin-right: 20px; */
        }

        .box {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            padding-right: 10px;
        }

        .box div {
            flex: 1;
            padding: 20px;
            margin-right: 10px;
            background-color: #C9EBB9;
        }
    </style>
</head>

<body>
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
    <br><br><br>

    <h2>Reports For Milk Production</h2>
    <!-- <div class="container"> 
        <div class="component">
            <a href="">Daily Milk Production</a>
        </div>
        <br><br>

        <div class="component">
            <a href="">Weekly Milk Production</a>
        </div>
        <br><br>

        <div class="component">
            <a href="">Monthly Milk Production</a>
        </div>
    </div>-->

    <div class="content">
        <div class="box">
            <div>
                <div class="section-heading2"><a href="DailyChart.php">Daily Milk Production</a></div>
            </div>
            <div>
                <div class="section-heading2"><a href="WeeklyChart.php">Weekly Milk Production</a></div>
            </div>
            
            <div>
                <div class="section-heading2"><a href="MonthlyChart.php">Monthly Milk Production</a></div>
            </div>
        </div>
    </div>
</body>

</html>