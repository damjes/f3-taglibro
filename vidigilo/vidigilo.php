<?php

class Vidigilo
{
    public static function malfona($titolo, $tipo)
    {
        $f3->set('titolo', $titolo . ' – ' . $f3->get('aspekto.retejnomo'));
        $f3->set('tipo', $tipo);
        echo Template::instance()->render('vidigilo/malfona.html');
    }
}