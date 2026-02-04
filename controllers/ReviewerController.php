<?php
class ReviewerController {
    private DatabaseTable $reviewerTable;

    public function __construct(DatabaseTable $inputTable) {
        $this->reviewerTable = $inputTable;
    }

    public function registrationform() {
        return [
            'template' => 'register.html.php',
            'title' => 'Register an account!'
        ];
    }

        public function regFormSubmit() {
        $reviewer = $_POST['reviewer'];

        #checking for errors
        $errors = [];

        if (empty($reviewer['name'])) {
            $errors[] = "Name cannot be empty.";
        }

        if (empty($reviewer['email'])) {
            $errors[] = "Email cannot be empty.";
        }
        elseif (filter_var($reviewer['email'], FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = "Invalid email address";
        }
            if (count($this->reviewerTable->find('email', $reviewer['email'])) > 0) {
                $errors[] = "This email has already been registered";
            }
            # check for password length - must be > 12 characters
            else {
                $reviewer['email'] = strtolower($reviewer['email']);
            }

        if (empty($reviewer['password'])) {
            $errors[] = "Password cannot be empty.";
        }

        if (empty($errors)) {
            $reviewer['password'] = password_hash($password, PASSWORD_DEFAULT);;
            $this->reviewerTable->save($reviewer);
            header('location: index.php?controller=reviewer&action=success');
        }
        else {
            return [
            'template' => 'register.html.php',
            'title' => 'Register an account!',
            'variables' => [
                'errors' => $errors,
                'reviewer' => $reviewer
                ]
        ];
        }
    }
    public function success() {
        return [
            'template' => 'registerSuccess.html.php',
            'title' => 'Registration successful!'
        ];
    }
}