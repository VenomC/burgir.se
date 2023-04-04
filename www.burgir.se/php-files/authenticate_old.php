<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Hämta användarinformation från JSON-filen
  $data = file_get_contents('users.json');
  $users = json_decode($data, true)['users'];

  // Loopa igenom användarna och kontrollera om inloggningsuppgifterna är korrekta
  foreach ($users as $user) {
    if ($user['username'] == $username && $user['password'] == $password) {
      $_SESSION['username'] = $username;
      header('Location: burgir.php');
      exit();
    }
  }

  // Om inloggningsuppgifterna inte är korrekta, visa ett felmeddelande
  echo 'Felaktigt användarnamn eller lösenord';
}
?>