<!DOCTYPE html>
<html lang="fr">
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
            <div class="nav-item active">
                <a href="dashboard.php">
                    <i class="fas fa-chart-pie"></i>
                    <span>Tableau de bord</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="modules.php">
                    <i class="fas fa-book"></i>
                    <span>Modules</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="profile.php">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </div>
        </div>

            <div class="nav-section">
                <div class="nav-title">AUTRES</div>
                <div class="nav-item">
                <a href="login.php">
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
                        <div class="profile-name">Mohammed Alami</div>
                        <div class="profile-role">Étudiant - 2ème année</div>
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
    <div class="stat-value">
        <span>14.5</span> / 20
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">Modules avec Note > 10</div>
        <div class="card-actions">
            <i class="fas fa-check-circle"></i>
        </div>
    </div>
    <div class="stat-list">
        <div class="stat-item">
            <span>Mathématiques</span>
            <span class="stat-value">18</span>
        </div>
        <div class="stat-item">
            <span>Physique</span>
            <span class="stat-value">12</span>
        </div>
        <div class="stat-item">
            <span>Chimie</span>
            <span class="stat-value">11</span>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
