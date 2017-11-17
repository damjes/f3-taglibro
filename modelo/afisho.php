<?php

class Afisho extends DB\SQL\Mapper {
	static function montru($f3, $parametroj) {
		$kia = $parametroj['id'];
		$afisho = new Afisho();
		$afisho->load(array('id=?', intval($kia)));
		$afisho->rekreuMD();
		$afisho->copyTo('afisho');
		Vidigilo::malfona($afisho->titolo, 'unu_afisho');
	}

	static function montruChiujEl($f3, $el) {
		$per_pagho = $f3->get('aspekto.afishoj_per_pagho');
		$afishoj = new Afisho();
		$f3->set('afishoj', $afishoj->paginate(
			($el-1)*$per_pagho,
			$per_pagho,
			array('order' => 'titolo DESC')
		));
		Vidigilo::malfona('', 'listo_da_afishoj');
	}
	
	static function unuaPagho($f3) {
		Afisho::montruChiujEl($f3, 1);
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