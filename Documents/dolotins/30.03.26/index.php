<?php
// Input table
$fields = ['Vārds', 'Uzvārds', 'E-pasts', 'Telefons'];

echo '<table border="1">';
echo '<tr>';
foreach ($fields as $field) {
    echo '<th>' . $field . '</th>';
}
echo '</tr>';

echo '<tr>';
foreach ($fields as $field) {
    echo '<td><input type="text" name="' . strtolower($field) . '"></td>';
}
echo '</tr>';
echo '</table>';
?>
