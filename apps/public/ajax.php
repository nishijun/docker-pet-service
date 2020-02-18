<?php
use Illuminate\Support\Facades\Auth;

try {
  $dsn = "mysql:host=db-host;dbname=pet;charset=utf8";
  $user = 'root';
  $password = 'root';

  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
  ];
  $dbh = new PDO($dsn, $user, $password, $options);

  $stmt = $dbh->prepare('SELECT * FROM favorites WHERE user_id = :user_id AND pet_id = :pet_id');
  $stmt->execute([':user_id' => Auth::id(), 'pet_id' => $_POST['pet_id']]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$result) {
    $stmt = $dbh->prepare('INSERT INTO favorites (user_id, pet_id) VALUES (:user_id, :pet_id)');
    $stmt->execute([':user_id' => Auth::id(), ':pet_id' => $_POST['pet_id']]);
  } else {
    $stmt = $dbh->prepare('DELETE FROM favorites WHERE user_id = :user_id AND pet_id = :pet_id');
    $stmt->execute([':user_id' => Auth::id(), ':pet_id' => $_POST['pet_id']]);
  }
} catch (PDOException $e) {
  $e->getMessage();
  exit;
}
