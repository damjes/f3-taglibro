<?php

class Vidigilo
{
	public static function malfona($titolo, $tipo)
	{
		$f3 = Base::instance();
		if($titolo != '') {
			$titolo .= ' – ';
		}
		$f3->set('titolo', $titolo.$f3->get('aspekto.retejnomo'));
		$f3->set('tipo', $tipo);
		echo Template::instance()->render('vidigilo/malfona.html');
	}
	
	public static function majstruma($titolo, $tipo)
	{
		$f3->set('titolo', $titolo);
		$f3->set('tipo', $tipo);
		echo Template::instance()->render('vidigilo/majstruma.html');
	}
	
	public static function ensalutu () {
		echo Template::instance()->render('vidigilo/ensalutu.html');
	}
}