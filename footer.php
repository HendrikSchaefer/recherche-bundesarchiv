
<?php
if(isset($_POST['absenden'])){
$empfaenger = array("h.schaefer@recherche-bundesarchiv.de", "fragen@recherche-bundesarchiv.de");
$betreff = "Kontaktanfrage Webseite";
$from = "From: Recherche Bundesarchiv <fragen@recherche-bundesarchiv.de>\r\n";
$from .= "Reply-To: " . $_POST['email'] . "\r\n";
$from .= "Content-Type: text/html\r\n";
$text = "<b>Vorname:</b> " . $_POST['vorname'] . "<br /><b>Nachname:</b> " . $_POST['nachname'] . "<br /><b>E-Mail:</b>  " . $_POST['email'] . "<br /><br /><b>Auswahl Kategorie:</b> " . $_POST['selectionCategory'] . "<br /><br /><b>Nachricht:</b> " . $_POST['nachricht'];

mail($empfaenger, $betreff, $text, $from);
$message = "<p class='text-center'>Vielen Dank, " . $_POST['vorname'] . ". Wir werden uns <br>schnellstmöglich bei Ihnen melden.</p>";
echo "<script>
$(document).ready(function(){
  $('.erfolg').show(300).delay(7000).fadeOut(500);
});
</script>
";
}
?>
<div>

</div>
<div class="container fieldForm ContactForm">
  <h2 id="anfrage" class="text-center">Anfrage</h2>
<form  action="" method="post">
<div id="vorUndZuname">
  <div class="row">
  <div class="col-sm-6">
 <input  type="text" name="vorname" id="vorname" placeholder="Vorname" onfocus="if(this.value==this.defaultValue)this.value='';"  required/></div>
<div class="col-sm-6">
 <input  type="text" name="nachname" id="nachname" placeholder="Nachname" onfocus="if(this.value==this.defaultValue)this.value='';"  required/></div>
</div>
</div>
<input type="email" name="email" id="email" placeholder="Email-Adresse zur Bestätigung der Anfrage" onfocus="if(this.value==this.defaultValue)this.value='';" required/>
<div class="form-group selectResearch">
  <label id="categoryResearchLabel" for="sel1">Auswahl der Kategorie</label>
  <select name="selectionCategory" class="form-control" id="sel1">
    <option>1. Personenrecherche</option>
    <option>2. Ortsrecherche</option>
    <option>3. Ereignisrecherche</option>
  </select>
</div>

<div id="messageField">
    <textarea type="text" id="nachricht" name="nachricht" cols="50" rows="5" placeholder="Welche Fragen haben Sie?"></textarea><br>
    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked required>
    <label class="form-check-label" for="exampleCheck1">Ich habe die Datenschutzerklärung zur Kenntnis genommen. Ich stimme zu, dass meine Angaben und Daten zur Beantwortung meiner Anfrage elektronisch erhoben und gespeichert werden. Hinweis: Sie können Ihre Einwilligung jederzeit für die Zukunft per E-Mail an fragen@recherche-bundesarchiv.de widerrufen.</label>
  </div><br/>
 <input class="absenden" type="submit" name="absenden" value="Absenden"/>
</div>
</form>
</div>
</body>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">

        <p style="color:#ffffff;">
        <?php
        echo "© Ad Acta Recherchen |";
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
<script>
  $(document).ready(function () {
    history.replaceState(null, null, ' ');
$('a[href*="#"]').on('click',function(e) {
 e.preventDefault();
 var target = this.hash;
 var $target = $(target);
 $('html, body').stop().animate({
  'scrollTop': $target.offset().top
 }, 900, 'swing', function () {
  window.location.hash = target;
 });
});

var back_to_top_button = ['<a href="#top" class="back-to-top"><i class="fas fa-arrow-circle-up"></i></a>'].join("");
	$("body").append(back_to_top_button)

	// Der Button wird ausgeblendet
	$(".back-to-top").hide();

	// Funktion für das Scroll-Verhalten
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) { // Wenn 100 Pixel gescrolled wurde
				$('.back-to-top').fadeIn();
			} else {
				$('.back-to-top').fadeOut();
			}
		});

		$('.back-to-top').click(function () { // Klick auf den Button
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});


});
</script>
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
</footer>
</html>
