<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Système de Gestion Médicale</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome CDN pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles personnalisés -->
    <style>
        body {
            background: linear-gradient(135deg, #ECE5DD 0%, #D3D3D3 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .landing-header {
            background: linear-gradient(to right, #075E54, #128C7E);
            color: #25D366;
            padding: 40px 0;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .landing-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .landing-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        .landing-content {
            flex: 1;
            padding: 50px 0;
            text-align: center;
        }
        .landing-content .container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .btn-whatsapp {
            background: #25D366;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            margin: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .btn-whatsapp:hover {
            background: #20c058;
            transform: translateY(-2px);
            color: white;
        }
        .feature-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            margin: 15px 0;
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .feature-card i {
            color: #075E54;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        footer {
            background: #075E54;
            color: #25D366;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <!-- En-tête -->
    <header class="landing-header">
        <div class="container">
            <h1><i class="fas fa-hospital me-2"></i> Système de Gestion Médicale</h1>
            <p>Une solution moderne pour gérer vos analyses médicales avec efficacité</p>
        </div>
    </header>

    <!-- Contenu principal -->
    <section class="landing-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2><i class="fas fa-stethoscope me-2"></i> Bienvenue</h2>
                    <p class="lead">Gérez facilement vos patients, médecins, analyses, résultats et factures avec une interface intuitive et sécurisée.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-user-md"></i>
                        <h5>Gestion des Médecins</h5>
                        <p>Ajoutez et modifiez les profils des médecins avec leurs spécialités.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-vial"></i>
                        <h5>Suivi des Analyses</h5>
                        <p>Enregistrez et consultez les analyses médicales en temps réel.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-file-invoice"></i>
                        <h5>Facturation</h5>
                        <p>Créez et gérez les factures avec un suivi des paiements.</p>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <a href="{{ route('login') }}" class="btn-whatsapp"><i class="fas fa-sign-in-alt me-2"></i> Connexion</a>
                <a href="{{ route('register') }}" class="btn-whatsapp"><i class="fas fa-user-plus me-2"></i> Inscription</a>
            </div>
        </div>
    </section>

    <!-- Pied de page -->
    <footer>
        <p>&copy; 2025 Système de Gestion Médicale - Tous droits réservés</p>
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
