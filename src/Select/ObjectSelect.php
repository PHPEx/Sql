<?php

namespace Sql\Select;

use Sql\Select\Parameters\ParametersInterface; 
use Sql\AbstractSql;

final class ObjectSelect extends AbstractSql implements ParametersInterface{

    protected function _setData($fields, $values, $index = null) {
        
    }
    
    public function setTable($table, $fields = array()) {
        parent::setTable($table, $fields);
        if ($this->getQuery() == null) {
             $this->_sql = "SELECT {$this->_fieldsTable} FROM {$this->_getTable()}";
        }
        return $this;
    }

    public function where(ParametersInterface $parameters) {       
        $this->_sql .= " WHERE ({$parameters->interpret()})";        
        return $this;
    }

    public function interpret() {
        return $this->getQuery();
    }

}
