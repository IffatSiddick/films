<?php
    try{
        include 'includes/DatabaseConnection.php';
        include 'classes/DatabaseTable.php';

        $films_table = new DatabaseTable($pdo, 'fims', 'id');
        $reviewer_table = new DatabaseTable($pdo, 'reviewer', 'id');

        if (isset($_POST['film'])){
            $film = $_POST['film'];
            $joke['date'] = date('Y-m-d');
            $film['reviewer_id'] =1;

            $films_table->save($film); 

            header('location: index.php?action=list');
        } 
        else{
            if (isset($_GET['id'])){
                $film = $films_table->find('id', $_GET['id'])[0] ?? null;
            }
            else{
                $film = null;
            }
            $title = 'Edit Review';

            ob_start();
            include 'templates/editreview.html.php';
            $output = ob_get_clean();
        }
    }
    catch (PDOException $e) {
        $title = 'An error has occured';
        $output= 'Database error: ' . $e->getMessage();
}
include 'templates/layout-old.html.php';
