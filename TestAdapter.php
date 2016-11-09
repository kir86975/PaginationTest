<?php
/**
 * Created by PhpStorm.
 * User: prg
 * Date: 09.11.2016
 * Time: 16:33
 */

namespace Test\Adapter;
require_once "vendor/zendframework/zend-paginator/src/Adapter/AdapterInterface.php";

use Zend\Paginator\Adapter\AdapterInterface;


class TestAdapter implements AdapterInterface
{
    private $values = array();

    public function __construct()
    {
        for ($i = 0; $i < 100; $i++) {
           $this->values[] = $i;
        }
    }

    /**
 * Returns a collection of items for a page.
 *
 * @param  int $offset Page offset
 * @param  int $itemCountPerPage Number of items per page
 * @return array
 */
    public function getItems($offset, $itemCountPerPage)
    {
//        return array(0=>$offset, 1=>$itemCountPerPage);
        return array_slice($this->values, $offset, $itemCountPerPage);
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->values);
    }
}