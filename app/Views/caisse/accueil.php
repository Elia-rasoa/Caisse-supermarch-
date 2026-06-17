<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <form action="achat" method="post">
        <label for="id">Choisir caisse :</label>
        <select name="id" id="id" required>
            <option value="">-- Sélectionnez une caisse --</option>
            <?php foreach ($caisses as $caisse) : ?>
                <option value="<?php echo htmlspecialchars($caisse['id']); ?>">
                    Caisse n°<?php echo htmlspecialchars($caisse['id']); ?> - <?php echo htmlspecialchars($caisse['libelle']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>