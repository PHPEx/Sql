<?php

namespace Sql\Select;

use Sql\Select\Parameters\ParametersInterface; 
use Sql\AbstractSql;

final class Object extends AbstractSQL implements ParametersInterface{

    protected function _setData($fields, $values, $index = null) {
        
    }

    public function where(ParametersInterface $parameters) {
        if ($this->getQuery() == null) {
            $this->_sql = "SELECT {$this->_fieldsTable} FROM {$this->_getTable()} WHERE ({$parameters->interpret()})";
        } else {
            $this->_sql .= $field;
        }
        return $this;
    }

    public function interpret() {
        return $this->getQuery();
    }

}
