<?php
function loadTemplate($TemplateFileName, $variables = []) {
    extract($variables);
    ob_start();
    include 'templates/'.$TemplateFileName;
    return ob_get_clean();
}

try {
    include 'includes/DatabaseConnection.php';
    include 'classes/DatabaseTable.php';
    include 'classes/Authentication.php';

    include 'controllers/FilmController.php';
    include 'controllers/ReviewerController.php';
    include 'controllers/Login.php';

    $films_table = new DatabaseTable($pdo, 'film', 'id');
    $reviewer_table = new DatabaseTable($pdo, 'reviewer', 'id');
    $authentication = new Authentication($reviewer_table, 'email', 'password');

    $action = $_GET['action'] ?? 'home';

    $controller_name = $_GET['controller'] ?? 'film';

    if ($controller_name == 'film') {
        $controller = new FilmController($films_table, $reviewer_table, $authentication);
    }
    elseif ($controller_name == 'reviewer') {
        $controller = new ReviewerController($reviewer_table);
    }
    elseif ($controller_name == 'login') {
        $controller = new Login($authentication);
    }

    if ($action == strtolower($action) && 
    $controller_name ==  strtolower($controller_name)) {
        $page = $controller->$action();
    }
    else {
        http_response_code(301);
        header('index.php?controller='.strtolower($controller_name).
        '&action='.strtolower($action));
        exit;
    }

    $title = $page['title'];
    $variables = $page['variables'] ?? [];
    $output = loadTemplate($page['template'], $variables);
}
catch (PDOException $e) {
    $title = 'An error has occured';
    $output= 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
