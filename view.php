<html>
 <head>
<title>Photography</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 </head>

<body>
  
    <div class="bgimg-2 w3-display-container w3-opacity-min">
  <div class="w3-display-middle"> 
    <span class="w3-xxlarge w3-text-whitew3-wide">PORTFOLIO</span>
  </div>
</div>
    <div class="w3-content w3-container w3-padding-64" id="portfolio">
  <h3 class="w3-center">MY WORK</h3>
 
<div id="content">
<?php
       //include connection file
    include 'connection2.php';
    $sqll1="DROP PROCEDURE getimage";
$sqll2="CREATE PROCEDURE images.getimage
(
in intid int,
out sn varchar(30),
out sm varchar(30))
begin
select title,image
into sn,sm
from images
where id=intid;
end;";
$c1=$con->prepare($sqll1);
$c2=$con->prepare($sqll2);
$c1->execute();
$c2->execute();
       $sql1="CALL getimage('{$_GET['id']}',@title,@image);";
       $sql2="SELECT @title,@image;";
$q=$con->query($sql1);
$q=$con->query($sql2);
$q->setFetchMode(PDO::FETCH_ASSOC);
      while ($row=$q->fetch()){
             echo "Nume:       ".$row["@title"]."<br/>";
             echo "Imagine:    <br> <img src='".$row['@image']."' height='500' width='500' ><br/>";
      }
      $sql="CREATE TRIGGER after_insert BEFORE INSERT ON images FOR EACH ROW
                BEGIN
                INSERT INTO images_updated(nume,status,edtime)VALUES(NEW.nume,'INSERTED',NOW());
                END;
";
        $stmt=$con->prepare($sql);
        $stmt->execute();
            ?>
<a href="index.php#portfolio">Back</a>
</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="http://www.facebook.com" class="fa fa-facebook-official w3-hover-opacity"></a>
    <a href="https://www.instagram.com/" class="fa fa-instagram w3-hover-opacity"></a>
    <a  href="http://googleplus.com/" class="fa fa-google w3-hover-opacity"></a>
    <a  href="http://www.twitter.com/" class="fa fa-twitter w3-hover-opacity"></a>

  </div>
  
</footer>
</body>
 </html>