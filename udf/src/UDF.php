<?php

namespace UDF;
use DOMDocument;

class UDF{
    protected $path;
    protected $tempFolder;

    public $content;

    public $properties;

    public $elements;

    public $styles;

    public $doc;

    public function __construct($path, $tempFolder = "files/temp"){
        $this->path = $path;
        UDFZipper::unzip($this->path, $tempFolder); 
        $xml = simplexml_load_file($tempFolder.'/content.xml');
        $this->content = $xml->content;
        $this->properties = $xml->properties;
        $this->elements = $xml->elements;
        $this->styles = $xml->styles;
        unlink($tempFolder.'/content.xml');
        $this->doc = new DOMDocument();
    }

    public function toHtml(){
        foreach($this->elements->children() as $tag => $element){
            $className = 'UDF\Elements\\'.ucfirst(mb_ereg_replace("-", "", $tag));
            $child = new $className($this, $element);
            $this->doc->appendChild($child->getDOMElement());
        }

        return $this->doc->saveHTML();
    }
}
