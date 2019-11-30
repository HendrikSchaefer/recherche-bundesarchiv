<?php require 'header.php'; ?>
    <!--div class="page-header">


    </div-->

      <div class="container containerMain" style="margin-top: 0%;">
<script>
$(document).ready(function () {
$('#periodStart').val('1941-01-01'); sets value
});
</script>


        <h1>Abfrage Bestände Bundesarchiv.</h1>
        <p></p>
        <form method="post">
          <div class="row">
            <div class="col-sm-3">
          <label for="periodStart">Laufzeit von</label>
          <input type="date" name="periodStart" id="periodStart" value="<?php if(isset($_POST['periodStart'])){echo $_POST['periodStart'];} if (empty($_POST['periodStart'])) {
    echo '1941-01-01';}?>">
            </div>
            <div class="col-sm-3">
          <label for="periodEnd">Laufzeit bis</label>
          <input type="date" name="periodEnd" id="periodEnd" value="<?php if(isset($_POST['periodEnd'])){echo $_POST['periodEnd'];} if (empty($_POST['periodEnd'])) {
    echo '1945-05-08';}?>">
            </div>
            <div class="col-sm-3">
          <label for="amountPhotos">Anzahl Filme</label>
          <input type="number" name="amountPhotos" id="amountPhotos" value="<?php if(isset($_POST['amountPhotos'])){echo $_POST['amountPhotos'];} if (empty($_POST['amountPhotos'])) {
    echo '0';}?>">
            </div>
          </div>
          <input type="submit" name="search" id="search" value="Suche">
        </form><br>
          <?php
          $servername = "localhost";
          $username = "db13228804-rdb";
          $password = "w92YcbJ43BxWyNxJ";
          $dbname = "db13228804-rdb";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // echo "Datenbankverbindung steht!";
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          $amountofPhotos = intval($_POST['amountPhotos']);
          $periodStart = $_POST['periodStart'];
          $periodEnd = $_POST['periodEnd'];

        mysqli_query($conn, "SET NAMES 'utf8'");
        $sessionID = htmlspecialchars($_SESSION["id"]);
        $sql = "SELECT stock, stockNr, shortTitle, signature, periodStart, periodEnd FROM `databaseBA` WHERE `films` = '$amountofPhotos' LIMIT 0, 300 ";
        $result = mysqli_query($conn, $sql) or die ("Bad query");

    $row_cnt = $result->num_rows;

    printf("%d Treffer \n", $row_cnt);
    echo ("<br><br>");

        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div style='margin-bottom:10px;' class='card-body'>
          <b>Bestand:</b> " . $row["stock"]. " - " . $row["stockNr"] . " <b>Signatur:</b> " . $row["signature"] . " <br><b>Kurztitel:</b> " . $row["shortTitle"]. " <br><b>Laufzeit:</b> " . $row["periodStart"]. " bis " . $row["periodEnd"]."</div>";
    }
} else {
    echo "0 results";
}
  echo "<h2>Test mit Datum</h2>";
      $sql2 = "SELECT stock, stockNr, shortTitle, signature, periodStart, periodEnd FROM `databaseBA` WHERE `periodStart` = '1944-09-23' LIMIT 0, 300 ";
      $result2 = mysqli_query($conn, $sql2) or die ("Bad query");
      if ($result2->num_rows > 0) {
      // output data of each row
      while($row = $result2->fetch_assoc()) {
      echo "<div style='margin-bottom:10px;' class='card-body'>
        <b>Bestand:</b> " . $row["stock"]. " - " . $row["stockNr"] . " <b>Signatur:</b> " . $row["signature"] . " <br><b>Kurztitel:</b> " . $row["shortTitle"]. " <br><b>Laufzeit:</b> " . $row["periodStart"]. " bis " . $row["periodEnd"]."</div>";
      }
      } else {
      echo "Das hat nicht geklappt.";
      }

?></div>


        <?php

        $conn->close();
        ?>
        </div>

      <?php require 'footernocontact.php'; ?>
