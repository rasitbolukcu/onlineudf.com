<?php
namespace UDF\Elements;

class Content extends Element{
    public $tag = "span";
    public $start;
    public $length;

    public function __construct($udf, $xmlObject, $parent = null){
        parent::__construct($udf, $xmlObject, $parent);

        $this->start = (int)$this->xml['startOffset'];
        $this->length = (int)$this->xml['length'];

        $this->text = mb_substr($udf->content, $this->start, $this->length);

        if(strstr($this->text,"\t")){
            //$tabStop = new TabStop($this->udf, null, $this, 50);
            //$this->children[] = $tabStop;
            $this->text = str_replace("\t", "\xc2\xa0\xc2\xa0\xc2\xa0\xc2\xa0\xc2\xa0\xc2\xa0\xc2\xa0\xc2\xa0", $this->text);
        }
        $this->text = preg_replace('~(?<=\s)\s~', "\xc2\xa0", $this->text);

		if(ord($this->text) == 10){
		    $this->tag = "br";
        }
        unset($this->attributes["startOffset"]);
        unset($this->attributes["length"]);
    }

    public function modifyAttributes(){
        if(array_key_exists('urlLinkData', $this->attributes)){
            $this->tag = "a";
            $this->attributes['href'] = $this->attributes['urlLinkData'];
            unset($this->attributes['urlLinkData']);
        }

        if(array_key_exists('superscript', $this->attributes) && $this->attributes['superscript'] == "true"){
            $this->tag = "sup";
            unset($this->attributes['superscript']);
        }

        if(array_key_exists('subscript', $this->attributes) && $this->attributes['subscript'] == "true"){
            $this->tag = "sub";
            unset($this->attributes['subscript']);
        }
    }
}
