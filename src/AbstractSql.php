<?php

namespace Sql;

abstract class AbstractSql implements SqlInterface{
     /**
     * Tabela a ser usada.
     * @var String
     */
    protected $_table = null;

    /**
     * SQL gerada.
     * @var String
     */
    protected $_sql = null;

    /**
     * Campos da tabela.
     * @var Array
     */
    protected $_fieldsTable = array( );

    /**
     * Campos.
     * @var Array
     */
    protected $_fields = array( );

    /**
     * Valores
     * @var Array
     */
    protected $_values = array( );

    /**
     * Index
     * @var String
     */
    protected $_index = null;

    /**
     * Indica a tabela a ser usada.
     * @param String $table 
     * @param Array campos da tabela.
     */
    public function setTable( $table, array $fields = array('*') )
    {
        $this -> _table = (string) $table;
        $this -> _fieldsTable = implode(',',$fields);
        return $this;
    }

    /**
     * Retorna a SQL gerada.
     * @return String
     */
    public function getQuery()
    {
        return $this -> _sql;
    }

    abstract protected function _setData( $fields, $values, $index = null );

    /**
     * Retorna a tabela
     * @return String
     */
    protected function _getTable()
    {
        return $this -> _table;
    }

    /**
     * Indica os dados a serem processados.
     * @param array $data Dados para atualiacao, delecao ou selecao.
     * @param String $index Indice a ser atualizado ou deletado.
     * @return Sql\Abstract 
     */
    public function setOptions( array $data = null, $index = null )
    {
        $this -> _fields = !is_null($data) ? array_keys( $data ) : null;
        $this -> _values = !is_null($data) ? array_values( $data ) : null;
        $this -> _setData( $this -> _fields, $this -> _values, $index );
        return $this;
    }

    /**
     * Coloca um filtro nos valores.
     * @param String $element Elemento a ser filtrado
     * @return String
     */
    protected function _setFilter( $element )
    {
        if ( is_string( $element ) )
        {
            return "'{$element}'";
        }
        if ( is_integer( $element ) )
        {
            return (int) $element;
        }
        if ( is_bool( $element ) )
        {
            return (bool) $element;
        }
    }

}
