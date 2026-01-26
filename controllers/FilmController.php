<?php
class FilmController {
    private DatabaseTable $FilmTable;
    private DatabaseTable $ReviewerTable;

    public function __construct(DatabaseTable $FilmTable, DatabaseTable $ReviewerTable) {
        $this->FilmTable = $FilmTable;
        $this->ReviewerTable = $ReviewerTable;
    }

    public function list() {
        $result = $this->FilmTable->findAll();
    
        $films = [];
        foreach($result as $film){
            $reviewer = $this->ReviewerTable->find('id', $film['reviewer_id'])[0];

            $films[] = [
                'id' => $film['id'], 
                'review' => $film['review'],
                'date' => $film['date'],
                'name' => $reviewer['name'],
                'email' => $reviewer['email']
            ];
        }
        $title = 'Film list';
        $totalFilms = $this->FilmTable->total();

        ob_start();
        include 'templates/films.html.php';
        $output = ob_get_clean();

        return ['output' => $output, 'title'=>$title];
    }

    public function home() {
        $title = 'Internet Film Database';
        ob_start();
        include 'templates/home.html.php';
        $output = ob_get_clean();

        return ['output' => $output, 'title'=>$title];
    }

    public function delete() {
        $this->FilmTable->delete('id', $_POST['id']);  
        header('location: index.php?action=list');
    }

    public function edit() {
        if (isset($_POST['film'])){
            $film = $_POST['film'];
            $film['date'] = date('Y-m-d');
            $film['reviewer_id'] =1;

            $this->FilmTable->save($film); 

            header('location: index.php?action=list');
        } 
        else {
            if (isset($_GET['id'])) {
                $film = $this->FilmTable->find('id', $_GET['id'])[0] ?? null;
            }
            else {
                $film = null;
            }
            $title = 'Edit Film';

            ob_start();
            include 'templates/editreview.html.php';
            $output = ob_get_clean();
        }

        return ['output' => $output, 'title'=>$title];
    }
}