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
<div id="content">
<?php
       //include connection file
        include 'connection.php';
        if(!isset($_POST["submit"])){
$sql="SELECT * FROM images WHERE ID='{$_GET['id']}'";
            $result=mysqli_query($con, $sql);
            $record= mysqli_fetch_array($result);
        }else
            {
 $sql2="SELECT * FROM images WHERE ID='{$_POST['id']}'"; 
           $result2=mysqli_query($con, $sql2);
            $rec=  mysqli_fetch_array($result2);
            $title=$_POST['title'];
           if(isset($_POST['image'])){
           $target="./images/".basename($_FILES['image']['name']);
           }else{
           $target=$rec['image'];
           echo $target;
           }
$dbms="mysql";
$host="localhost";
$db="images";
$user="root";
$pass="";
$dsn="$dbms:host=$host;dbname=$db";
$con1=new PDO($dsn,$user,$pass);
           $sqlp="CREATE TRIGGER after_edit AFTER UPDATE ON images FOR EACH ROW
                BEGIN
                INSERT INTO images_updated(title,status,edtime)VALUES(New.title,'UPDATED',NOW());
                END;
";
 $stmt=$con1->prepare($sqlp);
        $stmt->execute();
    $sql1="UPDATE images SET title='{$title}', image='{$target}' WHERE id='{$_POST['id']}'";
           mysqli_query($con, $sql1) or die(mysqli_error($con));
           move_uploaded_file($_FILES['image']['tmp_name'],$target);
          header('Location:welcome.php');
        }
 ?>
<h1>Edit:</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <table align="center">
        <tr><td>Title:<br/><input type="text" name="title" value="<?php echo $record['title'] ;?>"/><br/></td></tr>
     <tr><td>Image: <br/><input type="file" name="image" value="<?php echo $record['image'] ;?>"><br/></td></tr>
    <img src="<?php echo $record['image'];?>" height='400' width='500'><br/>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
     <tr calspan="2"><td><input type="submit" name="submit" value="Edit"/></td></tr>
    </table>
    </form>
</div>
 <footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#portfolio" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="http://www.facebook.com" class="fa fa-facebook-official w3-hover-opacity"></a>
    <a href="https://www.instagram.com/" class="fa fa-instagram w3-hover-opacity"></a>
    <a  href="http://googleplus.com/" class="fa fa-google w3-hover-opacity"></a>
    <a  href="http://www.twitter.com/" class="fa fa-twitter w3-hover-opacity"></a>

  </div>
  
</footer>
</body>
 </html>