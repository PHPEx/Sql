<?php

namespace Sql\Select\Parameters;

class Equals implements ParametersInterface{
    
    /**
     *
     * @var Field 
     */
    private $field;
    
    /**
     *
     * @var Value 
     */
    private $value;
    
    /**
     * Add Field and Value
     * @param \Sql\Select\Parameters\Field $field Field of query
     * @param \Sql\Select\Parameters\Value $value Value of field
     */
    public function __construct(Field $field, Value $value) {
        $this->field = $field;                 
        $this->value = $value;                 
    }

    /**
     * 
     * @return string
     */
    public function interpret() {
        return "{$this->field->interpret()} = '{$this->value->interpret()}'";
    }

}
