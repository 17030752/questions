<?php 
namespace d17030752\Survey\models;
require_once('src/models/Poll.php');
require_once('src/models/Database.php');
use d17030752\Survey\models\Database;
use PDO;
class Poll extends Database{
private string $uuid;
private int $id;
private array $options;
public function __construct(private string $title,private bool $createUUID = true)
{
    parent::__construct();
    $this->options=[];
    if ($createUUID) {
    $this->uuid = uniqid();
    }

}
public function save(){
    $query = $this->connect()->prepare("INSERT INTO polls (uuid,title) VALUES (:uuid , :title)");
    $query->execute(['uuid'=>$this->uuid,'title'=>$this->title]);
    $query = $this->connect()->prepare("SELECT * FROM polls WHERE uuid =:uuid");
    $query->execute(['uuid'=>$this->uuid]);

    $this->id = $query->fetchColumn();
}

public function insertOptions(array $options){
foreach ($options as $option ){
    $query = $this->connect()->prepare("INSERT INTO options (poll_id,title) VALUES(:poll_id ,:title)");
    $query->execute(['poll_id' => $this->id,'title' =>$option]);

}
}
public static function getPolls(){
    $polls =[];
    $db = new Database(); //when dont have insert data use query method :)
    $query =$db->connect()->query("SELECT * FROM polls");
    while($r = $query->fetch(PDO::FETCH_ASSOC)){
        $poll = POLL::createFromArray($r);
        array_push($polls ,$poll);
    }return $polls;
}

public static function createFromArray (array $arr){
$poll = new Poll($arr['title'] , false);
$poll->setUUID($arr['uuid']);
$poll->setId($arr['id']);
return $poll;
}

public static function find($uuid){
    $db = new Database();
    $query = $db->connect()->prepare("SELECT * FROM polls WHERE uuid=:uuid");
    $query->execute(['uuid' => $uuid]);
    $r = $query->fetch();
    $poll = Poll::createFromArray($r);
    //query of options;
    $query = $db->connect()->prepare("SELECT *FROM polls INNER JOIN options ON polls.id = options.poll_id WHERE polls.uuid =:uuid");
    $query->execute(['uuid' => $uuid]);
    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
    $poll->includeOptions($r);
    }return $poll;
}
public function vote($optionId){
    $query =$this->connect()->prepare("UPDATE options SET votes = votes + 1 WHERE id =:id");
    $query->execute(['id' =>$optionId]);
    $poll=Poll::find($this->uuid);
    return $poll;
}
public function getTotalVotes(){
    $total =0;
    foreach ($this->options as $option) {
    $total = $total + $option['votes'];
    }
    return $total;
}
public function includeOptions($arr){
    array_push($this->options,$arr);
}

public function setUUID($value){
    $this->uuid =$value;
}
public function setId($value){
    $this->id = $value;
}
public function getTitle(){
    return $this->title;
}
public function getUUID(){
    return $this->uuid;
}
public function getOptions(){
    return $this->options;
}
}