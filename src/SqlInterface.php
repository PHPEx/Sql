<?php

namespace Sql;

interface SqlInterface {
    
    public function setOptions(array $data = null, $index = null);
    
    public function setTable($table, array $fields = array('*'));
      
    public function getQuery();
}
