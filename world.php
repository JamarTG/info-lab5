<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$countryName = $_GET['name'] ?? '';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$countryName%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
  <thead>
    <tr>
      <th>Country Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($results as $row): ?>
        <tr>
          <td><?= !empty($row['name']) ? $row['name'] : '-' ?></td>
          <td><?= !empty($row['continent']) ? $row['continent'] : '-' ?></td>
          <td><?= !empty($row['independence_year']) ? $row['independence_year'] : '-' ?></td>
          <td><?= !empty($row['head_of_state']) ? $row['head_of_state'] : '-' ?></td>
        </tr>
      <?php endforeach; ?>
    </tr>

  </tbody>

</table>
