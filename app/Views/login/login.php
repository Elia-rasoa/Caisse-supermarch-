<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion — Caisse</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --bg:        #0F1117;
    --card:      #1A1D27;
    --accent:    #4F6EF7;
    --accent-glow: rgba(79, 110, 247, 0.35);
    --text:      #E8EAF2;
    --muted:     #6B7280;
    --border:    #2A2D3A;
    --input-bg:  #12141E;
    --error:     #F87171;
  }

  body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--bg);
    font-family: 'Inter', sans-serif;
    color: var(--text);
    overflow: hidden;
  }

  /* Ambient orb */
  body::before {
    content: '';
    position: fixed;
    inset: 0;
    background:
      radial-gradient(ellipse 60% 50% at 50% 60%, var(--accent-glow) 0%, transparent 70%);
    pointer-events: none;
    z-index: 0;
  }

  /* Subtle grid texture */
  body::after {
    content: '';
    position: fixed;
    inset: 0;
    background-image:
      linear-gradient(var(--border) 1px, transparent 1px),
      linear-gradient(90deg, var(--border) 1px, transparent 1px);
    background-size: 48px 48px;
    opacity: 0.18;
    pointer-events: none;
    z-index: 0;
  }

  .wrapper {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 420px;
    padding: 1rem;
  }

  /* Logo / brand mark */
  .brand {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 2.5rem;
    justify-content: center;
  }

  .brand-icon {
    width: 36px;
    height: 36px;
    background: var(--accent);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 20px var(--accent-glow);
  }

  .brand-icon svg { width: 20px; height: 20px; color: #fff; }

  .brand-name {
    font-family: 'Sora', sans-serif;
    font-size: 1.25rem;
    font-weight: 700;
    letter-spacing: -0.02em;
    color: var(--text);
  }

  /* Card */
  .card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 2.5rem 2rem;
    box-shadow:
      0 0 0 1px rgba(255,255,255,0.04) inset,
      0 24px 60px rgba(0,0,0,0.5);
  }

  .card-header { margin-bottom: 2rem; }

  .card-header h1 {
    font-family: 'Sora', sans-serif;
    font-size: 1.6rem;
    font-weight: 700;
    letter-spacing: -0.03em;
    color: var(--text);
    margin-bottom: 0.35rem;
  }

  .card-header p {
    font-size: 0.875rem;
    color: var(--muted);
    font-weight: 400;
  }

  /* Form fields */
  .field { margin-bottom: 1.25rem; }

  .field label {
    display: block;
    font-size: 0.8125rem;
    font-weight: 500;
    color: var(--muted);
    margin-bottom: 0.5rem;
    letter-spacing: 0.02em;
    text-transform: uppercase;
  }

  .field input {
    width: 100%;
    background: var(--input-bg);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 0.75rem 1rem;
    color: var(--text);
    font-family: 'Inter', sans-serif;
    font-size: 0.9375rem;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
    appearance: none;
  }

  .field input::placeholder { color: #3A3E50; }

  .field input:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(79, 110, 247, 0.2);
  }

  /* Password wrapper */
  .input-wrap {
    position: relative;
  }

  .input-wrap input { padding-right: 2.75rem; }

  .toggle-pw {
    position: absolute;
    right: 0.875rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    color: var(--muted);
    padding: 0;
    display: flex;
    align-items: center;
    transition: color 0.15s;
  }

  .toggle-pw:hover { color: var(--text); }
  .toggle-pw svg { width: 18px; height: 18px; }

  /* Submit */
  .btn-submit {
    width: 100%;
    margin-top: 0.5rem;
    padding: 0.875rem 1rem;
    background: var(--accent);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-family: 'Sora', sans-serif;
    font-size: 0.9375rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s, box-shadow 0.2s, transform 0.1s;
    box-shadow: 0 4px 24px var(--accent-glow);
    position: relative;
    overflow: hidden;
  }

  .btn-submit::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(255,255,255,0.08) 0%, transparent 100%);
    pointer-events: none;
  }

  .btn-submit:hover {
    background: #6075F9;
    box-shadow: 0 6px 30px rgba(79, 110, 247, 0.5);
    transform: translateY(-1px);
  }

  .btn-submit:active {
    transform: translateY(0);
    box-shadow: 0 2px 12px var(--accent-glow);
  }

  /* Footer */
  .card-footer {
    margin-top: 1.75rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--border);
    text-align: center;
    font-size: 0.8125rem;
    color: var(--muted);
  }

  .card-footer a {
    color: var(--accent);
    text-decoration: none;
    font-weight: 500;
  }

  .card-footer a:hover { text-decoration: underline; }

  @media (prefers-reduced-motion: reduce) {
    * { transition: none !important; }
  }

  @media (max-width: 480px) {
    .card { padding: 1.75rem 1.25rem; }
  }
</style>
</head>
<body>
<div class="wrapper">

  <div class="brand">
    <div class="brand-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <rect x="2" y="3" width="20" height="14" rx="2"/>
        <path d="M8 21h8M12 17v4"/>
      </svg>
    </div>
    <span class="brand-name">Caisse</span>
  </div>

  <div class="card">
    <div class="card-header">
      <h1>Bon retour 👋</h1>
      <p>Connectez-vous pour accéder à votre espace.</p>
    </div>

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
      </div>

      <button type="submit" class="btn-submit">Se connecter</button>

    </form>

    <div class="card-footer">
      Mot de passe oublié ? <a href="#">Réinitialiser</a>
    </div>
  </div>

</div>
</body>
</html>