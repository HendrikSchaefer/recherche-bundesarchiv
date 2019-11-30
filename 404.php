<?php require 'headernolog.php'; ?>

<div class="container containerMain">
  <img src="/assets/bg-hero.jpg" alt="Recherchedienst Bundesarchiv Berlin" id="bg-picture" width="100%" height="auto">
    <h1><?php echo "Das hätte nicht passieren dürfen. <br> Die Seite <b>" . substr($_SERVER['REQUEST_URI'], 1) . "</b><br>gibt es nicht."; ?> </h1>
    <div class="text-center"><a href="/"><button type="button" class="btn btn-primary">Zurück zur Startseite</button></a></div>
</div>
