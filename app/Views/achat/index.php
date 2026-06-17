<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caisse Supermarché - Achat</title>
    <style>
        /* Réinitialisation de base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Arrière-plan uniforme */
        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            min-height: 100vh;
            color: #333;
            padding: 2rem 1.5rem;
        }

        /* Conteneur principal (Le terminal de caisse) */
        .caisse-container {
            background-color: #ffffff;
            max-width: 900px;
            margin: 0 auto;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(46, 125, 50, 0.12);
            border-top: 8px solid #4caf50;
        }

        /* En-tête de la caisse */
        .caisse-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px dashed #c8e6c9;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }

        .caisse-header h1 {
            font-size: 1.8rem;
            color: #1b5e20;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .badge-status {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            border: 1px solid #a5d6a7;
        }

        /* Zone de saisie d'un article */
        .form-row {
            display: grid;
            grid-template-columns: 2fr 1fr auto;
            gap: 16px;
            align-items: end;
            background-color: #f9f9f9;
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            margin-bottom: 1rem;
        }

        /* Groupes de champs */
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .input-group label {
            font-weight: 600;
            font-size: 0.9rem;
            color: #2e7d32;
        }

        /* Champs Select & Input */
        .input-group select, 
        .input-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
            background-color: #fff;
        }

        .input-group select:focus, 
        .input-group input:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.15);
        }

        /* Select personnalisé pour la flèche */
        .input-group select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%232e7d32' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><polyline points='6 9 12 15 18 9'></polyline></svg>");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.1rem;
            padding-right: 2.5rem;
        }

        /* Bouton Ajouter au Panier */
        .btn-add {
            padding: 0.8rem 1.8rem;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
            box-shadow: 0 4px 6px rgba(255, 152, 0, 0.2);
            height: 48px; /* Aligné avec la hauteur des inputs */
        }

        .btn-add:hover {
            background-color: #fb8c00;
        }

        .btn-add:active {
            transform: scale(0.98);
        }

        /* Gestion des erreurs */
        #erreur {
            color: #d32f2f;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            min-height: 1.2em;
            padding-left: 0.5rem;
        }

        /* Facture / Tableau des produits */
        .table-responsive {
            margin-top: 1.5rem;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e0e0e0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th {
            background-color: #2e7d32;
            color: white;
            font-weight: 600;
            text-align: left;
            padding: 1rem;
            font-size: 0.95rem;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            color: #444;
            font-size: 1rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* Alignements de cellules spécifiques */
        .text-right {
            text-align: right;
        }
        
        .text-center {
            text-align: center;
        }

        /* Ligne du Total général */
        tfoot tr {
            background-color: #e8f5e9;
            font-weight: bold;
            border-top: 2px solid #4caf50;
        }

        tfoot td {
            color: #1b5e20;
            font-size: 1.1rem;
            padding: 1.2rem 1rem;
        }

        #total {
            color: #1b5e20;
            font-size: 1.3rem;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            .btn-add {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>

<div class="caisse-container">
    <div class="caisse-header">
        <h1>🛒 Caisse n°<?= esc($caisse) ?></h1>
        <div class="badge-status">Session active</div>
    </div>

<div style="display:flex; gap:12px; flex-wrap:wrap; margin-bottom:1rem; margin-top:1rem;">
  <div>
    <label for="produit">Produit</label><br>
    <select id="produit">
      <option value="">-- Sélectionnez un produit --</option>
      <?php foreach ($produits as $p): ?>
      <option value="<?= esc($p['id']) ?>"><?= esc($p['designation']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div>
    <label for="qte">Quantité</label><br>
    <input type="number" id="qte" min="1" placeholder="1">
  </div>
  <div style="align-self:flex-end;">
    <button onclick="ajouterLigne()">Ajouter</button>
  </div>
</div>

    <div class="form-row">
        <div class="input-group">
            <label for="produit">Désignation du produit</label>
            <select id="produit">
                <option value="">-- Sélectionnez un produit --</option>
                <?php foreach($produits as $p): ?>
                <option value="<?= esc($p['id']) ?>"><?= esc($p['designation']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="input-group">
            <label for="qte">Quantité</label>
            <input type="number" id="qte" min="1" placeholder="1">
        </div>
        
        <button class="btn-add" onclick="ajouterLigne()">Ajouter</button>
    </div>

    <p id="erreur"></p>

    <div class="table-responsive">
        <table id="tableau" style="display:none;">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th class="text-right">Prix unitaire</th>
                    <th class="text-center" style="width: 100px;">Quantité</th>
                    <th class="text-right">Montant</th>
                </tr>
            </thead>
            <tbody id="corps">
                </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Total Net à Payer</td>
                    <td></td>
                    <td id="total" class="text-right">0 Ar</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


<form id="formeClot" action="/achat/create" method="post">
  <input type="hidden" name="caisse" value="<?= esc($caisse) ?>">
  <input type="hidden" name="lignes" id="lignesInput">
  <button type="submit" onclick="return preparer()">Clôturer l'achat</button>
</form>
<script>
let lignes = [];

function fmt(n) {
  return Number(n).toLocaleString('fr-MG') + ' Ar';
}

function ajouterLigne() {
  const select  = document.getElementById('produit');
  const id      = select.value;
  const nom     = select.options[select.selectedIndex].text;
  const qte     = parseInt(document.getElementById('qte').value);
  const erreur  = document.getElementById('erreur');
  const produit = produitsData.find(p => p.id == id);

  if (!id || !produit || isNaN(qte) || qte <= 0) {
    erreur.textContent = '⚠ Veuillez sélectionner un produit et une quantité valide.';
    return;
  }
  erreur.textContent = '';

  lignes.push({ id, nom, prix: produit.prix, qte });
  rafraichir();

  select.value = '';
  document.getElementById('qte').value = '';
  select.focus();
}

function supprimerLigne(i) {
  lignes.splice(i, 1);
  rafraichir();
}

function rafraichir() {
  const corps   = document.getElementById('corps');
  const tableau = document.getElementById('tableau');
  corps.innerHTML = '';
  let total = 0;

  lignes.forEach((l, i) => {
    const montant = l.prix * l.qte;
    total += montant;
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${l.nom}</td>
      <td style="text-align:right">${fmt(l.prix)}</td>
      <td style="text-align:right">${l.qte}</td>
      <td style="text-align:right">${fmt(montant)}</td>
      <td><button type="button" onclick="supprimerLigne(${i})">✕</button></td>`;
    corps.appendChild(tr);
  });

  document.getElementById('total').innerHTML = fmt(total);
  // Pour WeasyPrint ou la gestion de style, on affiche le tableau en mode block/table
  tableau.style.display = lignes.length ? 'table' : 'none';
}

function preparer() {
  if (lignes.length === 0) {
    alert('Aucun produit ajouté.');
    return false;
  }

  // Sérialise toutes les lignes (id, nom, prix, qte, montant) en JSON
  const payload = lignes.map(l => ({
    id:      l.id,
    nom:     l.nom,
    prix:    l.prix,
    qte:     l.qte,
    montant: l.prix * l.qte
  }));

  document.getElementById('lignesInput').value = JSON.stringify(payload);
  return true;
}
</script>
</body>
</html>