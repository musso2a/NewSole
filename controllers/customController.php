<?php

require 'models/Sole.php';
require 'models/Shoe.php';

$soles = getAllSoles();
$shoes = getAllShoes();

include 'views/custom.php';