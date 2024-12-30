<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
        }
        
        .dashboard-container {
            width: 100%;
            max-width: 1100px;
            margin: 40px auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        /* Header Section */
        .header {
            background-color: #27ae60; /* Vert Fatih Jidan */
            color: white;
            padding: 50px 30px;
            text-align: center;
            border-radius: 20px 20px 0 0;
        }
        
        .header h1 {
            font-size: 3em;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        /* Content Section */
        .content {
            padding: 30px;
        }

        .content h2 {
            font-size: 2em;
            color: #27ae60; /* Vert Fatih Jidan */
            margin-bottom: 20px;
            border-bottom: 2px solid #27ae60;
            padding-bottom: 8px;
        }

        .user-info {
            background-color: #fafafa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .user-info p {
            font-size: 1.2em;
            margin: 10px 0;
            color: #555;
        }

        .user-info strong {
            color: #333;
        }

        /* Logout Button */
        .logout {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 30px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            font-size: 1.2em;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 6px 12px rgba(231, 76, 60, 0.2);
            transition: background-color 0.3s, transform 0.2s;
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
        </div>
        <div class="content">
            <h2>User Information</h2>
            <div class="user-info">
                <p><strong>Name:</strong> <?= $name ?></p>
                <p><strong>Email:</strong> <?= $email ?></p>
                <p><strong>Role:</strong> <?= $role ? $role : 'Not Assigned' ?></p>
            </div>
            <a href="<?= base_url('logout') ?>" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
</body>
</html>
