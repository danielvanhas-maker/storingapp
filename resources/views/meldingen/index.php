<?php require_once __DIR__.'/../../../config/conn.php'; ?>
<!doctype html>
<html lang="nl">
<?php session_start(); ?>

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <?php if (!isset($_SESSION['logged']))
    {
        header("Location: ../../../index.php");
        exit;
    }

    $query = "SELECT * FROM meldingen";
    $statement = $conn->prepare($query);
    $statement->execute([]);
    $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <div class="row">

<div class="taskContainer">
    <table>
        <tr>
            <th>attractie</th>
            <th>type</th>
            <th>capaciteit</th>
            <th>prioriteit</th>
            <th>melder</th>
            <th>gemeld_op</th>
            <th>overige_info</th>
            <th colspan="1">Acties</th>
        </tr>

    <?php foreach ($meldingen as $melding): ?>
        <tr>
            <td><?= htmlspecialchars($melding['attractie']) ?></td>
            <td><?= htmlspecialchars($melding['type']) ?></td>
            <td><?= htmlspecialchars($melding['capaciteit']) ?></td>
            <td><?= htmlspecialchars($melding['prioriteit']) ?></td>
            <td><?= htmlspecialchars($melding['melder']) ?></td>
            <td><?= htmlspecialchars($melding['gemeld_op']) ?></td>
            <td><?= htmlspecialchars($melding['overige_info']) ?></td>
            <td class="Actions"><a href="edit.php?id=<?= $melding['id']; ?>" class="edit">Edit</a></td>
        </tr>
    <?php endforeach ?>
    </table>
</div>
</div>
        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>
</div>

</body>

</html>
