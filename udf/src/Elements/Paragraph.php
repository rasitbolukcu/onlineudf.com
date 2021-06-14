<?php

namespace UDF\Elements;

class Paragraph extends Element{
	
    public $tag = "p";

    public $childrenTags = ['content'];

    public function modifyAttributes()
    {
        if(array_key_exists('FirstLineIndent', $this->attributes)){
            $this->styles['text-indent'] = $this->attributes['FirstLineIndent'] . 'pt';
            unset($this->attributes['FirstLineIndent']);
        }

        if(array_key_exists('Hanging', $this->attributes)){
            $this->styles['padding-left'] = $this->attributes['Hanging'] . 'pt';
            unset($this->attributes['Hanging']);
        }

        if(array_key_exists('size', $this->attributes)){
            $this->styles['font-size'] = $this->attributes['size'] . 'pt';
            unset($this->attributes['size']);
        }

        if(array_key_exists('LeftIndent', $this->attributes)){
            $this->styles['margin-left'] = $this->attributes['LeftIndent'] . 'pt';
            unset($this->attributes['LeftIndent']);
        }
    }

}
