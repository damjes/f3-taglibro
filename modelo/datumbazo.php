<?php

class Datumbazo extends DB\SQL {
	private static $konekto = null;
	
	function __construct() {
		$f3 = Base::instance();
		
		$servilo = $f3->get('datumbazo.servilo');
		$uzanto = $f3->get('datumbazo.uzanto');
		$pasvorto = $f3->get('datumbazo.pasvorto');
		$datumbazo = $f3->get('datumbazo.datumbazo');
		$pordo = $f3->get('datumbazo.pordo');
		
		$fonto = 'mysql:host='.$servilo.';port='.$pordo.';dbname='.$datumbazo;
		
		if($pasvorto == '') {
			parent::__construct($fonto, $uzanto);
		} else {
			parent::__construct($fonto, $uzanto, $pasvorto);
		}
	}
	
	static function donu() {
		if($konekto == null) {
			$konekto = new Datumbazo();
		}
		
		return $konekto;
	}
}