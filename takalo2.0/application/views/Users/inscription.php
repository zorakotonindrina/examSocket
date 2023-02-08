<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Headers · Bootstrap v5.1</title>

    <link rel="canonical" href="index.html">


 <!-- Bootstrap core CSS -->
 <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" >
 <link href="<?php echo base_url('assets/css/best.css');?>" rel="stylesheet" >


<!-- Favicons -->
<link rel="apple-touch-icon" href="<?php echo base_url('assets/img/favicons/apple-touch-icon.png"');?>" sizes="180x180">
<link rel="icon" href="<?php echo base_url('assets/img/favicons/favicon-32x32.png');?>" sizes="32x32" type="image/png">
<link rel="icon" href="<?php echo base_url('assets/img/favicons/favicon-16x16.png');?>" sizes="16x16" type="image/png">
<link rel="manifest" href="<?php echo base_url('assets/img/favicons/manifest.json');?>">
<link rel="mask-icon" href="<?php echo base_url('assets/img/favicons/safari-pinned-tab.svg');?>" color="#7952b3">
<link rel="icon" href="<?php echo base_url('assets/img/favicons/favicon.ico');?>">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="assets/css/headers.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- <link href="signin.css" rel="stylesheet"> -->
  </head>


  <script src="../../dist/js/bootstrap.bundle.min.js" ></script>

<!-- ------------------------------------------- BODY ------------------------------------------------
<body class="text-center">
<div class="container">
    <main class="form-signin"  style="width: 20%; margin-left: 33%;">
    <form action="<?php echo base_url('UtilisateurController/nouveau_membre');?>" method="post">
        <br>
        <img class="mb-4" src="../../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Inscription</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="mail" placeholder="name@example.com">
          <label for="floatingInput">Mail</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="mdp" placeholder="Enter your password">
          <label for="floatingInput">Passeword</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="contact" placeholder="Enter your contact">
          <label for="floatingInput">Contact</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">S'inscrire eh</button>
       
      </form>
    </main>
    
    
</div>
      </body>
 -->


      
  <body>
    <div class="container">
      <form action="<?php echo base_url('UtilisateurController/nouveau_membre');?>" method="post">
        <div class="title">Sing up</div>
        <div class="input-box underline">
          <input type="text" name="mail" placeholder="Enter Your Email" required>
          <div class="underline"></div>
        </div>

        <div class="input-box">
          <input type="password" name="mdp" placeholder="Enter Your Password" required>
          <div class="underline"></div>
        </div>

        <div class="input-box">
          <input type="password" name="contact" placeholder="Enter Your Contact" required>
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" name="" value="Continue">
        </div>
      </form>
        
    </div>
  </body>
    

<!--------------------------------------------- FOOTER --------------------------------------------->



</html>