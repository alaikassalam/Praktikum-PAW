<?php
require 'validate.inc'; 
$error_messages = []; 
if (validateName($_POST, 'surname', $error_messages)) {
    echo 'Data sudah memenuhi syarat!';
} else {
    foreach ($error_messages as $error) {
        echo "<p>Error: $error</p>";
    }
}
?>
