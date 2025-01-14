
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Étudiant - modules </title>
    <link href=<?= base_url('style.css') ?> rel="stylesheet">
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
            color: inherit;            /* Inherit the color of the nav-item */
            text-decoration: none;     /* Remove the underline */
            display: flex;
            align-items: center;
            width: 100%;
            padding: 10px 15px;        /* Matches the padding of .nav-item */
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

            <div class="nav-section">
            <div class="nav-title">MENU PRINCIPAL</div>
            <div class="nav-item">
                <a href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-chart-pie"></i>
                    <span>Tableau de bord</span>
                </a>
            </div>
            <div class="nav-item active">
                <a href="">
                    <i class="fas fa-book"></i>
                    <span>Modules</span>
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
                    <input type="text" placeholder="Rechercher...">
                </div>
                <div class="profile">
                    <div class="profile-info">
                        <div class="profile-name"><?= $name ?></div>
                        <div class="profile-role">Étudiant - 2ème année</div> 
                    </div>
                    <div class="profile-img">MA</div> 
                </div>
            </div>
            <div class="grid-dashboard">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Mes Notes</div>
                        <div class="card-actions">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                    <div class="grades-list">
                    <div class="grade-item">
    <div class="grade-info">
        <div class="note-display align-text">
            <div class="note-value">
                <?= number_format($note_generale, 2) ?>
            </div>
            <small class="note-label">Note Générale</small>
        </div>
    </div>
   
</div>
                        
                    <?php foreach ($notes as $note): ?>
                        <div class="grade-item">
                            <div class="grade-info">
                                <div class="grade-icon" style="background-color: var(--success)">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <div>
                                    <div><?= $note->module_name ?></div>
                                    <small class="text-light"><?= $note->prof_name ?></small>
                                </div>
                            </div>
                            <div class="grade-value grade-excellent"><?= $note->note ?></div>
                        </div>
                        <?php endforeach; ?>
                        </div>
</body>
</html>
