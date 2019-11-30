<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Bitte geben Sie Ihren Benutzernamen ein.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Bitte geben Sie Ihr Passwort ein.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = :username";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["created_at"] = $created_at;

                            // Redirect user to welcome page
                            header("location: /companyarea");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Das eingegebene Passwort stimmt nicht.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Es wurde kein Benutzer mit diesem Namen gefunden.";
                }
            } else{
                echo "Da ging was schief, bitte probieren Sie es erneut.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
  //  unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
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

    <!-- Unterstützung für Media Queries und HTML5-Elemente in IE8 über HTML5 shim und Respond.js -->
    <!-- ACHTUNG: Respond.js funktioniert nicht, wenn du die Seite über file:// aufrufst -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div style="padding-top:5%;" class="container containerMainLogin">
      <div class="login">
        <h1>Login</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Benutzername</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Passwort</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <!--p>Don't have an account? <a href="register.php">Sign up now</a>.</p-->
        </form>
      </div>
    </div>
    <div class="alert alert-dismissible text-center cookiealert" role="alert">
  <div class="cookiealert-container">
  Wir benutzen Cookies, um die beste Funktionalität zu gewährleisten.

    <button type="button" class="btn btn-info btn-sm acceptcookies" aria-label="Close">
        Danke, ok!
    </button>
  </div>
</div>
</body>

<!-- Include cookiealert script -->
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
</html>
