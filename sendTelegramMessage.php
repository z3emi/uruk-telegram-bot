<?php
function sendTelegramMessage($chat_id, $message, $token) {
    $url = "https://api.telegram.org/bot8125746741:AAE4ucec-ZXIjFUB92FcC4DiJDwUAUmAeF4/sendMessage";
    
    $postData = [
        'chat_id' => $chat_id,
        'text' => $message
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($postData),
        ],
    ];
    
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
}

// مثال لإرسال رسالة
$token = '8125746741:AAE4ucec-ZXIjFUB92FcC4DiJDwUAUmAeF4'; // استبدل بـ توكن البوت الخاص بك
$chat_id = '1936652035'; // استبدل بـ Chat ID الخاص بالمستخدم
$message = 'تم تجديد اشتراكك بنجاح!'; // الرسالة التي سيتم إرسالها

sendTelegramMessage($chat_id, $message, $token);
?>
