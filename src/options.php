<?php
use d17030752\Survey\models\Poll;
require_once('src/models/Poll.php');
if (isset($_POST['title'])) {
if(isset($_POST['option'])){
    $title =$_POST['title'];
    $options =$_POST['option'];
    
    $poll = new Poll($title , true);
    
    $poll->save();
    $poll->insertOptions($options);
 header('Location: ?view=home');
}
    
} else {
    header('Location: ?view=home');

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
    <form action="?view=options" method="POST" class="form">
        <h3>Questions</h3>
        <input type="hidden" name="title" value="<?php echo $_POST['title'] ?>">
        <input type="text" name="option[]" id="">
        <input type="text" name="option[]" id="">
    <div id="more-inputs">

    </div>
    <button id="bAdd">add another option</button>
    <input type="submit" value="Create poll">
    </form>
    <script>
        const bAdd= document.querySelector('#bAdd');
        const container= document.querySelector('#more-inputs');

        bAdd.addEventListener('click', e=>{
            e.preventDefault();
            const wrapper = document.createElement('div');
            wrapper.classList.add('wrapper');
            const bDelete = document.createElement('button');
            bDelete.append('Delete');
            bDelete.addEventListener('click' , e =>{
                e.preventDefault();
                wrapper.remove();
            });

            const input = document.createElement('input');
        input.name ='option[]';
        input.type = 'text';
        input.id = crypto.randomUUID();
        input.classList.add('input');
        input.placeholder='Option';

        wrapper.appendChild(input);
        wrapper.appendChild(bDelete);
        container.appendChild(wrapper);
        });
    </script>
</body>
</html>