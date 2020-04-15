<?php
 //include connection file
 include "connection2.php";
 $sqll1="DROP PROCEDURE deleteimage";
$sqll2="CREATE PROCEDURE images.deleteimage
(
in sD int
)
begin 
delete from images.images where id=sD;
end;";
$c1=$con->prepare($sqll1);
$c2=$con->prepare($sqll2);
$c1->execute();
$c2->execute();
$sql="CREATE TRIGGER after_delete AFTER DELETE ON images FOR EACH ROW
                BEGIN
                INSERT INTO images_updated(title,status,edtime)VALUES(OLD.title,'DELETED',NOW());
                END;
";
        $stmt=$con->prepare($sql);
        $stmt->execute();
 $sql2="CALL deleteimage('{$_GET['id']}')";
 $q=$con->query($sql2);
 if ($q) {
     $header = header('location:welcome.php');
} else {
    "problema";
}