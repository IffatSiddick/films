<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$title?></title>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}
  </style>
</head>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Film<br>Reviews</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="index.php"  class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="index.php?controller=film&amp;action=list"  class="w3-bar-item w3-button w3-hover-white">Review list</a> 
    <a href="index.php?controller=film&amp;action=edit"  class="w3-bar-item w3-button w3-hover-white">Add a new review</a> 
    <a href="index.php?controller=reviewer&amp;action=registrationform"  class="w3-bar-item w3-button w3-hover-white">Register</a> 
    <a href="index.php?controller=login&amp;action=login" class="w3-bar-item w3-button w3-hover-white">Log in</a>
  </div>
</nav>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1>Internet film reviews</h1>
  </div>
  <div class="w3-container" id="services" style="margin-top:75px">
      <p><?=$output?></p>
  </div>
</div>
<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></p></div>

</body>
</html>