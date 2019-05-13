<?php

namespace UDF\Helpers;

class Converter{

    public $attributes = [
        'underline' => [
            'true' => 'underline',
            'false' => 'none',
        ],

        'bold' => [
            'true' => 'bold',
            'false' => 'normal',
        ],


        'italic' => [
            'true' => 'italic',
            'false' => 'normal',
        ],

        'strikethrough' => [
            'true' => 'line-through',
            'false' => 'none',
        ],

        'Alignment' => [
            '0' => 'tal',
            '1' => 'tac',
            '2' => 'tar',
            '3' => 'taj',
        ]

    ];

}
