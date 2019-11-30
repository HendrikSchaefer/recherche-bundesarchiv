<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
 }

?>


<!DOCTYPE html>
<html lang="de">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="title" content="Recherchedienst Bundesarchiv">
  <meta name="description" content="Recherche">
  <meta name="keywords" content="Recherche Bundesarchiv, Bundesarchiv, Recherchedienst Bundesarchiv,">
  <meta name="robots" content="index, follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="language" content="DE">
  <meta name="author" content="Thomas Pruschwitz">
  <title>Recherchedienst Bundesarchiv</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
  <link rel="stylesheet" href="https://use.typekit.net/wvn2kgc.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="icon" sizes="16x16 32x32 64x64" href="/assets/favicon.ico">
    <link rel="icon" type="image/png" sizes="196x196" href="/assets/favicon-192.png">
    <link rel="icon" type="image/png" sizes="160x160" href="/assets/favicon-160.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon-96.png">
    <link rel="icon" type="image/png" sizes="64x64" href="/assets/favicon-64.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon-16.png">
    <link rel="apple-touch-icon" href="/assets/favicon-57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon-114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon-72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon-144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon-60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon-120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon-76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon-152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon-180.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="/assets/favicon-144.png">
    <meta name="msapplication-config" content="/browserconfig.xml">
  <!-- Bootstrap -->
  <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
$( '.navbar-nav a' ).on( 'click', function () {
	$( '.navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
  alert ('Geht!');
});
</script>
    <!-- Unterstützung für Media Queries und HTML5-Elemente in IE8 über HTML5 shim und Respond.js -->
    <!-- ACHTUNG: Respond.js funktioniert nicht, wenn du die Seite über file:// aufrufst -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- Image and text -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<span class="navbar-brand"><a href="/profile"><img src="/assets/ad-acta-recherchen-bundesarchiv-logo@2x.png" width="250" height="auto"></a></span>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="menuAS">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
            echo strtok (htmlspecialchars($_SESSION["username"]), " ");
      ?>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="/profile">Profil</a>
        <div class="dropdown-divider"></div>
        <a href="/logout"><button type="button" class="btn btn-primary">Logout</button></a>
      </div>
    </li>
  </ul>
  </div>
</nav>
<body>
