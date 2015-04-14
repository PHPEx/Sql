<?php
namespace Sql\Condition;

final class AndCondition implements OperatorInterface{
    public function getCondition() {
        return 'AND';
    }
}
