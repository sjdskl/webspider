<?php
/**
 * Created by PhpStorm.
 * User: kailishen
 * Date: 2018/5/18
 * Time: 下午8:28
 */

namespace sjdskl\Libraries;


class ReturnObject implements \Countable, \IteratorAggregate
{
    protected $_data;

    public function __construct(Array $data)
    {
        $this->_data = $data;
    }

    public function count()
    {
        return count($this->_data);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->_data);
    }

    public function __toString()
    {
        return implode('', $this->_data);
    }
}