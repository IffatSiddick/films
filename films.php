<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'classes/DatabaseTable.php';

    $films_table = new DatabaseTable($pdo, 'film', 'id');
    $reviewer_table = new DatabaseTable($pdo, 'reviewer', 'id');
        
    $result = $films_table->findAll();
    $films = [];

    foreach($result as $film){
        $reviewer = $reviewer_table->find($pdo, 'reviewer', 'id', $film['reviewer_id'])[0];

        $films[] = [
            'id' => $film['id'], 
            'title' => $film['title'],
            'date' => $film['date'],
            'review' => $film['review'],
            'email' => $reviewer['email']
        ];
    }
    
    $title = 'film list';
    $totalFilms = $films_tabl->total($pdo, 'film');

    ob_start();
    include 'templates/films.html.php';
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occured';
    $output= 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';