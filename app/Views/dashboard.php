<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Resetting global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        /* Dashboard container */
        .dashboard-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 30px;
            background: linear-gradient(135deg, #ffffff, #f1f5f9);
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        /* Header Section */
        .header {
            background-color: #27ae60; /* Vert Fatih Jidan */
            color: white;
            padding: 50px 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 3em;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .header p {
            font-size: 1.2em;
            font-weight: 300;
            margin-top: 10px;
        }

        /* Content section */
        .content {
            padding: 30px 40px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: -20px;
        }

        .content h2 {
            font-size: 2em;
            color: #27ae60;
            margin-bottom: 20px;
            border-bottom: 3px solid #27ae60;
            padding-bottom: 10px;
        }

        .user-info {
            padding: 20px;
            background-color: #fafafa;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .user-info p {
            font-size: 1.1em;
            margin: 15px 0;
            color: #555;
        }

        .user-info strong {
            color: #333;
        }

        /* Logout Button */
        .logout {
            display: inline-flex;
            align-items: center;
            padding: 14px 30px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            font-size: 1.2em;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 6px 12px rgba(231, 76, 60, 0.2);
            transition: background-color 0.3s, transform 0.2s ease;
        }

        .logout:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
        }

        .logout i {
            margin-right: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.2em;
            }
            
            .content h2 {
                font-size: 1.8em;
            }
            
            .user-info {
                padding: 15px;
            }

            .logout {
                font-size: 1em;
                padding: 10px 25px;
            }
        }

    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Welcome to Your Dashboard</h1>
            <p>Your user account details</p>
        </div>
        <div class="content">
            <h2>User Information</h2>
            <div class="user-info">
                <p><strong>Name:</strong> <?= $name ?></p>
                <p><strong>Email :</strong> <?= esc($email) ?></p>
                <!--<p><strong>Email:</strong> < $email ?></p>-->
                <p><strong>Role:</strong> <?= $role ? $role : 'Not Assigned' ?></p>
            </div>
            <a href="<?= base_url('logout') ?>" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            
            <a href="<?= base_url('profileE') ?>" class="logout"> Profile</a>


        </div>
    </div>
</body>
</html>