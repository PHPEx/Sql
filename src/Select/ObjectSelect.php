<?php

namespace Sql\Select;

use Sql\Select\Parameters\ParametersInterface; 
use Sql\AbstractSql;

final class ObjectSelect extends AbstractSQL implements ParametersInterface{

    protected function _setData($fields, $values, $index = null) {
        
    }

    public function where(ParametersInterface $parameters = null) {
        if ($this->getQuery() == null) {
            $this->_sql = "SELECT {$this->_fieldsTable} FROM {$this->_getTable()}";
        } else {
            $this->_sql .= " WHERE ({$parameters->interpret()})";
        }
        return $this;
    }

    public function interpret() {
        return $this->getQuery();
    }

}
