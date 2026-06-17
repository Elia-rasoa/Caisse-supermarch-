<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Caisse Supermarché - Achat</title>
</head>
<body>
<h1>Caisse n°<?= esc($caisse) ?></h1>

<script>
const produitsData = <?= json_encode(array_values($produits)) ?>;
</script>

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

<p id="erreur" style="color:red; min-height:1em;"></p>

<table id="tableau" style="display:none; border-collapse:collapse; width:100%;">
  <thead>
    <tr>
      <th style="text-align:left;">Produit</th>
      <th>Prix unitaire</th>
      <th>Quantité</th>
      <th>Montant</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="corps"></tbody>
  <tfoot>
    <tr>
      <td colspan="3"><strong>Total</strong></td>
      <td id="total"><strong>0 Ar</strong></td>
      <td></td>
    </tr>
  </tfoot>
</table>


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
    erreur.textContent = 'Veuillez sélectionner un produit et une quantité valide.';
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

  document.getElementById('total').innerHTML = '<strong>' + fmt(total) + '</strong>';
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