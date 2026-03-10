<?php
class FilmController {
    private DatabaseTable $FilmTable;
    private DatabaseTable $ReviewerTable;

    public function __construct(DatabaseTable $FilmTable, 
    DatabaseTable $ReviewerTable,
    private Authentication $authentication) {
        $this->FilmTable = $FilmTable;
        $this->ReviewerTable = $ReviewerTable;
    }

    public function list() {
        include 'includes/DatabaseConnection.php';
        include 'classes/Pagination.php';

        $search = $_GET['search'] ?? '';

        $pagination = new Pagination($pdo, 'film', 5);
        $result = $pagination->get_data();
        $pages  = $pagination->get_pagination_number();

        if (!empty($search)) {
            $films = $this->FilmTable->searchRecipes($search);
        } 
        else {
            $films = [];
            foreach($result as $film){
                $reviewer = $this->ReviewerTable->find('id', $film['reviewer_id'])[0];

                $films[] = [
                    'id' => $film['id'], 
                    'title' => $film['title'],
                    'review' => $film['review'],
                    'date' => $film['date'],
                    'name' => $reviewer['name'],
                    'email' => $reviewer['email'],
                    'reviewer' => $reviewer['id']
                ];
            }
        }
    
        $title = 'Film list';
        $totalFilms = $this->FilmTable->total();

        $user = $this->authentication->getUser();

        return ['template' => 'films.html.php', 
                'title'=> $title,
                'variables' => [
                    'totalFilms' => $totalFilms,
                    'search' => $search,
                    'pagination' => $pagination,
                    'films' => $films,
                    'pages' => $pages,
                    'userID' => $user['id'] ?? null
                    ]
                ];
    }

    public function home() {
        $title = 'Internet Film Database';
        ob_start();
        include 'templates/home.html.php';
        $output = ob_get_clean();

        return ['template' => 'home.html.php', 'title'=>$title];
    }

    public function delete() {
        $this->FilmTable->delete('id', $_POST['id']);  
        header('location: index.php?controller=film&action=list');
    }

    public function edit() {
        if (!$this->authentication->isLoggedIn()) {
            return ['template' => 'error.html.php', 
            'title'=>'You are not authorised to use this page.'];
        }
        else {
            if (isset($_POST['film'])){
                $reviewer = $this->authentication->getUser();

                $film = $_POST['film'];
                $film['date'] = date('Y-m-d');
                $film['reviewer_id'] = $reviewer[0]['id'];

                $this->FilmTable->save($film); 

                header('location: index.php?controller=film&action=list');
            } 
            else {
                if (isset($_GET['id'])) {
                    $film = $this->FilmTable->find('id', $_GET['id'])[0] ?? null;
                }
                else {
                    $film = null;
                }

                $title = 'Edit Film';
                $user = $this->authentication->getUser();

                return ['template' => 'editreview.html.php',
                    'title'=>$title,
                    'variables' => [
                        'film' => $film,
                        'userID' => $user['id'] ?? null,
                        'reviewerID' => $film['reviewer_id'] ?? null
                    ]
                ];
            }
        }
    }
}