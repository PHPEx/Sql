<?php

namespace Sql\Select\Parameters\Condition;

use Sql\Select\Parameters\ParametersInterface;

class OrCondition implements ParametersInterface{
    
    private $field,$value;
    
    public function __construct(ParametersInterface $field, ParametersInterface $value) {
        $this->field = $field;                 
        $this->value = $value;                 
    }

    public function interpret() {
        return "{$this->field->interpret()} OR {$this->value->interpret()}";
    }

}
