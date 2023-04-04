<?php
  session_start();

  // Kontrollera om användaren är inloggad
  if (isset($_SESSION['username'])) {
    // Användaren är inloggad, visa sidan
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burgir - Gratis Mat</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
  <div class="container">
    <!-- Logga -->
    <div class="logo-container">
      <img src="/max-logo.png" alt="Logga">
    </div>

    <!-- Knapp 1 -->
    <a href="cheesburgare.php" class="knapp knapp1">
      <img src="/cheesburgare.png" alt="Knapp 1">
    </a>

    <!-- Knapp 2 -->
    <a href="dip.php" class="knapp knapp2">
      <img src="/dip.png" alt="Knapp 2">
    </a>

    <!-- Knapp 3 -->
    <a href="plusmeny.php" class="knapp knapp3">
      <img src="/plusmeny.png" alt="Knapp 3">
    </a>
  </div>
</body>
</html>

<?php
  } else {
    // Användaren är inte inloggad, skicka tillbaka till inloggningssidan
    header('Location: index.html');
    exit();
  }
?>