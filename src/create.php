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
    <form action="?view=options" method="POST" class="form">
        <input type="text" name="title" placeholder="Title of poll....." required>
        <input type="submit"  value="Next"></form>
</body>
</html>