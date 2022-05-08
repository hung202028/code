<?php

require_once '../autoload.php';

use Builder\MySQLQueryBuilder;

$builder = new MySQLQueryBuilder();
$builder->select('customers', ['id', 'firstname', 'lastname'])
    ->where('customers.age > 18')
    ->where('customers.age < 30')
    ->where(sprintf("customers.email LIKE '%s'", '%test%'))
    ->limit(10, 20);

echo $builder->assemble();
