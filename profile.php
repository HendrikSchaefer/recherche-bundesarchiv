<?php require 'header.php'; ?>
    <!--div class="page-header">


    </div-->

      <div class="container containerMain" style="margin-top: 0%;">



        <h1>Hallo <?php echo strtok (htmlspecialchars($_SESSION["username"]), " "); ?>.</h1>
          <?php
          $servername = "localhost";
          $username = "db13228804-rdb";
          $password = "w92YcbJ43BxWyNxJ";
          $dbname = "db13228804-rdb";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // echo "Läuft";
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

        $sessionID = htmlspecialchars($_SESSION["id"]);
        $sql = "SELECT research FROM  `users` WHERE  `id` = $sessionID ";
        $result = mysqli_query($conn, $sql) or die ("Bad query");
        $row = mysqli_fetch_array($result);
        if (strlen($row[0]) > 1) {
        echo "<div style='text-align:center;'>Wir bearbeiten die Bereich <b>" . $row[0] . "</b>.</div>";
        }
        $sql2 = "SELECT street  FROM  `users` WHERE  `id` = $sessionID ";
        $result2 = mysqli_query($conn, $sql2) or die ("Bad query");
        $row = mysqli_fetch_array($result2);
        if (strlen($row[0]) > 1) {
        echo "<div style='text-align:center;'>Sie wohnen in der <b>" . $row[0];
        }
        $sql3 = "SELECT streetnr  FROM  `users` WHERE  `id` = $sessionID ";
        $result3 = mysqli_query($conn, $sql3) or die ("Bad query");
        $row = mysqli_fetch_array($result3);
        if (strlen($row[0]) > 1) {
        echo " " . $row[0]. ".";
        }
?></div>

        <?php

        $conn->close();
        ?>
        </div>

      <?php require 'footernocontact.php'; ?>
