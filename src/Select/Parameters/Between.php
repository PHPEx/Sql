<?php

namespace Sql\Select\Parameters;

class Between implements ParametersInterface
{

	private $field, $min, $max;

	public function __conctruct(Field $field, Value $min,Value $max){
		$this->field = $field;
		$this->min = $min;
		$this->max = $max;
	}

	public function interpret(){
		return " {$this->field->interpret()} BETWEEN {$this->min->interpret()} AND {$this->max->interpret()}";
	}
}