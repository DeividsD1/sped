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
    $vards = $_POST['vards'] ?? '';
    $uzvards = $_POST['uzvards'] ?? '';
    $epasts = $_POST['epasts'] ?? '';
    $telefons = $_POST['telefons'] ?? '';
    $password_input = $_POST['password'] ?? '';

    // Hash password
    $hashed_password = password_hash($password_input, PASSWORD_DEFAULT);

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO users (vards, uzvards, epasts, telefons, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $vards, $uzvards, $epasts, $telefons, $hashed_password);

    if ($stmt->execute()) {
        $message = "<div class='success'>Reģistrācija veiksmīga!</div>";
    } else {
        $message = "<div class='error'>Kļūda: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reģistrācija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Reģistrācijas forma</h1>

    <?php echo $message; ?>

    <form method="POST">

        <label>Vārds</label>
        <input type="text" name="vards" required>

        <label>Uzvārds</label>
        <input type="text" name="uzvards" required>

        <label>E-pasts</label>
        <input type="email" name="epasts" required>

        <label>Telefons</label>
        <input type="tel" name="telefons" 
               pattern="[0-9+\-\s()]{8,20}" 
               title="Ievadiet derīgu telefona numuru">

        <label>Parole</label>
        <input type="password" name="password" required>

        <button type="submit">Reģistrēties</button>

    </form>
</div>

<script src="index.js"></script>
</body>
</html>