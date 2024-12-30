<!-- app/Views/dashboard.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <h2>User Information</h2>
    <p><strong>Name:</strong> <?= $name ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Role:</strong> <?= $role ? $role : 'Not Assigned' ?></p>
    <a href="<?= base_url('logout') ?>">Logout</a>
</body>
</html>