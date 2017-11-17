<?php

function dumtempa () {
    echo 'Funkcias!';
}

//enŝaltu na Composer
require 'vendor/autoload.php';

//enŝaltu na F3
$f3 = \Base::instance();

//ŝarĝu uzantajn agordojn
$f3->config('agordoj.ini');

//konektiĝu al datumbazo
require 'modelo/enshaltu.php';

//ŝarĝu vojojn
$f3->config('regilo/vojoj.ini');

//aldonu MVR kodon
$f3->set('AUTOLOAD','modelo/; regilo/; vidigilo/');

//rulu ĉiaĵon!
$f3->run();
