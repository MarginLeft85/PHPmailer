<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Подключение модулей Composer
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Параметры SMTP-сервера
    //$mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.yandex.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'mymail@yandex.ru';
    $mail->Password = 'pass';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Получатели
    $mail->setFrom('mymail@yandex.ru', 'WebAnt');        // Отправитель
    $mail->addAddress('tomail@mail.ru', 'User Name');    // Добавление получателя

    //$mail->addAddress('contact@example.com');
    //$mail->addReplyTo('info@example.com', 'Info');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');C:\Users\a-glazyrin\Desktop\dev\php_dev\PHPmailer\vendor\files\123.txt

    // Вложенные файлы
    $mail->addAttachment('.\vendor\phpmailer\phpmailer\files\123.zip');         // Добавление файла
    $mail->addAttachment('.\vendor\phpmailer\phpmailer\files\images\1_92.jpg');    // Добавление изображения


    // Контент письма
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = 'Тема письма';
    $mail->Body    = 'Текст самого письма';
    //$mail->AltBody = 'Вариант текста письма для почтовых программ, не поддерживающих HTML';

    // Отправка
    $mail->send();
    echo 'Письмо отправлено';

} catch (Exception $e) {
    echo 'Не удалось отправить письмо.';
    echo 'Ошибка: ' . $mail->ErrorInfo;
}