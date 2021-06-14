<?php

namespace UDF\Elements;

class Footer extends Element{
    public $tag = "footer";

    public function modifyAttributes()
    {
        if(array_key_exists('size', $this->attributes)){
            $this->styles['font-size'] = $this->attributes['size'] . 'pt';
            //unset($this->attributes['font-size']);
        }
    }
}
