<?php

namespace Sql\Order;

abstract class AbstractOrder implements OrderInterface{
    
    protected $fields;
    
    public function __construct(array $fields) {
        $this->fields = implode(', ',$fields);
    }
}
