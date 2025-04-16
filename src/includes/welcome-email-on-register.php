<?php


add_action('user_register', 'envoyer_mail_si_pas_amelia_employee', 10, 1);

function envoyer_mail_si_pas_amelia_employee($user_id) {
    $user = get_userdata($user_id);
    $roles = $user->roles;
    $to = 'kevin.janiky@gmail.com';
    $subject = 'Un nouvel utilisateur sans le rôle Amelia Employee';
    $message = 'Un nouvel utilisateur a été créé : ' . $user->user_login . ' (' . $user->user_email . ')' . json_encode($roles).' ';
    $headers = ['Content-Type: text/html; charset=UTF-8'];
        wp_mail($to, $subject, $message, $headers);
 }