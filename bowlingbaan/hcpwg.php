<?php
// echo password_hash("wachtwoord123", PASSWORD_DEFAULT);

$hash = '$2y$10$oAIp7ORpw8l1O2ZrWmOXDumdjvSm5Aj3KBx5WDycCd0UPmJx1x/fC';

if (password_verify('wachtwoord123', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>