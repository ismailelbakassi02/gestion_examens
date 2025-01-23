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
                <?php if ($session->get('role') == 3): ?>
                    <div class="nav-item">
                        <a href="<?= base_url('notes/profModules') ?>">
                            <i class="fas fa-book"></i>
                            <span>Modules</span>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($session->get('role') == 2): ?>
                    <div class="nav-item">
                        <a href=<?= base_url('reclamation') ?>>
                            <i class="fas fa-book"></i>
                            <span>Votre Réclamations</span>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="nav-item active">
                    <a href="">
                        <i class="fas fa-book"></i>
                        <span>Réclamation</span>
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
                        <div class="profile-name"><?= $session->get('name') ?></div>
                        <div class="profile-role"><?= $role_name ?></div>
                    </div>
                    <div class="profile-img">MA</div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Réclamation</div>
                    <div class="card-actions">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
                <div class="grades-list">
                    <?php if (!empty($reclamations)): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Étudiant</th>
                                    <th>Module</th>
                                    <th>Note</th>
                                    <th>Commentaire</th>
                                    <th>État</th>
                                    <th>Action</th>
                                    <th>Nouvelle Note</th> <!-- Colonne toujours affichée -->
                                    <th>Traiter</th> <!-- Nouvelle colonne pour le traitement -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reclamations as $reclamation): ?>
                                    <tr id="row-<?= $reclamation['id_reclamation'] ?>">
                                        <td><?= $reclamation['user_name'] ?></td>
                                        <td><?= $reclamation['nom_module'] ?></td>
                                        <td><?= $reclamation['note_value'] ?></td>
                                        <td><?= $reclamation['commentaire'] ?></td>
                                        <td><?= $reclamation['etat'] ?></td>
                                        <td>
                                            <!-- Menu déroulant pour Accepter ou Refuser -->
                                            <form action="<?= site_url('profReclamation/traiter') ?>" method="post">
                                                <input type="hidden" name="id_reclamation" value="<?= $reclamation['id_reclamation'] ?>">
                                                    <input type="hidden" name="id_note" value="<?= $reclamation['id_note'] ?>">
                                                <select name="etat">
                                                    <option value="accepter">Accepter</option>
                                                    <option value="refuser">Refuser</option>
                                                </select>
                                        </td>
                                        <td>
                                            <!-- Champ d'entrée pour la nouvelle note (toujours affiché) -->
                                            <input type="number" name="new_note" placeholder="Nouvelle note">
                                        </td>
                                        <td>
                                            <!-- Bouton pour soumettre le formulaire -->
                                            <button type="submit">Traiter</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Aucune réclamation trouvée.</p>
                    <?php endif; ?>
                </div>
            </div>


        </div>
    </div>
</body>

</html>



<div class="grade-item">
    <div class="grade-info">
        <div>
            <div></div>
        </div>

    </div>
</div>