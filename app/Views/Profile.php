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
            <div class="nav-item active">
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

            <!-- Form element starts here -->
            <form action="#" method="POST">
                <div class="profile-section">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-3" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <span class="font-weight-bold">Edogaru</span>
                                <span class="text-black-50">edogaru@mail.com.my</span>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-6">
                                    <h4 class="text-right">Paramètres de Profile</h4>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control" placeholder="Name" value="Nom" name="name"></div>
                                    <div class="col-md-6"><label class="labels">Email</label><input type="email" class="form-control" placeholder="Email" value="Email" name="email"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Date de naissance</label><input type="text" class="form-control" value="Date de naissance" placeholder="Date de naissance" name="birth_date"></div>
                                    <div class="col-md-6"><label class="labels">Adresse</label><input type="text" class="form-control" value="Adresse" placeholder="Adresse" name="adress"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Rôle</label><input type="text" class="form-control" value="Role" placeholder="role" readonly name="role"></div>
                                    <div class="col-md-6"><label class="labels">Mot de passe</label><input type="password" class="form-control" value="Mot de pass" placeholder="Mot de pass" name="password"></div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button class="btn profile-button" type="submit" style="background-color: #4f46e5; color: white;">Sauvegarder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Form element ends here -->
        </div>                    
    </div>
</body>
</html>
