<?php
namespace Sql\Select\Parameters;

class Field implements ParametersInterface{
   
    private $field;
   
    public function __construct($field) {
      $this->field = $field  ;
    }

    public function interpret() {
        return $this->field;
    }

}
