<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'] ?? '';
$city = $_GET['city'] ?? '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$results = [];

if ($country != '') {
    $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $stmt->execute(); 
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
} else if ($city != '') {
    $stmt = $conn->prepare("SELECT * FROM cities WHERE name LIKE '%$city%'");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
}

?>
<table>
  <thead>
    <tr>
    <?php if(!empty($country) ) {?>
      <th>Country Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    <?php } elseif(!empty($city)) {?>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    <?php }?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($results as $row): ?>
        <tr>
          <?php if(!empty($country)){?>
            <td><?= !empty($row['name']) ? $row['name'] : '-' ?></td>
            <td><?= !empty($row['continent']) ? $row['continent'] : '-' ?></td>
            <td><?= !empty($row['independence_year']) ? $row['independence_year'] : '-' ?></td>
            <td><?= !empty($row['head_of_state']) ? $row['head_of_state'] : '-' ?></td>
          <?php } else if(!empty($city)){ ?>
            <td><?= !empty($row['name']) ? $row['name'] : '-' ?></td>
            <td><?= !empty($row['district']) ? $row['district'] : '-' ?></td>
            <td><?= !empty($row['population']) ? $row['population'] : '-' ?></td>
          <?php }?>
          
        </tr>
      <?php endforeach; ?>
    </tr>

  </tbody>

</table>
