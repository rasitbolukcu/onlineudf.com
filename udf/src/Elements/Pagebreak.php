<?php

namespace UDF\Elements;

class Pagebreak extends Element{
    public $tag = "span";

    public function __construct($udf, $xmlObject, $parent = null){
        parent::__construct($udf, $xmlObject, $parent);
        $this->cssClasses[] = "pb";
    }
}
