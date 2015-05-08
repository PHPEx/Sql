<?php

namespace Sql\Select;

use Sql\Condition\ConditionInterface;
use Sql\Order\OrderInterface;
use Sql\AbstractSql;

final class Nominal extends AbstractSQL {

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

    public function addCondition(ConditionInterface $operator) {
        $this->_sql .= " {$operator->getCondition()} ";
        return $this;
    }

    public function like($term, $first = false, $last = false) {
        $this->_sql .= " LIKE '";
        if ($first) {
            $this->_sql .= '%';
        }
        $this->_sql .= $term;
        if ($last) {
            $this->_sql .= '%';
        }
        $this->_sql .= "'";
        return $this;
    }
    
    public function between($min, $max){
        $this->_sql .= "BETWEEN '{$min}' AND '{$max}'";
        return $this;
    }
    
    public function in(array $data){
        $this->_sql .= ' IN ('.  implode(',',array_map(array($this,'_setFilter'), $data)).')';
        return $this;
    }
    
    public function lessThan($data){
        $this->_sql .= " < {$this->_setFilter($data)}";
        return $this;
    }
    
    public function biggerThan($data){
        $this->_sql .= " > {$this->_setFilter($data)}";
        return $this;
    }
    
    public function limit($min,$max = null){
        $this->_sql .= ' LIMIT '.$this->_setFilter($min);
        if($max){
            $this->_sql .= ', '.$this->_setFilter($max);
        }
        return $this;
    }
    
    public function addOrder(OrderInterface $order){
        $this->_sql .= $order->getOrder();
        return $this;
    }

}
