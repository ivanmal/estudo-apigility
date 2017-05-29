<?php
return [
    'service_manager' => [
        'factories' => [
            \Collection\V1\Rest\Item\ItemResource::class => \Collection\V1\Rest\Item\ItemResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'collection.rest.item' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/itens[/:item_id]',
                    'defaults' => [
                        'controller' => 'Collection\\V1\\Rest\\Item\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'collection.rest.item',
        ],
    ],
    'zf-rest' => [
        'Collection\\V1\\Rest\\Item\\Controller' => [
            'listener' => \Collection\V1\Rest\Item\ItemResource::class,
            'route_name' => 'collection.rest.item',
            'route_identifier_name' => 'item_id',
            'collection_name' => 'item',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Collection\V1\Rest\Item\ItemEntity::class,
            'collection_class' => \Collection\V1\Rest\Item\ItemCollection::class,
            'service_name' => 'Item',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Collection\\V1\\Rest\\Item\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Collection\\V1\\Rest\\Item\\Controller' => [
                0 => 'application/vnd.collection.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Collection\\V1\\Rest\\Item\\Controller' => [
                0 => 'application/vnd.collection.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Collection\V1\Rest\Item\ItemEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'collection.rest.item',
                'route_identifier_name' => 'item_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Collection\V1\Rest\Item\ItemCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'collection.rest.item',
                'route_identifier_name' => 'item_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'Collection\\V1\\Rest\\Item\\Controller' => [
            'input_filter' => 'Collection\\V1\\Rest\\Item\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Collection\\V1\\Rest\\Item\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'name',
                'error_message' => 'Limite de 50 caracteres',
                'description' => 'Nome do item',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\NotEmpty::class,
                        'options' => [],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\ToInt::class,
                        'options' => [],
                    ],
                ],
                'name' => 'quantity',
                'description' => 'Quantidade de itens',
                'error_message' => 'Não pode ser vazia',
            ],
        ],
    ],
];
