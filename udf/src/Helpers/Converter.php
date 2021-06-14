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
		
		'border' => [
            'borderNone' => 'border-none',
		    'borderCell' => 'border-solid',
            'borderTable' => 'border-none',
        ],
		
		
		'ListLevel' => [
           '1' => 'ellipse',
		   '2' => 'rectangle',
		   '3' => 'initial',
		   '4' => 'ellipse',
		   '5' => 'rectangle',
		   '6' => 'initial',
		   '7' => 'ellipse',
		   '8' => 'rectangle',
        ],
		
		'BulletType' => [
           'BULLET_TYPE_ELLIPSE' => 'ellipse',
		   'BULLET_TYPE_RECTANGLE' => 'rectangle',
		   'BULLET_TYPE_ARROW' => 'arrow',
		   'BULLET_TYPE_DIAMOND' => 'diamond',
		   'BULLET_TYPE_TRIANGLE' => 'triangle',
		   'BULLET_TYPE_RECTANGLE_D' => 'rectangle_d',
        ],
		
		'SecListTypeLevel1' => [
           'NUMBER_TYPE_NUMBER_DOT' => 'number_dot',
		   'NUMBER_TYPE_NUMBER_TRE' => 'number_tre',
		   'NUMBER_TYPE_NUMBER_PARANTHESE' => 'number_paranthese',
		   'NUMBER_TYPE_ROMAN_BIG_DOT' => 'roman_dot',
		   'NUMBER_TYPE_CHAR_BIG_DOT' => 'char_big_dot',
		   'NUMBER_TYPE_CHAR_SMALL_PARANTHESE' => 'char_small_paranthese',
		   'NUMBER_TYPE_CHAR_SMALL_DOT' => 'char_small_dot',
		   'NUMBER_TYPE_ROMAN_SMALL_DOT' => 'roman_small_dot',
           'BULLET_TYPE_ELLIPSE' => 'ellipse',
		   'BULLET_TYPE_RECTANGLE' => 'rectangle',
		   'BULLET_TYPE_ARROW' => 'arrow',
		   'BULLET_TYPE_DIAMOND' => 'diamond',
		   'BULLET_TYPE_TRIANGLE' => 'triangle',
		   'BULLET_TYPE_RECTANGLE_D' => 'rectangle_d',
        ],
		
		
		
		
		
		
		

        'Alignment' => [
            '0' => 'tal',
            '1' => 'tac',
            '2' => 'tar',
            '3' => 'taj',
        ]

    ];

}
