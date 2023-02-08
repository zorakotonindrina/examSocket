<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('form');


?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Login Form | CodingLab </title>--->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/best.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container">
    <form action="<?php echo base_url('AdminController/login');?>" method="post">
        <div class="title">Login Admin</div>
        <div class="input-box underline">
          <input type="text" placeholder="Enter Your Email" name="mail" required>
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Enter Your Password" name="mdp" required>
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" name="" value="Connecter">
        </div>
      </form>
       
    </div>
  </body>
</html>

