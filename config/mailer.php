<?php return [
    'class' => 'yii\swiftmailer\Mailer',
    'viewPath' => '@app/mail',
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => getenv('SMTP_HOST'),
        'username' => getenv('SMTP_LOGIN'),
        'password' => getenv('SMTP_PASSWORD'),
        'port' => '587',
        'encryption' => 'tls',
    ],
    'useFileTransport' => YII_ENV_DEV,
];
