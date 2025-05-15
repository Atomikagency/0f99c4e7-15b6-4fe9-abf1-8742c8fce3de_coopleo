<?php


add_action('user_register', 'envoyer_mail_si_pas_amelia_employee', 10, 1);

function envoyer_mail_si_pas_amelia_employee($user_id)
{
    $settings = get_option('coopleo_search_engine_options');
    if (!empty($settings['active_webhook_new_account'])) {


        $user = get_userdata($user_id);
        $webhook_url = 'https://hook.eu2.make.com/lc3x65m5jmf48u2ggjcbkpwztu1rsub7';
        $reset_key = get_password_reset_key($user);
        $user_login = $user->user_login;
        $site_url = site_url();

        $reset_url = $site_url . '/wp-login.php?action=rp&key=' . $reset_key . '&login=' . rawurlencode($user_login);
        $data = array(
            'user_id' => $user_id,
            'password_reset_url' => $reset_url
        );
        $jsonData = json_encode($data);

        $ch = curl_init($webhook_url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));

        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            error_log('Erreur cURL : ' . curl_error($ch));
        }

        curl_close($ch);
    }

}