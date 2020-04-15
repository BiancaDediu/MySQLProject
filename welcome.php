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
 
<?php
session_start();
echo "welcome ". $_SESSION['email'];
echo "     <a href='index.php'>logout</a>";
?>
    <!--inserare imagini sql-->
 <?php
include 'connection.php';
$sql = "SELECT * FROM images ORDER BY id DESC"; 
$result = mysqli_query($con, $sql)or die(mysqli_error($con));
?>
<table rules="rows">
         <tr>
             <th>Name</th>
             <th>Image</th>
             <th colspan="3" center="align">Actions</th>
         </tr>
<?php
while($row=mysqli_fetch_array($result)) {
?>
         <tr style="border-bottom: 1px solid black;">
             <td style="width:300px">
                 <h1> <?php echo $row["title"]; ?></h1>
             </td>
             <td style="width:300px">
<img src="<?php echo $row['image'];?> " height='200' width='300'>
             </td>
<td>

 <?php echo "<a href=\"edit.php?id=".$row['id']."\">Edit</a><a href=\"delete.php?id=".$row['id']."\" onclick=\"return confirm('Are you sure?')\">Delete</a>"?>
               
</td>
    </tr>
<?php }?>
</table>
    <br><br>
       <a href="upload.php">Upload another image</a>

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