<?php

namespace Sql\Order;

class Desc extends AbstractOrder {
    
    public function getOrder() {
        return " ORDER BY {$this->fields} DESC";
    }

}
