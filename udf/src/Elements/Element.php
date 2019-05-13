<?php

namespace UDF\Elements;

use UDF\Helpers\Converter;
use DOMDocument;
use DOMElement;

class Element{
    public $udf;
    
    public $xml;

    public $attributes = [];

    public $cssClasses = [];

    public $children = [];

    public $parent = null;

    public $tag;

    public $text = null;

    public function __construct($udf, $xmlObject, $parent = null){
        $this->udf = $udf;
        $this->xml = $xmlObject;
        $this->parent = $parent;

        $this->getAttributes();
        $this->getClasses();
        $this->getChildren();
        $this->modifyAttributes();
    }

    public function modifyAttributes(){}
    

    public function getAttributes(){
        foreach($this->xml->attributes() as $key => $value){
            $this->attributes[$key] = (string)$value;
        }
    }

    public function getClasses(){
        $c = new Converter();
        foreach($this->attributes as $key => $value){
            if(isset($c->attributes[$key])){
                $this->cssClasses[$key] = $c->attributes[$key][$value];
                unset($this->attributes[$key]);
            }
        }
    }

    public function getChildren(){
        foreach($this->xml->children() as $tag => $value){
            $className = 'UDF\Elements\\' . ucfirst(mb_ereg_replace("-", "", $tag));
            $child = new $className($this->udf, $value, $this);
            $this->children[] = $child;
        }
    }

    public function getDOMElement(){
        $element = $this->udf->doc->createElement($this->tag); 

        if(count($this->cssClasses)){
            $class = implode(" ", $this->cssClasses);
            $element->setAttribute("class", $class);
        }

        if(count($this->attributes)){
            foreach($this->attributes as $key => $value){
                $element->setAttribute($key, $value);
            }
        }

        foreach($this->children as $child){
            $element->appendChild($child->getDOMElement());
        }

        if($this->text){
            $element->appendChild($this->udf->doc->createTextNode($this->text));
        }

        return $element;
    }

    public function toHtml(){
        $this->udf->doc->appendChild($this->getDOMElement());

        return $this->udf->doc->saveHTML();
    }
}
