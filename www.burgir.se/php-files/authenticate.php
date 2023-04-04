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

      // Lägg till inloggning i loggfilen
      $log_data = array(
        'username' => $username,
        'timestamp' => date('Y-m-d H:i:s')
      );
      $log_file = 'log.json';
      $log_data_json = json_encode($log_data) . "\n";
      file_put_contents($log_file, $log_data_json, FILE_APPEND);

      header('Location: home.php');
      exit();
    }
  }

  // Om inloggningsuppgifterna inte är korrekta, visa ett felmeddelande
  echo 'Felaktigt användarnamn eller lösenord';
}
