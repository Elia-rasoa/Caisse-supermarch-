<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — Espace Caisse</title>
    <style>
        /* Réinitialisation de base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Arrière-plan thématique Supermarché (Frais et Moderne) */
        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #2e7d32;
        }

        /* Conteneur principal (La Carte de Connexion) */
        .login-container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(46, 125, 50, 0.15);
            width: 100%;
            max-width: 400px;
            border-top: 8px solid #4caf50; /* Rappel couleur tapis de caisse / fraîcheur */
        }

        /* En-tête du formulaire */
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            font-size: 1.8rem;
            color: #1b5e20;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            font-size: 0.9rem;
            color: #666;
        }

        /* Groupes de champs de saisie */
        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: #333;
        }

        /* Inputs stylisés */
        .input-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
        }

        /* Effet focus sur les inputs */
        .input-group input:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        /* Bouton de connexion style "Valider Panier / Caisse" */
        .btn-submit {
            width: 100%;
            padding: 0.85rem;
            background-color: #ff9800; /* Orange dynamique pour l'action */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
            box-shadow: 0 4px 6px rgba(255, 152, 0, 0.2);
            margin-top: 0.5rem;
        }

        /* Animations sur le bouton */
        .btn-submit:hover {
            background-color: #fb8c00;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        /* Petit message de bas de page */
        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-header">
            <!-- Tu pourras ajouter une petite icône de caddie ou de scan ici si tu veux -->
            <h1>Espace Caisse</h1>
        </div>

        <form action="caisse" method="post">
            <div class="input-group">
                <label for="email">Identifiant ou Email</label>
                <input type="email" id="email" name="email" value="<?= esc($defaultEmail) ?>" placeholder="exemple@supermarche.com" required>
            </div>
            
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" value="<?= esc($defaultPassword) ?>" placeholder="••••••••" required>
            </div>
            
            <button type="submit" class="btn-submit">Ouvrir la caisse</button>
        </form>
    </div>

</body>
</html>