<?php

$defaultFlow = [
    'created' => [
        'sequence' => 0,
        'color' => 'green',
        'events' => [
            [
                'status' => 'Order dispatched',
                'details' => 'Order has been dispatched to driver',
                'code' => 'dispatched',
            ],
        ]
    ],
    'dispatched' => [
        'sequence' => 0,
        'color' => 'green',
        'events' => [
            [
                'status' => 'Driver acknowledged',
                'details' => 'Driver acknowledged the order',
                'code' => 'driver_ack',
            ],
        ]
    ],
    'driver_ack' => [
        'sequence' => 0,
        'color' => 'green',
        'events' => [
            [
                'status' => 'Driver pickedup',
                'details' => 'Driver picked up the order',
                'code' => 'driver_pickedup',
            ],
        ]
    ],
    'driver_pickedup' => [
        'sequence' => 0,
        'color' => 'green',
        'events' => [
            [
                'status' => 'Driver en-route',
                'details' => 'Driver en-route to location',
                'code' => 'driver_enroute',
            ],
        ]
    ],
    'driver_enroute' => [
        'sequence' => 0,
        'color' => 'green',
        'events' => [
            [
                'status' => 'Order completed',
                'details' => 'Driver has completed order',
                'code' => 'completed',
            ],
        ]
    ],
    // waypoint drop order statuses
    'waypoint|dispatched' => [

        'sequence' => 0,
        'color' => 'green',
        'events' => [
            [
                'status' => 'Driver en-route to {waypoint.ordinalIndex} waypoint',
                'details' => 'Driver en-route to {waypoint.address}',
                'code' => 'driver_enroute',
            ],
        ]
    ],
    'waypoint|driver_enroute' => [
        'sequence' => 0,
        'color' => 'green',
        'events' => [
            [
                'status' => 'Order delivered for {waypoint.ordinalIndex} waypoint',
                'details' => 'Driver has completed delivery to {waypoint.address}',
                'code' => 'completed',
            ],
        ]
    ]
];

return [
    /*
    |--------------------------------------------------------------------------
    | API Events
    |--------------------------------------------------------------------------
    */

    'events' => [
        // order events
        'order.created',
        'order.updated',
        'order.deleted',
        'order.dispatched',
        'order.dispatch_failed',
        'order.completed',
        'order.failed',
        'order.driver_assigned',
        'order.completed',

        // payload events
        'payload.created',
        'payload.updated',
        'payload.deleted',

        // entity events
        'entity.created',
        'entity.updated',
        'entity.deleted',
        'entity.driver_assigned',

        // driver events
        'driver.created',
        'driver.updated',
        'driver.deleted',
        'driver.assigned',
        // 'driver.entered_zone',
        // 'driver.exited_zone',

        // fleet events
        'fleet.created',
        'fleet.updated',
        'fleet.deleted',

        // purchase_rate events
        'purchase_rate.created',
        'purchase_rate.updated',
        'purchase_rate.deleted',

        // contact events
        'contact.created',
        'contact.updated',
        'contact.deleted',

        // place events
        'place.created',
        'place.updated',
        'place.deleted',

        // service_area events
        'service_area.created',
        'service_area.updated',
        'service_area.deleted',

        // service_quote events
        'service_quote.created',
        'service_quote.updated',
        'service_quote.deleted',

        // service_rate events
        'service_rate.created',
        'service_rate.updated',
        'service_rate.deleted',

        // tracking_number events
        'tracking_number.created',
        'tracking_number.updated',
        'tracking_number.deleted',

        // tracking_status events
        'tracking_status.created',
        'tracking_status.updated',
        'tracking_status.deleted',

        // vehicle events
        'vehicle.created',
        'vehicle.updated',
        'vehicle.deleted',

        // vendor events
        'vendor.created',
        'vendor.updated',
        'vendor.deleted',

        // zone events
        'zone.created',
        'zone.updated',
        'zone.deleted',
    ],

    /*
    |--------------------------------------------------------------------------
    | API Resource Types
    |--------------------------------------------------------------------------
    */

    'types' => [
        'contact' => [
            [
                'name' => 'Customer',
                'key' => 'customer',
            ],
            [
                'name' => 'Contractor',
                'key' => 'contractor',
            ],
        ],

        'order' => [
            [
                'name' => 'Food Delivery',
                'description' => 'Operational flow for food delivery.',
                'key' => 'food',
                'meta_type' => 'order_config',
                'meta' => [
                    'flow' => $defaultFlow,
                ],
            ],
            [
                'name' => 'Ecommerce',
                'description' => 'Operational flow for ondemand ecommerce.',
                'key' => 'ecommerce',
                'meta_type' => 'order_config',
                'meta' => [
                    'fields' => [
                        [
                            'key' => 'customername', 
                            'label' => 'CustomerName', 
                            'type' => 'text' 
                        ], 
                        [
                            'key' => 'cash', 
                            'label' => 'Cash', 
                            'type' => 'text' 
                            ], 
                        [
                            'key' => 'additionaldetail', 
                            'label' => 'AdditionalDetail', 
                            'type' => 'text' 
                        ],
                        [
                            'key' => 'customerPhone',
                            'label' => 'Customer Phone',
                            'type' => 'text'
                        ],
                        [
                            'key' => 'extra',
                            'label' => 'Extra Detail',
                            'type' => 'text'
                        ],
                        [
                            'key' => 'storeName',
                            'label' => 'Store Name',
                            'type' => 'text'
                        ],
                        [
                            'key' => 'storePhone',
                            'label' => 'Store Phone',
                            'type' => 'text'
                        ],
                        [
                            'key' => 'location',
                            'label' => 'location',
                            'type' => 'text'
                        ],
                        [
                            'key' => 'katchOrderId',
                            'label' => 'Katch Order Id',
                            'type' => 'text'
                        ],
                        [
                            'key' => 'orderNumber',
                            'label' => 'Order Number',
                            'type' => 'text'
                        ]
    
                    ],
                    'flow' => $defaultFlow,
                ],
            ]
        ],

        'entity' => [
            [
                'name' => 'Parcel',
                'key' => 'parcel',
                'fields' => [''],
            ],
            [
                'name' => 'Passenger',
                'key' => 'passenger',
                'fields' => [],
            ],
            [
                'name' => 'Task',
                'key' => 'task',
                'fields' => [],
            ],
            [
                'name' => 'Food',
                'key' => 'food',
                'fields' => [],
            ],
            [
                'name' => 'Product',
                'key' => 'product',
                'fields' => [],
            ],
            [
                'name' => 'Haulage',
                'key' => 'haul',
                'fields' => [],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Proof of Delivery Methods
    |--------------------------------------------------------------------------
    */

    'pod_methods' => 'scan,signature',

    /*
    |--------------------------------------------------------------------------
    | API/Webhook Versions
    |--------------------------------------------------------------------------
    */

    'versions' => ['2020-09-30'],
    'version' => '2020-09-30', // current version
];
