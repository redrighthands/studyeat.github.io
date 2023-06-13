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
      <a href="dashboard.php" class="logo">
         <img src="../images/LogoStudyeat.jpeg" alt="Admin" width="100" height="100">
      </a>
      <form action="search_page.php" method="post" class="search-form">
         <input type="text" name="search" placeholder="search here..." required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>
      <style>

#menu-btn, #user-btn {
  font-size: 20px;
}

<style>
.button {
margin-right: 0px; 
}
</style>

    <div id="menu-btn" class="button">Menu</div>
       <div id="search-btn" class="fas fa-search"></div>
       <div id="user-btn" class="button">Profile</div>
    </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
            $select_profile->execute([$tutor_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= $fetch_profile['profession']; ?></span>
         <a href="profile.php" class="btn">View Profile</a>
         <div class="flex-btn">
   
         </div>
         <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">Logout</a>
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

   <div class="profile">
        </div>
        <img src="../images/tagline.jpeg" alt="Studyeat." width="297" height="150">

   <nav class="navbar">
      <a href="dashboard.php"><i class=></i><span>Home</span></a>
      <a href="playlists.php"><i class=></i><span>Playlists</span></a>
      <a href="contents.php"><i class=></i><span>Contents</span></a>
      <a href="comments.php"><i class=></i><span>Comments</span></a>
      <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');"><i class=></i><span>Logout</span></a>
   </nav>

</div>

<!-- side bar section ends -->