<?php

require_once "Core/Db.php";
require_once "Core/TimeSince.php";

$db = new Db();

$sql = "SELECT moisture, plant, datetime, light, temperature FROM plant_data WHERE 1 ORDER BY datetime DESC, plant ASC LIMIT 4";
$data = $db->select($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A page to display infomation from a plant monitoring device">
    <meta name="author" content="James Lilliott">
    <link rel="icon" href="img/plant-icon.ico">

    <title>Plant.io</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

</head>

<body class="bg-light">

<?php
include 'navs/header.php';
?>

<main role="main">
    <div class="py-4">
        <div class="container">
            <div class="row">
                <?php
                    foreach ($data as $plant){

                        ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h2>Plant <?= $plant['plant']; ?></h2>
                                    <div class="row mb-3">
                                        <div class="col-4 card-text"><i class="fas fa-tint"></i> <?= $plant['moisture']; ?>%</div>
                                        <div class="col-4 card-text"><i class="fas fa-sun"></i> <?= $plant['temperature']; ?></div>
                                        <div class="col-4 card-text"><i class="fas fa-thermometer-three-quarters"></i> <?= $plant['light']; ?></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </div>
                                        <small class="text-muted"><?= TimeSince::calcTimeSince($plant['datetime']); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                    }
                ?>
            </div>

        </div>
    </div>
</main>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
