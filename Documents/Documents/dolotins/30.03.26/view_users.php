<?php
// Export users from database (for sharing)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sped_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users
$sql = "SELECT id, vards, uzvards, epasts, telefons, created_at FROM users";
$result = $conn->query($sql);

echo "<h2>Registered Users</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Vārds</th><th>Uzvārds</th><th>E-pasts</th><th>Telefons</th><th>Created At</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["vards"] . "</td>";
        echo "<td>" . $row["uzvards"] . "</td>";
        echo "<td>" . $row["epasts"] . "</td>";
        echo "<td>" . $row["telefons"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nav reģistrētu lietotāju</td></tr>";
}

echo "</table>";

$conn->close();
?>
