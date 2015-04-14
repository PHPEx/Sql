<?php

namespace Sql;

use Sql\Condition\OperatorInterface;

final class Select extends AbstractSQL {

    protected function _setData($fields, $values, $index = null) {
        
    }

    public function where($field) {
        if ($this->getQuery() == null) {
            $this->_sql = "SELECT {$this->_fieldsTable} FROM {$this->_getTable()} WHERE {$field}";
        } else {
            $this->_sql .= $field;
        }
        return $this;
    }

    public function equals($value) {
        $this->_sql .= ' = ' . $this->_setFilter($value);
        return $this;
    }

    public function addCondition(OperatorInterface $operator){
        $this->_sql .= " {$operator->getCondition()} "; 
        return $this;
    }
    
    public function like($term, $first = false, $last = false){
        if($first){
            $this->_sql .= '%';
        }
        $this->_sql .= $term;        
        if($last){
            $this->_sql .= '%';
        }
        return $this;
    }

}
