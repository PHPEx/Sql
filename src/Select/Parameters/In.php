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
        $sql = " {$this->field->interpret()} IN (".implode(',',  array_map(array($this,'_setFilter'), $this->in)).")";
        return $sql;
    }
    
    protected function _setFilter( $element )
    {
        if ( is_string( $element ) )
        {
            return "'{$element}'";
        }
        if ( is_integer( $element ) )
        {
            return (int) $element;
        }
        if ( is_bool( $element ) )
        {
            return (bool) $element;
        }
    }
}
