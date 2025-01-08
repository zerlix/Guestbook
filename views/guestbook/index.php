<!DOCTYPE html>
<html lang="de">

    <head>
        <meta charset="UTF-8">
    <title>Gästebuch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <!-- Navbar content -->
        <a class="navbar-brand" href="#">Gästebuch</a>
    </nav>
    <!-- Formular für neue Einträge -->
    <div class="container card p-3 mt-3">
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Nachricht:</label>
                <textarea class="form-control" id="message" name="message" required></textarea>
            </div>
            <div class="mb-3">
                <label for="datum" class="form-label">Datum:</label>
                <input type="date" class="form-control" id="datum" value="<?php echo date('Y-m-d'); ?>"  name="datum" required>
            </div>
            <button type="submit" class="btn btn-primary">Eintragen</button>
        </form>
    </div>
    
    <div class="container mt-3">
    <!-- Ausgabe der Gästebuch Einträge -->
    <?php if (!empty($entries)): ?>
            <?php foreach ($entries as $entry): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($entry['name']); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($entry['datum']); ?></h6>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($entry['message'])); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
    <?php else: ?>
        <p>Noch keine Einträge vorhanden.</p>
    <?php endif; ?>
    </div>



    <script src="styles/js/bootstrap.min.js"></script>

</body>

</html>