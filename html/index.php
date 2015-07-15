<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta charset="utf-8"/>

    <title>Nextbike - Testcenter</title>
    <meta name="generator" content="PuPHPet.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js?"></script><![endif]-->
</head>
<body style="background: #000000;">
<div class="container">

    <div class="row" style="background: #000000; color:#ffffff;">
        <div class="col-xs-12">
            <img src="logo.png" class="pull-right" style="height: 50px; margin-top: 30px;">

            <h1 class="page-header">Nextbike - Testcenter</h1>
        </div>
    </div>
    <div class="row" style="background: #000000;">
        <h1 class="pull-right">
            <span style="color: #00dd00">. . . . . . </span>
            <span style="color: #dd0001">F </span>
            <span style="color: #00dd00">. . . . . . . . . . . . </span>
            <span style="color: #00dd00">. . . . . . . . . . . . </span>
            <span style="color: #00dd00">. . . . . . . . . . . . </span>
            <span style="color: #00dd00">. . . . . . . . . . . . </span>

            <span style="color: #00dd00">. . . </span>
        </h1>
    </div>
    <div class="row" style="background: #ffffff;border-top-right-radius: 5px;border-top-left-radius: 5px;">
        <div class="col-xs-12">
            <h3>Existierende Behat-Tests:</h3>
        </div>
    </div>
    <?php
    $path = realpath('../src/tests/integration/features/');
    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
    foreach ($objects as $name => $object) {
        if (preg_match('/\.feature/', $object)) {
            $name = preg_replace('/\/.*\//', '', $object);
            $name = preg_replace('/\.feature/', '', $name);

            echo '<div class="row" style="padding-bottom: 5px; background: #ffffff;">';
            echo '<div class="col-xs-12">';
            echo '<button class="btn btn-primary" style="width:100%;" type="button" data-toggle="collapse" data-target="#' . $name . '" aria-expanded="false" aria-controls="collapseExample">';
            echo $name;
            echo '</button>';
            echo '<div class="collapse" id="' . $name . '">';
            echo '<div class="well" style="margin-top: 20px;">';
            $fh = fopen($object, 'r');
            $pageText = fread($fh, 25000);
            echo nl2br($pageText);
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>
    <div class="row" style="background: #ffffff; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
        <div class="col-xs-12" style="min-height: 20px;">
        </div>
    </div>
    <div class="row" style="background: #000000;">
        <h1 class="pull-right">
            <span style="color: #00dd00">. . . . . . </span>
            <span style="color: #00dd00">. . . . . . . . . . . . </span>
            <span style="color: #dd0001">F </span>
            <span style="color: #00dd00">. . . . . . . . . . </span>
            <span style="color: #00dd00">. . . . . . . . . . . . </span>
            <span style="color: #00dd00">. . . . . . </span>
            <span style="color: #dd0001">F F F F F </span>
            <span style="color: #00dd00">. . . </span>
        </h1>
    </div>

</div>
</body>


</html>
