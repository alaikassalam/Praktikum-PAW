<?php
function validateName($field_list, $field_name, &$error_messages)
{
    if (!isset($field_list[$field_name])) {
        $error_messages[] = "$field_name is not set.";
        return false;
    }
    $pattern = "/^[a-zA-Z'-]+$/";
    
    if (!preg_match($pattern, $field_list[$field_name])) {
        $error_messages[] = "Data $field_name. salah, karena tidak menggunakan alphabet";
        return false;
    }

    return true;
}
?>
