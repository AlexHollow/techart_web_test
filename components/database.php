<?php

$username = 'root';
$password = 'root';
$database_name = 'news';

$database = new PDO("mysql:host=localhost;dbname={$database_name};port=8889", $username, $password);