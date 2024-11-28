<?php
require 'validate.inc'; 
$errors = []; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['surname'])) {
        $errors['surname'] = 'Field surname harus diisi.';
    } else {
        validateName($_POST, 'surname', $errors); 
    }if (empty($_POST['email'])) {
        $errors['email'] = 'Field email harus diisi.';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email tidak valid.';
    }

    

    if (empty($errors)) {
        echo 'Form submitted successfully with no errors.';
    } else {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }

        include 'form.inc';
    }
} else {
    include 'form.inc';
}

?>
