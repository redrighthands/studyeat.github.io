<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">
   <a href="home.php" class="logo">
  <img src="images/LogoStudyeat.jpeg" alt="Studyeat." width="120" height="120">
</a>


      <form action="search_course.php" method="post" class="search-form">
         <input type="text" name="search_course" placeholder="search courses..." required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_course_btn"></button>
      </form>
      <style>
  #menu-btn, #user-btn {
    font-size: 20px; /* Ubah ukuran sesuai keinginan Anda */
  }
  


<style>
.button {
  margin-right: 0px; /* Mengatur margin kanan antara tombol */
}
</style>

      <div id="menu-btn" class="button">Menu</div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="button">Profile</div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>Student</span>
         <a href="profile.php" class="btn">View Profile</a>
         <div class="flex-btn">
            
         </div>
         <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">Logout</a>
         <?php
            }else{
         ?>
         <h3>Login or Register</h3>
          <div class="flex-btn">
            <a href="login.php" class="option-btn">Login</a>
            <a href="register.php" class="option-btn">Register</a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>

</header>

<!-- header section ends -->

<!-- side bar section starts  -->

<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

  <img src="images/tagline.jpeg" alt="Studyeat." width="297" height="150">
</a>
   <nav class="navbar">
      <a href="home.php"><i class=""></i><span>Home</span></a>
      <a href="about.php"><i class=""></i><span>About Us</span></a>
      <a href="courses.php"><i class=""></i><span>Courses</span></a>
      <a href="teachers.php"><i class=""></i><span>Teachers</span></a>
      <a href="contact.php"><i class=""></i><span>Contact us</span></a>

   </nav>

</div>

<!-- side bar section ends -->