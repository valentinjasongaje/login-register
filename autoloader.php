<?php

spl_autoload_register(function ($class_name) {
    require_once('models/' . $class_name . '.php');
});