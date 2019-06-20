<?php

namespace Hcode;

class PageAdmin extends Page {

    public function __construct($opts = array(), $tpl_dir = "/views/admin/")
    {
        parent::__construct($opts, $tpl_dir);    // nesse ponto digo ao php que ele pegue o processo constructor da classe-mae, mas passa os paramentros dessa classe
    }
}


?>