<?php

namespace Sql\Select\Parameters;

class Equals implements ParametersInterface{
    
    private $field,$value;
    
    public function __construct(Field $field, Value $value) {
        $this->field = $field;                 
        $this->value = $value;                 
    }

    public function interpret() {
        return "{$this->field->interpret()} = '{$this->value->interpret()}'";
    }

}
