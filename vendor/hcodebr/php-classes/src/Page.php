<?php

  namespace Hcode;

  use Rain\Tpl;   // nessa linha digo que vou utilizar uma classe de outra namespace

  class Page {

      private $tpl;    // transformando a variavel tpl numa propriedade para poder ser vista pelas outras classes filhas
      private $options = [];
      private $defaults =                    // propriedades defaults do page
          [
             "data"=>[]
          ];

      public function __construct($opts = array(), $tpl_dir = "/views/")
      {

          $this->options = array_merge($this->defaults, $opts);  // o merge mescla dois array, fazendo com que qdo tiverem index iguais fica valendo o do segundo parametro
          $config = array
          (
              "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
              "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
              "debug"         => false // set to false to improve the speed
          );

          Tpl::configure( $config );

          // create the Tpl object
          $this->tpl = new Tpl;

          $this->setData($this->options["data"]);

          $this->tpl->draw("header");
      }

      private function  setData($data = array())
      {
          foreach ($data as $key => $value)
          {
              $this->tpl->assign($key, $value);   // Essa rotina varre uma pagina html a procura de variaveis com o mesmo nome das passadas
          }                                       // nos parametros e substitui pelo conteudo dessas variaveis
      }

      public function setTpl($name, $data = array(), $returnHTML = false)
      {
          $this->setData($data);
          return $this->tpl->draw($name, $returnHTML);
      }

      public function __destruct()
      {
        $this->tpl->draw("footer");
      }
  }
?>