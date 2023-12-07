<?php

require_once 'PDO.php';

try {
    $searchTerm = '%' . $_GET['searchTerm'] . '%';

    $sql = "SELECT title, cast FROM movies_full WHERE cast LIKE :searchTerm";

    $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    $json_data = json_encode($data);

    echo $json_data;
} catch (PDOException $e) {
    die("Erreur PDO : " . $e->getMessage());
}
