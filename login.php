<?php require_once __DIR__ . '/config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inloggen</title>

    <link rel="stylesheet" href="public_html/css/main.css">
</head>

<body>

<?php require_once __DIR__ . '/resources/views/components/header.php'; ?>

<main class="container">

    <h1>Log In</h1>

    <?php if (isset($_GET['msg'])): ?>
        <div class="msg">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['errormsg'])): ?>
        <div class="msg">
            <?php echo htmlspecialchars($_GET['errormsg']); ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo $base_url; ?>/app/Http/Controllers/loginController.php" method="POST">

        <div class="form-group">
            <label for="name">Naam:</label>
            <input type="text" name="name" id="name" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" name="password" id="password" class="form-input" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Inloggen" class="submit" name="submit">
        </div>

    </form>

</main>

</body>
</html>