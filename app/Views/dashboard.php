<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .user-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .user-info p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .user-info p strong {
            color: #333;
        }

        .logout, .profile-link {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .logout:hover, .profile-link:hover {
            background-color: #0056b3;
        }

        .logout i, .profile-link i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>User Information</h2>
        <div class="user-info">
            <p><strong>Name:</strong> <?= $name ?></p>
            <p><strong>Email:</strong> <?= esc($email) ?></p>
            <p><strong>Role:</strong> <?= $role ? $role : 'Not Assigned' ?></p>
        </div>
        <a href="<?= base_url('logout') ?>" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <a href="<?= base_url('profileE') ?>" class="profile-link"><i class="fas fa-user"></i> Profile</a>
        <?php if ($role === 'Etudiant'): ?>
        <a href="<?= base_url('notes/student/'.$id) ?>" class="profile-link">Notes</a>
        <?php endif; ?>
    </div>
</body>
</html>