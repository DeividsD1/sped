<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sped_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vards = $_POST['vārds'] ?? '';
    $uzvards = $_POST['uzvārds'] ?? '';
    $epasts = $_POST['e-pasts'] ?? '';
    $telefons = $_POST['telefons'] ?? '';
    $password_input = $_POST['password'] ?? '';
    
    // Hash the password
    $hashed_password = password_hash($password_input, PASSWORD_DEFAULT);
    
    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (vards, uzvards, epasts, telefons, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $vards, $uzvards, $epasts, $telefons, $hashed_password);
    
    if ($stmt->execute()) {
        $message = "<p style='color: green;'>Reģistrācija veiksmīga!</p>";
    } else {
        $message = "<p style='color: red;'>Kļūda: " . $stmt->error . "</p>";
    }
    
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>Registracijas forma</h1>
   
   <?php echo $message; ?>
   
   <form action="" method="POST">
       <?php
       // Input table
       $fields = ['Vārds', 'Uzvārds', 'E-pasts', 'Telefons', 'Password'];
       
       echo '<table border="1">';
       echo '<tr>';
       foreach ($fields as $field) {
           echo '<th>' . $field . '</th>';
       }
       echo '</tr>';
       
       echo '<tr>';
       foreach ($fields as $field) {
           $input_type = ($field == 'Password') ? 'password' : 'text';
           if ($field == 'E-pasts') {
               $input_type = 'email';
           }
           echo '<td><input type="' . $input_type . '" name="' . strtolower($field) . '" required></td>';
       }
       echo '</tr>';
       echo '<tr>';
       echo '<td colspan="5" style="text-align: center;">';
       echo '<button type="submit">Reģistrēties</button>';
       echo '</td>';
       echo '</tr>';
       echo '</table>';
       ?>
   </form>
</body>
</html>
