<!DOCTYPE html>
<html lang="fr">
<?php $session=session() ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Étudiant - Dashboard Moderne</title>
    <!-- Lien vers le fichier CSS -->
    <link href="style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<style>
    .nav-item {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        font-size: 16px;
        cursor: pointer;
        color: #555;
    }

    .nav-item i {
        margin-right: 10px;
    }

    .nav-item.active {
        background-color: #4f46e5;
        color: white;
    }

    .nav-item:hover {
        background-color: #e0e0e0;
    }

    .nav-item a {
        color: inherit;
        /* Inherit the color of the nav-item */
        text-decoration: none;
        /* Remove the underline */
        display: flex;
        align-items: center;
        width: 100%;
        padding: 10px 15px;
        /* Matches the padding of .nav-item */
        font-size: 16px;
    }

    .nav-item a:hover {
        background-color: #e0e0e0;
    }

    .nav-title {
        font-weight: bold;
        margin-bottom: 15px;
        font-size: 18px;
        color: #4f46e5;
    }
</style>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i>
                <span>EspaceÉtudiant</span>
            </div>
            <!-- Display success or error message from query parameters -->
            <?php if (isset($_GET['message'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?= htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php elseif (isset($_GET['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>

            <div class="nav-section">
                <div class="nav-title">MENU PRINCIPAL</div>
                <div class="nav-item active">
                <a href="<?= base_url('dashboard') ?>">
                        <i class="fas fa-chart-pie"></i>
                        <span>Tableau de bord</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="<?= base_url('notes/student/'.$id) ?>">
                        <i class="fas fa-book"></i>
                        <span>Modules</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href=<?= base_url('reclamation') ?>>
                        <i class="fas fa-book"></i>
                        <span>Votre Réclamations</span>
                    </a>
                </div>
                <div class="nav-item">
                <a href="<?= base_url('profileE') ?>">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-title">AUTRES</div>
                <div class="nav-item">
                    <a href="<?= base_url('logout') ?>">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Deconnexion</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher..." />
                </div>
                <div class="profile">
                    <div class="profile-info">
                        <div class="profile-name"><?= $name ?></div>
                        <div class="profile-role"><?= $role ? $role : 'Non assigné' ?></div>
                    </div>
                    <div class="profile-img">MA</div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Moyenne Générale</div>
                    <div class="card-actions">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
                <div class="stat-value"><span><?= number_format($note_general, 2) ?></span> / 20</div>
            </div>

            
        </div>
    </div>
</body>

</html>



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
        <a href="<?= base_url('note') ?>" class="profile-link">Notes</a>
    <?php endif; ?>
</div>