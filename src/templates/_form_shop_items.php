<?php
$statement = $connection->connection->prepare('SELECT p.id, p.title, p.description, p.price, i.photo
 FROM `products` p INNER JOIN `images` i ON p.image_id = i.id GROUP BY p.id');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);