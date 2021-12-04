<?php
    // DataBase
    try{
        $pdo = new PDO(DSN,USERNAME,PASSWORD);
    }
    catch (PDOException $e){
        die("Error ! : " . $e->getTraceAsString());
    }
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Se connecter</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

      <style>

      .transition, form button, form .question label, form .question input[type="text"] {
  -moz-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
  -o-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
  -webkit-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
  transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
}

      .transition, form button, form .question label, form .question input[type="password"] {
  -moz-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
  -o-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
  -webkit-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
  transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
}

* {
  font-family: Helvetica, sans-serif;
  font-weight: light;
  -webkit-font-smoothing: antialiased;
}

html {
  background-color: #072C63;

}

body {
    background-color: #072C63;

}
form {
  position: relative;
  display: inline-block;
  max-width: 700px;
  min-width: 500px;
  box-sizing: border-box;
  padding: 30px 25px;
  background-color: white;
  border-radius: 40px;
  margin: 40px 0;
  left: 50%;
  -moz-transform: translate(-50%, 0);
  -ms-transform: translate(-50%, 0);
  -webkit-transform: translate(-50%, 0);
  transform: translate(-50%, 0);
}

form h2 {
  color: #0152A4;
  font-weight: 50;
  letter-spacing: 0.01em;
  margin-left: 15px;
  margin-bottom: 35px;
  text-align: center;
  font-size: 35px;
}
form h1 {
  color: #0152A4;
  font-weight: 100;
  letter-spacing: 0.01em;
  margin-left: 15px;
  margin-bottom: 35px;
  text-align: center;
}
form .question {
  position: relative;
  padding: 10px 0;
}
form .question:first-of-type {
  padding-top: 0;
}
form .question:last-of-type {
  padding-bottom: 0;
}
form .question label {
  transform-origin: left center;
  color: #0152A4;
  font-weight: 100;
  letter-spacing: 0.01em;
  font-size: 17px;
  box-sizing: border-box;
  padding: 10px 15px;
  display: block;
  position: absolute;
  margin-top: -40px;
  z-index: 2;
  pointer-events: none;
}
form .question input[type="text"] {
  appearance: none;
  background-color: none;
  border: 1px solid #0152A4;
  line-height: 0;
  font-size: 17px;
  width: 100%;
  display: block;
  box-sizing: border-box;
  padding: 10px 15px;
  border-radius: 60px;
  color: #0152A4;
  font-weight: 100;
  letter-spacing: 0.01em;
  position: relative;
  z-index: 1;
}
.debut {

  appearance: none;
  background-color: none;
  border: 1px solid #0152A4;
  line-height: 0;
  font-size: 17px;
  width: 100%;
  display: block;
  box-sizing: border-box;
  padding: 10px 15px;
  border-radius: 60px;
  color: #0152A4;
  font-weight: 100;
  letter-spacing: 0.01em;
  position: relative;
  z-index: 1;  border: 1px solid #0152A4;
  line-height: 0;
  font-size: 17px;
  text-align: center;
}
form .question input[type="text"]:focus {
  outline: none;
  background: #0152A4;
  color: white;
  margin-top: 30px;
}
form .question input[type="text"]:valid {
  margin-top: 30px;
}
form .question input[type="text"]:focus ~ label {
  -moz-transform: translate(0, -35px);
  -ms-transform: translate(0, -35px);
  -webkit-transform: translate(0, -35px);
  transform: translate(0, -35px);
}
form .question input[type="text"]:valid ~ label {
  text-transform: uppercase;
  font-style: italic;
  -moz-transform: translate(5px, -35px) scale(0.6);
  -ms-transform: translate(5px, -35px) scale(0.6);
  -webkit-transform: translate(5px, -35px) scale(0.6);
  transform: translate(5px, -35px) scale(0.6);
}

form .question input[type="submit"] {
  appearance: none;
  background-color: none;
  border: 3px solid #0152A4;
  line-height: 0;
  font-size: 17px;
  width: 100%;
  display: block;
  box-sizing: border-box;
  padding: 15px 15px;
  border-radius: 60px;
  color: #0152A4;
  font-weight: 100;
  letter-spacing: 0.01em;
  position: relative;
  z-index: 1;

}
form .question input[type="submit"]:valid {
  margin-top: 50px;
}

