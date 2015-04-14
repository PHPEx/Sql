<?php
namespace Sql\Condition;

final class AndCondition implements ConditionInterface{
    public function getCondition() {
        return 'AND';
    }
}
