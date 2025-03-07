<!DOCTYPE html>
<html lang="fr">
<?php
$session = session();
if ($session->get('role') == 1) {
    $role_name = 'Admin';
} elseif ($session->get('role') == 2) {
    $role_name = 'Etudiant';
} elseif ($session->get('role') == 3) {
    $role_name = 'Prof';
}
?>

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

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .new-note {
        display: none;
    }

    .badge-custom-yellow {
        background-color: #ffc107;
        /* Jaune */
        color: #000;
        /* Texte noir */
        border: 1px solid #e0a800;
        /* Bordure jaune plus foncée */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Ombre légère */
        padding: 5px 10px;
        /* Espacement interne */
        border-radius: 12px;
        /* Coins arrondis */
    }

    .badge-custom-green {
        background-color: #28a745;
        /* Vert */
        color: #fff;
        /* Texte blanc */
        border: 1px solid #218838;
        /* Bordure verte plus foncée */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Ombre légère */
        padding: 5px 10px;
        /* Espacement interne */
        border-radius: 12px;
        /* Coins arrondis */
    }

    .badge-custom-red {
        background-color: #dc3545;
        /* Rouge */
        color: #fff;
        /* Texte blanc */
        border: 1px solid #c82333;
        /* Bordure rouge plus foncée */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Ombre légère */
        padding: 5px 10px;
        /* Espacement interne */
        border-radius: 12px;
        /* Coins arrondis */
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
                <div class="nav-item">
                    <a href="<?= base_url('dashboard') ?>">
                        <i class="fas fa-chart-pie"></i>
                        <span>Tableau de bord</span>
                    </a>
                </div>
                <?php if ($session->get('role') == 2): ?>
                    <div class="nav-item">
                        <a href="<?= base_url('notes/student/' . $session->get(key: 'id_user')) ?>">
                            <i class="fas fa-book"></i>
                            <span>Modules</span>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($session->get('role') == 3): ?>
                    <div class="nav-item">
                        <a href="<?= base_url('notes/profModules') ?>">
                            <i class="fas fa-book"></i>
                            <span>Modules</span>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($session->get('role') == 2): ?>
                    <div class="nav-item  active">
                        <a href=<?= base_url('reclamation') ?>>
                            <i class="fas fa-book"></i>
                            <span>Votre Réclamations</span>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($session->get('role') == 3): ?>
                    <div class="nav-item">
                        <a href="<?= base_url('profReclamation') ?>">
                            <i class="fas fa-book"></i>
                            <span>Réclamation</span>
                        </a>
                    </div>
                <?php endif; ?>
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
                        <div class="profile-name"><?= $session->get(key: 'name') ?></div>
                        <div class="profile-role"><?= $role_name ?></div>
                    </div>
                    <div class="profile-img">MA</div>
                </div>
            </div>
            <?php if ($session->get('role') == 2): ?>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Mes Réclamations</div>
                        <div class="card-actions">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="grades-list">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Module Name</th>
                                    <th scope="col">Commentaire</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($reclamations)): ?>
                                    <?php foreach ($reclamations as $reclamation): ?>
                                        <tr>
                                            <td><?= $reclamation['module_name'] ?></td>
                                            <td><?= esc($reclamation["commentaire"]) ?></td>
                                            <td>
                                                <?php if ($reclamation['etat'] == 'En attent'): ?>
                                                    <span class="badge badge-custom-yellow">En Attent</span>
                                                <?php elseif ($reclamation['etat'] == 'Accepter'): ?>
                                                    <span class="badge badge-custom-green">Accepter</span>
                                                <?php else: ?>
                                                    <span class="badge badge-custom-red">Réfuser</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center">No reclamations found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            <?php endif; ?>

        </div>
    </div>
</body>

</html>