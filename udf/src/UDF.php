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
        if(file_exists($tempFolder.'/content.xml')) {
            unlink($tempFolder . '/content.xml');
        }
        if(file_exists(($tempFolder.'/sign.sgn'))) {
            unlink($tempFolder . '/sign.sgn');
        }
        $this->doc = new DOMDocument();
        $this->doc->preserveWhiteSpace = false;
    }

    public function toHtml(){
        $pp = $this->doc->createElement('div');
        $pp->setAttribute("id", "pageProp");
        foreach ($this->properties->pageFormat->attributes() as $key => $value) {
            $pp->setAttribute($key, $value);
        }
        $this->doc->appendChild($pp);

        foreach($this->elements->children() as $tag => $element){
            $className = 'UDF\Elements\\'.ucfirst(mb_ereg_replace("-", "", $tag));
            if(!class_exists($className)){
                $className = 'UDF\Elements\Content';
            }
            $child = new $className($this, $element);
            $this->doc->appendChild($child->getDOMElement());
        }
        
        return $this->doc->saveHTML();
    }
}
