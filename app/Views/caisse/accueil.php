<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil — Sélection de Caisse</title>
    <style>
        /* Réinitialisation de base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Arrière-plan uniforme avec la page login */
        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #2e7d32;
        }

        /* Conteneur principal (La Carte) */
        .selection-container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(46, 125, 50, 0.15);
            width: 100%;
            max-width: 450px;
            border-top: 8px solid #4caf50;
        }

        /* En-tête */
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 1.8rem;
            color: #1b5e20;
            margin-bottom: 0.5rem;
        }

        .header p {
            font-size: 0.9rem;
            color: #666;
        }

        /* Groupe du champ de sélection */
        .input-group {
            margin-bottom: 2rem;
        }

        .input-group label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 600;
            font-size: 0.95rem;
            color: #333;
        }

        /* Stylisation du Select personnalisé */
        .input-group select {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            color: #333;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
            outline: none;
            cursor: pointer;
            appearance: none; /* Supprime le style par défaut sur certains navigateurs */
            -webkit-appearance: none;
            -moz-appearance: none;
            /* Flèche personnalisée en SVG */
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%232e7d32' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><polyline points='6 9 12 15 18 9'></polyline></svg>");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2rem;
        }

        /* Focus sur le select */
        .input-group select:focus {
            border-color: #4caf50;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        /* Bouton de validation */
        .btn-submit {
            width: 100%;
            padding: 0.9rem;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
            box-shadow: 0 4px 6px rgba(255, 152, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background-color: #fb8c00;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        /* Footer */
        .footer-text {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.8rem;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="selection-container">
        <div class="header">
            <h1>Session de Vente</h1>
        </div>

        <form action="achat" method="post">
            <div class="input-group">
                <label for="caisse">Choisir une caisse disponible :</label>
                <select name="caisse" id="caisse" required>
                    <option value="">-- Sélectionnez une caisse --</option>
                    <?php foreach ($caisses as $caisse) : ?>
                        <option value="<?php echo htmlspecialchars($caisse['id']); ?>">
                            Caisse n°<?php echo htmlspecialchars($caisse['id']); ?> — <?php echo htmlspecialchars($caisse['libelle']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" class="btn-submit">
                <span>Accéder à la caisse</span>
            </button>
        </form>

    </div>

</body>
</html>