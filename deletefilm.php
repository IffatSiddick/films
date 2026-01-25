<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'classes/DatabaseTable.php';

    $films_table = new DatabaseTable($pdo, 'film', 'id');
    
    $films_table->delete('id', $_POST['id']); 
    
    header('location: films.php');
}catch(PDOException $e){
$title = 'An error has occured';
$output = 'Unable to connect to delete film: ' .$e->getMessage();
}
include 'templates/layout.html.php';

