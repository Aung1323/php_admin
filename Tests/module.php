<?php

include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Faker\Factory as Faker;

$faker = Faker::create();
echo $faker->emoji;
echo "<br>";

Auth::check();
HTTP::redirect($path);

$mysql = new MySQL;
$mysql->connect();

$table = new UsersTable;
$table->insert();
