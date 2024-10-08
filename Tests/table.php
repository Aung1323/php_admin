<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL);
$id = $table->insert([
    "name" => "Peezy",
    "email" => "ngwelawin300398@gmail.com",
    "phone" => "09769444363",
    "address" => "No(16), Ahlone Township",
    "password" => "password",
]);

echo $id;