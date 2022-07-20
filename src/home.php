<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/resources/main.css">
</head>
<body>
<?php require('resources/navbar.php');?>
    <div class="container">
    <h1>Encuestas creadas</h1>
    <?php
    require_once('src/models/Poll.php');
    use d17030752\Survey\models\Poll;
    $polls = Poll::getPolls();
    foreach ($polls as $poll) {
    echo "<div><a href='?view=view&id={$poll->getUUID()}'>{$poll->getTitle()}</a></div>";
    }
    ?>
    </div>
    
</body>
</html>