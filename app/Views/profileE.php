<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    </style>
    </style>
</head>
<body>
<form action="<?= base_url('/profileE/update') ?>" method="POST">
        <p>
            <strong>Name:</strong>
            <input type="text" name="name" value="<?= $name ?>">
        </p>
        <p>
            <strong>Email:</strong>
            <input type="email" name="email" value="<?= esc($email) ?>">
        </p>
        <p>
            <strong>Address:</strong>
            <input type="test" name="address" value="<?= $adresse ?>">
        </p>
        
        <p>
            <strong>Date de naissance:</strong>
            <input type="date" name="date_birth" value="<?= $date_birth ?>" required>
        </p>
        <p>
            <strong>Role:</strong>
            <?= $role ? $role : 'Not Assigned' ?>
        </p>
        <p>
            <strong>Password:</strong>
            <input type="test" name="password" value="">
        </p>
        <button type="submit">Enregistrer les modifications</button>
        <a href="<?= base_url('dashboard') ?>" class="logout"> dash</a>
    </form>

</body>
</html>