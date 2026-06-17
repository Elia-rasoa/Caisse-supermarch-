<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caisse Supermarché - Achat</title>
</head>
<body>
    <h1>Effectuer une achat</h1>
    <form action="achat/create" method="post">
        <label for="produit">Produit:</label>
        <input type="text" id="produit" name="produit" required>

        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite" required>

        <input type="submit" value="Ajouter l'achat">
    </form>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Montant</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($achats)) : ?>
                <?php foreach ($achats as $achat) : ?>
                    <tr>
                        <td><?= esc($achat['produit']) ?></td>
                        <td><?= esc($achat['prix_unitaire']) ?></td>
                        <td><?= esc($achat['quantite']) ?></td>
                        <td><?= $achat['prix_unitaire'] * $achat['quantite'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>
                    <?php
                    $total = 0;
                    if (!empty($achats)) {
                        foreach ($achats as $achat) {
                            $total += $achat['prix_unitaire'] * $achat['quantite'];
                        }
                    }
                    echo $total;
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>