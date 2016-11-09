<?php

/**
 * Created by PhpStorm.
 * User: prg
 * Date: 09.11.2016
 * Time: 16:19
 */
namespace Test\TestPagination;

require_once "vendor/zendframework/zend-paginator/src/Paginator.php";


use Zend\Paginator\Paginator;
use Test\Adapter\TestAdapter;

class TestPagination
{
    public static function getPaginator()
    {
        $adapter = new TestAdapter();
        return new Paginator($adapter);
    }

}