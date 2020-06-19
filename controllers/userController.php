<?php

require('models/User.php');

if ($_GET['action'] == 'new') {
    require('views/registerForm.php');
}