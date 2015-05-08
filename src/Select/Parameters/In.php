<?php

namespace Sql\Select\Parameters;

use Sql\Select\Parameters\ParametersInterface;

class In implements ParametersInterface{
    
    private $in, $field;
    
    public function __construct(Field $field, array $in) {
            $this->in = $in;
            $this->field = $field;
    }

    public function interpret() {        
        $sql = " {$this->field->interpret()} IN ('".implode(',',$this->in)."')";
        return $sql;
    }
}
