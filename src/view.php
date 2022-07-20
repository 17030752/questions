<?php
require_once 'src/models/Poll.php';
use d17030752\Survey\models\Poll;
 if(isset($_GET['id'])){
    $uuid =$_GET['id'];
    $poll = Poll::find($uuid);
if (isset($_POST['option_id'])) {
    # code...
    $optionId =$_POST['option_id'];
    $poll = $poll->vote($optionId);
}
}
?>
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
    <h1><?php echo $poll->getTitle();?> </h1>
<h3>Total votes: <?php 
$total = $poll->getTotalVotes();
echo $poll->getTotalVotes();
?></h3>
<?php
$options = $poll->getOptions();
foreach($options as $option){
    $percentage =0;
    if ($total !=0) {
        $percentage = number_format(($option['votes'] / $total)*100,2);
    }
    
?>    
<div class="vote-item">
    <div class="bar" style=" width: <?php echo $percentage . '%'?>"><?php echo $percentage;?>%</div>
    <form action="?view=view&id=<?php echo $uuid?>" method="POST" >
<input type="hidden" name ="option_id" value="<?php echo $option['id']?>">
<input type="submit" value="Vote for<?php echo $option['title']?>">
</form>
</div>
<?php } ?>
    </div>

</body>
</html>