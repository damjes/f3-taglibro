<?php

class Afisho extends DB\SQL\Mapper {
	static function montru($f3, $parametroj) {
		$kia = $parametroj['id'];
		$afisho = new Afisho();
		$afisho->load(array('id=?', intval($kia)));
		$afisho->rekreuMD();
		$afisho->copyTo('afisho');
		$f3->set('titolo', $afisho->titolo.' – '.$f3->get('aspekto.retejnomo'));
		$f3->set('tipo', 'unu_afisho');
		echo Template::instance()->render('vidigilo/malfona.html');
	}

	static function montruChiujEl($f3, $el) {
		$afishoj = new Afisho();
		$afishoj->load(
			array(
				'limit' => $f3->get('aspekto.afishoj_per_pagho'),
				'offset' => $el * $f3->get('aspekto.afishoj_per_pagho')
			), $f3->get('aspekto.afishoj_per_pagho')
		);
	}

	function __construct() {
		$db = Datumbazo::donu();
		parent::__construct($db, 'afishoj');
	}

	function puriguMD() {
		$this->markdown = '';
		$this->save();
	}

	function rekreuMD() {
		if ($this->markdown == '') {
			$this->markdown = Markdown::instance()->convert($this->enhavo);
			$this->save();
		}
	}
}