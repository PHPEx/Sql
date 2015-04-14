<?php

namespace Sql;

final class Insert extends AbstractSql
{
  protected function _setData( $fields, $values, $index = null )
    {
        unset( $index );
        if(!is_null($fields) && !is_null($values))
        {
            $this -> _sql = "INSERT INTO ";
            $this -> _sql .= $this -> _getTable();
            $this -> _sql .= ' (' . implode( ',', $fields ) . ')';
            $this -> _sql .= ' VALUES ';
            $this -> _sql .= '(' . implode( ',', array_map( array( $this, '_setFilter' ), $values ) ) . ')';
            return $this;
        }
    }
}
