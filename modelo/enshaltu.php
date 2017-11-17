<?php

$servilo = $f3->get('datumbazo.servilo');
$uzanto = $f3->get('datumbazo.uzanto');
$pasvorto = $f3->get('datumbazo.pasvorto');
$datumbazo = $f3->get('datumbazo.datumbazo');
$pordo = $f3->get('datumbazo.pordo');

$fonto = 'mysql:host='.$servilo.';port='.$pordo.';dbname='.$datumbazo;

if($pasvorto == '') {
	$db=new DB\SQL($fonto, $uzanto);
} else {
	$db=new DB\SQL($fonto, $uzanto, $pasvorto);
}

$f3->set('db', $db);