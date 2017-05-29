<?php
namespace Collection\V1\Rest\Item;

class ItemResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Collection\V1\Rest\Item\ItemMapper');
        return new ItemResource($mapper);
    }
}
