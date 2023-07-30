<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .profile-info {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .profile-info label {
            font-weight: bold;
            color: #555;
        }
        .profile-info p {
            margin: 0;
            color: #777;
        }
        .avatar {
            text-align: center;
            margin-bottom: 20px;
        }
        .avatar img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }
        .btn-edit {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        .btn-edit:hover {
            background-color: #45a049;
        }
        .social-media {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .social-media a {
            display: inline-block;
            margin: 0 5px;
            color: #fff;
            text-decoration: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            transition: background-color 0.3s;
        }
        .social-media a:hover {
            background-color: #333;
        }
        .facebook {
            background-color: #3b5998;
        }
        .twitter {
            background-color: #1da1f2;
        }
        .instagram {
            background-color: #e4405f;
        }
    </style>
</head>
<body>
    <?php
        // Admin profile data
        $fullName = "Zain Fatima";
        $email = "info@fatima.com";
        $phone = "+1234567890";
        $role = "Administrator";
        $registeredSince = "2023-01-01";
        $address = "123 Farm Street, City, Country";
        $bio = "Versatile Software Engineering Student with Strong Problem-Solving Skills and a Passion for Innovation.";
        $website = "https://zain-fatima.github.io/portfolio/";
        $socialMedia = [
            "Facebook" => "#",
            "Twitter" => "#",
            "Instagram" => "#"
        ];
    ?>

    <div class="container">
        <h1>Admin Profile</h1>
        <div class="avatar">
            <img src="assets/img/Profile icon.avif" alt="Admin Avatar">
        </div>
        <div class="profile-info">
            <label>Full Name:</label>
            <p><?php echo $fullName; ?></p>
        </div>
        <div class="profile-info">
            <label>Email:</label>
            <p><?php echo $email; ?></p>
        </div>
        <div class="profile-info">
            <label>Phone:</label>
            <p><?php echo $phone; ?></p>
        </div>
        <div class="profile-info">
            <label>Role:</label>
            <p><?php echo $role; ?></p>
        </div>
        <div class="profile-info">
            <label>Registered Since:</label>
            <p><?php echo $registeredSince; ?></p>
        </div>
        <div class="profile-info">
            <label>Address:</label>
            <p><?php echo $address; ?></p>
        </div>
        <div class="profile-info">
            <label>Bio:</label>
            <p><?php echo $bio; ?></p>
        </div>
        <div class="profile-info">
            <label>Website:</label>
            <p><a href="<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a></p>
        </div>
        <div class="profile-info">
            <label>Social Media:</label>
            <div class="social-media">
                <?php foreach ($socialMedia as $platform => $link) { ?>
                    <a href="<?php echo $link; ?>" target="_blank" class="<?php echo strtolower($platform); ?>"><?php echo substr($platform, 0, 1); ?></a>
                <?php } ?>
            </div>
        </div>
        <div class="profile-info">
            <a href="#" class="btn-edit">Edit Profile</a>
        </div>
    </div>
</body>
</html>
