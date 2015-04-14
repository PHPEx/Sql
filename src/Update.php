<?php

namespace Sql;

class Update extends AbstractSql
{
     /**
     * Combina os sets do update
     * @var Array
     */
    private $_mixed = array( );

    /**
     * Obtem os dados para a geracao da SQL.
     * @param Array $fields Campos
     * @param Array $values Valores
     * @param String $index Indice de mudanca
     * @return Sql\Update 
     */
    protected function _setData( $fields, $values, $index = null )
    {
        if ( ! is_null( $fields ) && ! is_null( $values ) )
        {
            $this -> _index = $index;
            $this -> _sql = "UPDATE ";
            $this -> _sql .= $this -> _getTable();
            $merge = array_combine( $fields, $values );
            array_walk( $merge, array( $this, '_setMerge' ) );
            $this -> _sql .= ' SET ' . implode( ',', $this -> _mixed );
            $this -> _sql .= ' WHERE ' . $index;
            return $this;
        }
    }

    /**
     * Cria o par SET para o update
     * @param Mixed $key Campo
     * @param Mixed $value Valor
     */
    private function _setMerge( $key, $value )
    {
        $this -> _mixed[ ] = "{$value}={$this -> _setFilter( $key )}";
    }
}