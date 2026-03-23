<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$title?></title>
  <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">-->
  <link rel="stylesheet" href="/films/my_css.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-title"><b>Film Reviews</b></h3></div>
        <div class="w3-bar-block">
            <a href="index.php"  class="w3-bar-item w3-button w3-hover-white <?= ($action == 'home') ? 'active' : '' ?>">Home</a> 
            <a href="index.php?controller=film&amp;action=list"  class="w3-bar-item w3-button w3-hover-white <?= ($action == 'list') ? 'active' : '' ?>">Review list</a> 
            <a href="index.php?controller=film&amp;action=edit"  class="w3-bar-item w3-button w3-hover-white <?= ($action == 'edit') ? 'active' : '' ?>">Add a new review</a> 
            <?php if ($loggedin): ?>
                <a href="index.php?controller=login&amp;action=logout" class="w3-bar-item w3-button w3-hover-white <?= ($action == 'home') ? 'logout' : '' ?>">Log out</a>
            <?php else: ?>
                <a href="index.php?controller=reviewer&amp;action=registrationform"  class="w3-bar-item w3-button w3-hover-white <?= ($action == 'registrationform') ? 'active' : '' ?>">Register</a> 
                <a href="index.php?controller=login&amp;action=login" class="w3-bar-item w3-button w3-hover-white <?= ($action == 'login') ? 'active' : '' ?>">Log in</a>
            <?php endif;?>
        </div>
    </div>
    

    <!-- Page content -->
    <div class="content">
        <p><?=$output?></p>
    </div>
  
</body>