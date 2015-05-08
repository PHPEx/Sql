<?php

namespace Sql\Select\Parameters;

use Sql\Select\Parameters\ParametersInterface;
use Sql\Select\Parameters\Field;
use Sql\Select\Parameters\Value;

class Like implements ParametersInterface{
    
    private $field, $value, $first, $last;
    
    public function __construct(Field $field, Value $value, $first = false, $last = false) {
        $this->field = $field;
        $this->value = $value;
        $this->first = $first;
        $this->last = $last;        
    }

    public function interpret() {
        $sql = " {$this->field->interpret()} LIKE '";
        if($this->first){
            $sql .= "%";
        }
        $sql .= "{$this->value->interpret()}";
        if($this->last){
            $sql .= "%";
        }
        $sql .="'";
        return $sql;
        
    }

}
