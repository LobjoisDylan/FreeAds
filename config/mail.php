<?php


return array(
  "driver" => "smtp",
  "host" => "smtp.mailtrap.io",
  "port" => 2525,
  "from" => array(
    "address" => "from@example.com",
    "name" => "Example"
  ),
  "username" => "c668eb49afde7a",
  "password" => "d9eed82be433df",
  "sendmail" => "/usr/sbin/sendmail -bs",
  "pretend" => false,
  'markdown' => [
    'theme' => 'default',

    'paths' => [
      resource_path('views/vendor/mail'),
      ],
      ],
    );
