<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Étudiant - modules </title>
    <!-- Lien vers le fichier CSS -->
    <link href="style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
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
            <div class="nav-item ">
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
            <div class="nav-item active">
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
                        <div class="profile-role"><?= $role ? $role : 'Non assigné' ?></div>
                    </div>
                    <div class="profile-img">MA</div>
                </div>
            </div>

            <!-- Form element starts here -->
            <form action="<?= base_url('/profileE/update') ?>" method="POST">
                <div class="profile-section">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-3" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <span class="font-weight-bold"><?= $name ?></span>
                                <span class="text-black-50"><?= esc($email) ?></span>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-6">
                                    <h4 class="text-right">Paramètres de Profile</h4>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control" id="name" name="name" value="<?= $name ?>" required></div>
                                    <div class="col-md-6"><label class="labels">Email</label> <input type="email" class="form-control" id="email" name="email" value="<?= esc($email) ?>" required></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Date de naissance</label><input type="date" class="form-control" id="date_birth" name="date_birth" value="<?= $date_birth ?>" required></div>
                                    <div class="col-md-6"><label class="labels">Adresse</label><input type="text" class="form-control" id="address" name="address" value="<?= $adresse ?>" required></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Rôle</label> <span class="form-control"><?= $role ? $role : 'Non assigné' ?></span></div>
                                    <div class="col-md-6"><label class="labels">Mot de passe</label><input type="password" class="form-control" id="password" name="password" value="" required></div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button class="btn profile-button" type="submit" style="background-color: #4f46e5; color: white;">Enregistrer les modifications</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>                    
    </div>
    
    
</body>
</html>