#!/usr/bin/env php
<?php

if ($argc !== 2) {
    echo "Usage: php github-activity.php <github-username>\n";
    exit(1);
}

$username = $argv[1];

$url = "https://api.github.com/users/$username/events";

$options = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: Github-Activity-CLI\r\n"
    ]
];

$context = stream_context_create($options);
$response = @file_get_contents($url, false, $context);

if ($response === FALSE) {
    echo "Failed to fetch data for user '$username' . Make sure the username is correct.\n";
    exit(1);
}

$events = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Failed to parse response.\n";
    exit(1);
}

foreach ($events as $event) {
    $type = $event['type'];
    $repo = $event['repo']['name'];

    switch ($type) {
        case 'PushEvent':
            $count = count($event['payload']['commits']);
            echo "Pushed $count commit(s) to $repo\n";
            break;

        case 'IssuesEvent':
            $action = $event['payload']['action'];
            echo ucfirst($action) . " an issue in $repo\n";
            break;

        case 'WatchEvent':
            echo "Starred $repo\n";
            break;

        case 'ForkEvent':
            echo "Forked $repo\n";
            break;

        default:
            echo "$type in $repo\n";
            break;
    }
}
