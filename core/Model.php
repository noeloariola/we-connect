<?php

spl_autoload_register(function($classname) {
    include $_SERVER['DOCUMENT_ROOT'].'\\we-connect\\app\Model\\'.$classname.'.php';
});

class Model {
    
}