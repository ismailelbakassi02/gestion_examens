<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Étudiant - modules </title>
    <!-- Lien vers le fichier CSS -->
    <link href="style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i>
                <span>EspaceÉtudiant</span>
            </div>

            <div class="nav-section">
                <div class="nav-title">MENU PRINCIPAL</div>
                <div class="nav-section">
                    <a href="<?= base_url('/dashboard') ?>" class="nav-item">
                        <i class="fas fa-chart-pie"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="<?= base_url('/modules') ?>" class="nav-item active">
                        <i class="fas fa-book"></i>
                        <span>Modules</span>
                    </a>
                    <a href="<?= base_url('/profile') ?>" class="nav-item">
                        <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-title">AUTRES</div>
                <div class="nav-item">
                    <a href="<?= base_url('logout') ?>"></a>
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Deconnexion</span>
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
                        <div class="profile-name">Mohammed Alami</div>
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
                                <div class="grade-icon" style="background-color: var(--success)">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <div>
                                    <div>Mathématiques</div>
                                    <small class="text-light">Prof. Martinez</small>
                                </div>
                            </div>
                            <div class="grade-value grade-excellent">18/20</div>
                        </div>
                        <div class="grade-item">
                            <div class="grade-info">
                                <div class="grade-icon" style="background-color: var(--primary)">
                                    <i class="fas fa-atom"></i>
                                </div>
                                <div>
                                    <div>Physique</div>
                                    <small class="text-light">Prof. Bernard</small>
                                </div>
                                </div>
                            <div class="grade-value grade-excellent">18/20</div>
              </div>               
</body>
</html>