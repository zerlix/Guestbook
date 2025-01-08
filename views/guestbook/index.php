<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Gästebuch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/css/bootstrap.min.css">
</head>
<body>
    <h1>Gästebuch</h1>
    <?php if (!empty($entries)): ?>
        <ul>
            <?php foreach ($entries as $entry): ?>
                <li>
                    <strong><?php echo htmlspecialchars($entry['name']); ?></strong><br>
                    <em><?php echo htmlspecialchars($entry['datum']); ?></em><br>
                    <p><?php echo nl2br(htmlspecialchars($entry['messages'])); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Keine Einträge vorhanden.</p>
    <?php endif; ?>
    <script src="styles/js/jquery-3.7.1.min.js"></script>
    <script src="styles/js/bootstrap.min.js"></script>
</body>
</html>