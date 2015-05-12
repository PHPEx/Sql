<?php

namespace Sql\Select\Parameters;

use Sql\Select\Parameters\ParametersInterface;

class LesserEquals implements ParametersInterface{
    
    private $value, $field;
    
    public function __construct(Field $field, Value $value) {
            $this->value = $value;
            $this->field = $field;
    }

    public function interpret() {        
        $sql = "{$this->field->interpret()} <= {$this->value->interpret()}";
        return $sql;
    }
}
