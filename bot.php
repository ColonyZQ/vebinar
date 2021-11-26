<?php

require 'data.php';

function readlastline()
{
        $fp = @fopen('logs.php', "r");
        $pos = -1;
        $t = " ";
        while ($t != "\n") {
              fseek($fp, $pos, SEEK_END);
              $t = fgetc($fp);
              $pos = $pos - 1;
        }
        $t = fgets($fp);
        fclose($fp);
        return $t;
}

function request($method) {
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/'.$method,
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
        )
    );
    curl_exec($ch);   
}

function update() {
    request('Update');
}

update();

$data = file_get_contents('php://input');
$data = json_decode($data, true);  



function message($text) {
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
};

?>