form .question input[type="password"] {
  appearance: none;
  background-color: none;
  border: 1px solid #0152A4;
  line-height: 0;
  font-size: 17px;
  width: 100%;
  display: block;
  box-sizing: border-box;
  padding: 10px 15px;
  border-radius: 60px;
  color: #0152A4;
  font-weight: 100;
  letter-spacing: 0.01em;
  position: relative;
  z-index: 1;
}
form .question input[type="password"]:focus {
  outline: none;
  background: #0152A4;
  color: white;
  margin-top: 30px;
}
form .question input[type="password"]:valid {
  margin-top: 30px;
}
form .question input[type="password"]:focus ~ label {
  -moz-transform: translate(0, -35px);
  -ms-transform: translate(0, -35px);
  -webkit-transform: translate(0, -35px);
  transform: translate(0, -35px);
}
form .question input[type="password"]:valid ~ label {
  text-transform: uppercase;
  font-style: italic;
  -moz-transform: translate(5px, -35px) scale(0.6);
  -ms-transform: translate(5px, -35px) scale(0.6);
  -webkit-transform: translate(5px, -35px) scale(0.6);
  transform: translate(5px, -35px) scale(0.6);
}

form input[type=submit]:hover{
    background-color: #0152A4;
    color: white;
}



    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <!-- Form for the login -->
<section class="login">
  <form action="?view=login" method="post">
  
  <div class="debut"><img src="https://i.ibb.co/VCkDrNK/eisti.png" alt="EISTI" height="90"><br><h2>Bienvenue à la plateforme <h2>du service prospection</h2><h2>EISTI</h2></div>
  <br>
  <br>
  <br>
  <h1>Se connecter</h1>
  <div id="error" style="color:Red;"></div>
  <div class="question">
    <input type="text" name="username" required/>
    <label>Nom d'utilisateur</label>
  </div>
  <div class="question">
    <input type="password" name="password" minlength="8" required/>
    <label>Mot de passe</label>
    <input type="submit" value="CONNEXION">
  </div>


</form>
  <?php
    if (!empty($_POST['username']) && !empty($_POST['password'])){
      $host = "ldap-test.ccr.eisti.fr";
      $port = 389;
      $check_ldap = ldap_connect($host, $port);
      ldap_set_option($check_ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
      $ldap_auth = ldap_bind($check_ldap, 'cn=webuser,dc=eisti,dc=fr', 'W3bUs3r');
      $searchDn = ldap_search($check_ldap, 'ou=People,dc=eisti,dc=fr', '(&(uid='.$_POST['username'].'))', ['dn']);
      $rDn = ldap_get_entries($check_ldap, $searchDn);

      if($rDn['count'] != 0){
        $dnClient = $rDn[0]['dn'];

        try{
          $ldap_auth = ldap_bind($check_ldap, $dnClient, $_POST['password']);
        }
        catch (PDOException $e){
              die("Error ! : " . $e->getTraceAsString());
          }

        if($ldap_auth == TRUE){
          $username = $_POST['username'];
          $searchClient = $pdo->query("SELECT Username FROM utilisateurs WHERE Username='$username'")->fetch(PDO::FETCH_ASSOC);
          
          if ($searchClient != false){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
          }
          else {
            $username = $_POST['username'];
            $search = ldap_search($check_ldap, 'ou=People,dc=eisti,dc=fr', '(&(uid='.$_POST['username'].'))', ['sn', 'cn', 'mail']);
            $r = ldap_get_entries($check_ldap, $search);
            $nom = $r[0]['sn'][0];
            $prenom = $r[0]['cn'][0];
            $email = $username . "\@eisti.eu";
            $pdo->query("INSERT INTO utilisateurs (Username, Prenom, Nom, Email, Privileges) VALUES ('$username', '$prenom', '$nom', '$email', 'Student')")->fetch(PDO::FETCH_ASSOC);
          }

          $_SESSION['username'] = $username;
          $searchUser = $pdo->query("SELECT Username FROM utilisateurs WHERE Username='$username' AND Privileges='Student'")->fetch(PDO::FETCH_ASSOC);

          if ($searchUser != false){
            header("Location:?view=accueil_eleves");
                      exit();
          }
          else {
            header("Location:?view=accueil_admin");
                    exit();
          }
        }
        else {
                  echo "<script>
                          $('#error').text('Erreur d\'authentification.')
                        </script>";
        }
      }
      else {
                echo "<script>
                        $('#error').text('Erreur d\'authentification.')
                      </script>";
      }
    }
    ?>
  </section>
</body>
</html>
