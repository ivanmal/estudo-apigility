<?php

namespace Collection\V1\Rest\Item;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;

class ItemMapper {

    protected $adapter;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
    }

    public function findAll() {
        $select = new Select('item');
        $paginatorAdapter = new DbSelect($select, $this->adapter);
        $collection = new ItemCollection($paginatorAdapter);
        return $collection;
    }

    public function find($id) {
        $sql = 'SELECT * FROM item WHERE id = ?';
        $resultset = $this->adapter->query($sql, array($id));
        $data = $resultset->toArray();
        if (!$data) {
            return false;
        }

        $entity = new ItemEntity();
        $entity->exchangeArray($data[0]);
        return $entity;
    }

}
