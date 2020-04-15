<?php
require_once "connection2.php";
//procedua pentru insert
$sql1="DROP PROCEDURE IF EXISTS insertImage";
$sql2="CREATE PROCEDURE images.insertImage
(
in st varchar(30),
in si varchar(100)
)
begin 
insert into images.images(title,image) values (st,si);
end;";
$c1=$con->prepare($sql1);
$c2=$con->prepare($sql2);
$c1->execute();
$c2->execute();
$msg="";

if(isset($_POST['upload'])){
    $text=$_POST['text'];
    $sqlp="CREATE TRIGGER after_insert BEFORE INSERT ON images.images FOR EACH ROW
                BEGIN
                INSERT INTO images.images_updated(title,status,edtime)VALUES(NEW.title,'INSERTED',NOW());
                END;
";
 $stmt=$con->prepare($sqlp);
        $stmt->execute();
        $target="./images/".md5(uniqid(time())).basename($_FILES['image']['name']);
    $sql="CALL insertImage('{$text}','{$target}')";
     $q=$con->query($sql);
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        header('Location:welcome.php');  
    }else{
        $msg="Ai gresit ceva.Verifica!";
    }
}
