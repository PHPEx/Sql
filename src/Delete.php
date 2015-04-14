<?php

namespace Sql;

final class Delete extends AbstractSql
{
    /**
     * Obtem os dados para a geracao da SQL.
     * @param Array $fields Campos
     * @param Array $values Valores
     * @param String $index Indice de mudanca
     * @return Sql\Delete 
     */
    protected function _setData( $fields, $values, $index = null )
    {
        unset( $fields );
        unset( $values );
        if ( ! is_null( $index ) )
        {
            $this -> _sql = "DELETE FROM " . $this -> _getTable();
            $this -> _sql .= " WHERE {$index}";
            return $this;
        }
    }
}
