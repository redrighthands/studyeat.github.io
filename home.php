<?php
   include 'components/connect.php';
   if(isset($_COOKIE['user_id'])){
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
   }
   $select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
   $select_likes->execute([$user_id]);
   $total_likes = $select_likes->rowCount();

   $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
   $select_comments->execute([$user_id]);
   $total_comments = $select_comments->rowCount();

   $select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
   $select_bookmark->execute([$user_id]);
   $total_bookmarked = $select_bookmark->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- quick select section starts  -->
<br>
<br>


</section>

<!-- courses section ends -->

<section class="about">

   <div class="row">

   <div class="image">
   <img src="images/gambarabout.png" alt="" style="width: 550px; height: auto;">
</div>


      <div class="content">
         <h3>Why Choose Us?</h3>
         <p>Studyeat hadir sebagai solusi yang inovatif dan efektif. Studyeat adalah platform pembelajaran online yang mengkhususkan diri dalam bahasa pemrograman. Studyeat menawarkan pengalaman belajar yang interaktif dan terstruktur dengan menggunakan pendekatan yang inovatif dan modern. Dalam platform Studyeat, pengguna dapat memilih dari berbagai program kursus yang disesuaikan dengan level dan kebutuhan mereka.</p>
      </div>

   </div>

   

</section>


<br>
<br>
<br>
<br>
<br>

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>