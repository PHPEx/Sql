<?php

namespace Sql\Condition;

final class OrCondition implements ConditionInterface{
    public function getCondition() {
        return 'OR';
    }
}
