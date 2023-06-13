<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

if(isset($_POST['delete'])){
   $delete_id = $_POST['playlist_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE id = ? AND tutor_id = ? LIMIT 1");
   $verify_playlist->execute([$delete_id, $tutor_id]);

   if($verify_playlist->rowCount() > 0){

   

   $delete_playlist_thumb = $conn->prepare("SELECT * FROM `playlist` WHERE id = ? LIMIT 1");
   $delete_playlist_thumb->execute([$delete_id]);
   $fetch_thumb = $delete_playlist_thumb->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_files/'.$fetch_thumb['thumb']);
   $delete_bookmark = $conn->prepare("DELETE FROM `bookmark` WHERE playlist_id = ?");
   $delete_bookmark->execute([$delete_id]);
   $delete_playlist = $conn->prepare("DELETE FROM `playlist` WHERE id = ?");
   $delete_playlist->execute([$delete_id]);
   $message[] = 'playlist deleted!';
   }else{
      $message[] = 'playlist already deleted!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Playlists</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
<style>
  .row {
    display: flex;
    align-items: center;
  }

  .image {
    flex: 0 0 auto;
    margin-right: 20px;
  }

  .content {
    flex: 1 1 auto;
  }
</style>
<section class="about">
  <div class="row">
    <div class="image">
      <img src="../images/gambarabout.png" alt="" style="width: 550px; height: auto;">
    </div>
    <div class="content">
      <h1 style="text-align: center;font-size:27px;">Why Choose Us?</h1>
      <p style="text-align: center; font-size: 18px; color: gray;">Studyeat hadir sebagai solusi yang inovatif dan efektif. Studyeat adalah platform pembelajaran online yang mengkhususkan diri dalam bahasa pemrograman. Studyeat menawarkan pengalaman belajar yang interaktif dan terstruktur dengan menggunakan pendekatan yang inovatif dan modern. Dalam platform Studyeat, pengguna dapat memilih dari berbagai program kursus yang disesuaikan dengan level dan kebutuhan mereka.</p>    </div>
  </div>
</section>

<br>
<br>
<br>
<br>
<br>


<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

<script>
   document.querySelectorAll('.playlists .box-container .box .description').forEach(content => {
      if(content.innerHTML.length > 100) content.innerHTML = content.innerHTML.slice(0, 100);
   });
</script>

</body>
</html>