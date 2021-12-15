<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="newsletter.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <input type="checkbox" id="toggle">
  <label for="toggle" class="show-btn">zobrazit</label>
  <div class="wrapper">
    <label for="toggle">
    <i class="cancel-icon fas fa-times"></i>
    </label>
    <div class="icon"><i class="far fa-envelope"></i></div>
    <div class="content">
      <header>Přihlaště se k odběru novinek</header>
      <p>Přihlaste se k odběru novinek a získejte nejnovější aktualizace přímo do vaší schránky.</p>
    </div>
    <form action="index.php" method="POST">
    <?php 
    $userEmail = ""; 
    if(isset($_POST['subscribe'])){ 
      $userEmail = $_POST['email']; 
      if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ 
        $subject = "Děkujeme, že jste se k nám přihlásili – JH-design.cz";
        $message = "Děkujeme, že jste se přihlásili k odběru novinek. Vždy od nás budete dostávat nejnovější informace.";
        $sender = "Od: info@jh-design.cz";
        if(mail($userEmail, $subject, $message, $sender)){
          ?>
          <div class="alert success-alert">
            <?php echo "Děkujeme, že jste se přihlásili k odběru novinek." ?>
          </div>
          <?php
          $userEmail = "";
        }else{
          ?>
          <div class="alert error-alert">
          <?php echo "Přihlášení k odběru se nezdařilo!" ?>
          </div>
          <?php
        }
      }else{
        ?>
        <div class="alert error-alert">
          <?php echo "$userEmail neplatná emailová adresa" ?>
        </div>
        <?php
      }
    }
    ?>
      <div class="field">
        <input type="text" class="email" name="email" placeholder="Emailová adresa" required value="<?php echo $userEmail ?>">
      </div>
      <div class="field btn">
        <div class="layer"></div>
        <button type="submit" name="subscribe">Odebírat</button>
      </div>
    </form>
    <div class="text">Vaše informace nesdílíme.</div>
  </div>

</body>
</html>
