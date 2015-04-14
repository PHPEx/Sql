<?php

namespace Sql\Condition;

final class OrCondition implements OperatorInterface{
    public function getCondition() {
        return 'OR';
    }
}
