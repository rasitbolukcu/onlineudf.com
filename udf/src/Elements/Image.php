<?php

namespace UDF\Elements;

class Image extends Element{
    public $tag = "img";

    public function modifyAttributes(){
        $this->attributes['src'] = "data:image/jpg;base64," . $this->attributes['imageData'];
        unset($this->attributes['imageData']);
    }
}
