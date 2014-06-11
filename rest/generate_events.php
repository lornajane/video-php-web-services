<?php

$events = [
    array("name" => "Excellent PHP Conference",
        "location" => "Amsterdam",
        "description" => "Great technology and interesting people in a beautiful city"
    ),
    array("name" => "Magical Mysql Meetup",
        "location" => "San Francisco",
        "description" => "Databases and inspiration in equal measure"
    ),
    array("name" => "Super Wordpress Event",
        "location" => "Manchester",
        "description" => "Best blogging platform in the world ever - and rain"
    )];

file_put_contents('events.txt', serialize($events));
