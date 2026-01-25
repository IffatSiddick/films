<?php
try {
    include 'includes/DatabaseConnection.php';
    include 'classes/DatabaseTable.php';
    include 'controllers/FilmController.php';

    $films_table = new DatabaseTable($pdo, 'film', 'id');
    $reviewer_table = new DatabaseTable($pdo, 'reviewer', 'id');

    $film_controller = new FilmController($films_table, $reviewer_table);

    $action = $_GET['action'] ?? 'home';
    $page = $film_controller->$action();

    $title = $page['title'];
    $output = $page['output'];
}
catch (PDOException $e) {
    $title = 'An error has occured';
    $output= 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
