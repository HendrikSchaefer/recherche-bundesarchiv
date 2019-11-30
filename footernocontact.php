</body>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">

        <p style="color:#ffffff;">
        <?php
        echo "© Recherchedienst Bundesarchiv |";
        function auto_copyright($year = 'auto'){ ?>
        <?php if(intval($year) == 'auto'){ $year = date('Y'); } ?>
        <?php if(intval($year) == date('Y')){ echo intval($year); } ?>
        <?php if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } ?>
        <?php if(intval($year) > date('Y')){ echo date('Y'); } ?>
        <?php } ?>
        <?php auto_copyright("2019");  // 2010 - 2017 ?></p>

      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
          <span style="color:#ffffff; float:right;">
          <a href="/impressum">Impressum</a> <span style="color:#ffffff;">|</span> <a href="/datenschutzerklaerung">Datenschutz</a></span>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.min.js"></script>
<div class="alert alert-dismissible text-center cookiealert" style="
    padding-right: 20px" role="alert">
<div class="cookiealert-container">
Wir benutzen Cookies, um die beste Funktionalität zu gewährleisten. <a href="/datenschutzerklaerung">Mehr Infos</a>

<button type="button" class="btn btn-info btn-sm acceptcookies" aria-label="Close">
    Danke, ok!
</button>
</div>
</div>
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
</footer>
</html>
