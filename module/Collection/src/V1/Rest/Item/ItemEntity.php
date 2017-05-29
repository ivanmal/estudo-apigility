<?php

namespace Collection\V1\Rest\Item;

class ItemEntity {

    public $id;
    public $name;
    public $quantity;

    public function getArrayCopy() {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
        );
    }

    public function exchangeArray(array $array) {
        $this->id = $array['id'];
        $this->name = $array['name'];
        $this->quantity = $array['quantity'];
    }

}
