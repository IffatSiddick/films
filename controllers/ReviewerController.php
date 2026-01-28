<?php
class ReviewerController {
    private DatabaseTable $ReviewerTable;

    public function __construct(DatabaseTable $reviewersTable) {
        $this->ReviewerTable = $reviewersTable;
    }

    public function registrationform() {
        return [
            'template' => 'register.html.php',
            'title' => 'Register an account!'
        ];
    }

    public function success() {
        return [
            'template' => 'registerSuccess.html.php',
            'title' => 'Registration successful!'
        ];
    }
}