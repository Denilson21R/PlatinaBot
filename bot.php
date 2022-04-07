<?php
include __DIR__.'/vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;
use Discord\Builders\MessageBuilder;

$config = parse_ini_file("config.ini");
$messageBuilder = MessageBuilder::new();

$discord = new Discord([
    'token' => $config["token"],
]);

$discord->on('ready', function (Discord $discord) {
    // Listen for messages.

    $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
        if ($message->author->bot){
            $message->react('🖕');
        }
    });

});

$discord->run();