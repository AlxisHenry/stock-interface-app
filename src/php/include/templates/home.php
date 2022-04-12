<?php include '../../functions.php';  ?>
<!DOCTYPE html>
<html lang="FR">

<head>
     <?php include '../component/header.php';?>
</head>

<body>

    <main class="features-navigation">
        <?php include '../component/navbar.php'; ?>
    </main>

    <div class="contain-send-message"></div>

<?php if(CHECK_SETTINGS_STATE('website-info')) { include '../component/informations.php'; } ?>


