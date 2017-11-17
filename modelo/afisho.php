<?php

class Afisho
{
    static function montru($f3, $parametroj) {
        $kia = $parametroj['id'];
        $afisho = new Afisho($f3, $kia);
        $afisho->rekreuMD();
        $afisho->sharghuAl('afisho');
        echo \Template::instance()->render('vidigilo/unua.htm');
    }

    static function montruChiujEl($f3, $el) {
        $this->db = self::fonto($f3);
        $this->db->load(array(
            'limit' => $f3->get('aspekto.afishoj_per_pagho'),
            'offset' => $el * $f3->get('aspekto.afishoj_per_pagho')
        ), $f3->get('aspekto.afishoj_per_pagho'));
    }

    static function fonto($f3) {
        return new DB\SQL\Mapper($f3->get('db'), 'afishoj');
    }

    function __construct($f3, $kia) {
        $this->f3 = $f3;
        $this->db = self::fonto($f3);
        $this->db->load(array('id=?', intval($kia)));
    }

    function sharghuAl($kie) {
        $this->db->copyTo($kie);
    }

    function puriguMD() {
        $this->db->markdown = '';
        $this->db->save();
    }

    function rekreuMD() {
        if ($this->db->markdown == '') {
            $this->db->markdown = \Markdown::instance()->convert($this->db->enhavo);
            $this->db->save();
        }
    }
}