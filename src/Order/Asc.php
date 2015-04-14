<?php

namespace Sql\Order;

class Asc extends AbstractOrder {

    public function getOrder() {
        return " ORDER BY {$this->fields} ASC";
    }

}
