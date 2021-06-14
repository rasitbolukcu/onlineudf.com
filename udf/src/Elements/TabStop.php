<?php

namespace UDF\Elements;

class TabStop extends Element{
    public $tag = "span";

    public function __construct($udf, $xmlObject, $parent = null, $width = 10){
        parent::__construct($udf, $xmlObject, $parent);
        $this->styles['width'] = $width . 'px';
        $this->styles['display'] = 'inline-block';
    }

    public function getDOMElement()
    {
        $element = $this->udf->doc->createElement($this->tag);

        if(count($this->styles)){
            $style = "";
            foreach($this->styles as $key => $value){
                $style .= $key . ':' . $value . ';';
            }
            $element->setAttribute("style", $style);
        }

        return $element;
    }
}
