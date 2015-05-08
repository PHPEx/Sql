<?php
namespace Sql\Select\Parameters;

class Value implements ParametersInterface{
   
    private $value;
   
    public function __construct($value) {
      $this->value = $value  ;
    }

    public function interpret() {
        return $this->value;
    }

}
