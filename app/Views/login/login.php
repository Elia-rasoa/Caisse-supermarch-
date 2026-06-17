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

    <form action="caisse" method="post">

      <div class="field">
        <label for="NOm">Nom</label>
        <input
          type="text"
          id="NOm"
          name="NOm"
          placeholder="vous@exemple.com"
          value="vous@exemple.com"
          required
        >
      </div>

      <div class="field">
        <label for="Prenom">Prénom</label>
        <div class="input-wrap">
          <input
            type="text"
            id="Prenom"
            name="Prenom"
            placeholder="••••••••"
            value="123456789"
            required
          >
          <button
            type="button"
            class="toggle-pw"
            aria-label="Afficher le mot de passe"
            onclick="
              const i = document.getElementById('password');
              const shown = i.type === 'text';
              i.type = shown ? 'password' : 'text';
              this.setAttribute('aria-label', shown ? 'Afficher le mot de passe' : 'Masquer le mot de passe');
              this.querySelector('.eye-off').style.display = shown ? 'none' : 'block';
              this.querySelector('.eye-on').style.display = shown ? 'block' : 'none';
            "
          >
            <!-- eye-on (default hidden) -->
            <svg class="eye-on" style="display:none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
              <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
              <line x1="1" y1="1" x2="23" y2="23"/>
            </svg>
            <!-- eye-off (default shown) -->
            <svg class="eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
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