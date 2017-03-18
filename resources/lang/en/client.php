<?php

return [
    'client' => [
        'messages'   => [
            'http_ok'                    => 'Ok',
            'http_not_found'             => 'Not found',
            'http_created'               => 'Object successfully created',
            'http_patched'               => 'Object successfully updated',
            'http_destroyed'             => 'Object successfully deleted',
            'http_internal_server_error' => 'Internal server error',
            'http_unprocessable_entity'  => 'Model validation error occurred',
            'http_forbidden'             => 'Access denied',
            'http_destroy_error'         => 'Can not delete entity',
        ],
        'validation' => [
            'objectItem' => [
                'name' => [
                    'required' => 'Please provide a name for your object',
                    'min'      => 'The name length can not be less than 5 characters long',
                    'max'      => 'The name length can not exceed the 50 characters long',
                ],
                'description' => [
                    'required' => 'Please provide a description for your object',
                    'min'      => 'The description length can not be less than 5 characters long',
                    'max'      => 'The description length can not exceed the 500 characters long',
                ],
                'type' => [
                    'required' => 'Please provide a type for your object',
                    'min'      => 'The object type length can not be less than 2 characters long',
                    'max'      => 'The object type length can not exceed the 15 characters long',
                ],
            ],
        ],
    ],
];
