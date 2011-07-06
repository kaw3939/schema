<?php

$thing = new thing;

$thing->setNameValue('lego block');
$thing->setNameTag('h1');
$thing->setNameAttributes('some');

$thing->setUrlValue('http://www.lego.com');
$thing->setUrlTag('a');
$thing->setUrlAttributes('link');

$thing->setImageValue('http://www.mmocrunch.com/wp-content/uploads/2008/01/lego.jpg');
$thing->setImageTag('img');
$thing->setImageAttributes('picture');

$thing->setDescriptionValue('This is a small red lego block');
$thing->setDescriptionTag('span');
$thing->setDescriptionAttributes('text');

print_r($thing);

class thing {

	private $name;
	private $url;
	private $image;
	private $description;
	private $itemscope = 'http://www.schema.org/Thing';
	
	function getItemScope() {
	
		return $this->itemscope;
	
	}
	
	function setNameValue($var) {
	
		$this->name->value = $var;
		
	}

	function getNameValue($var) {
	
		return $this->name->value;
		
	}
	
	function setNameTag($var) {
	
		$this->name->tag = $var;
		
	}

	function getNameTag() {
	
		return $this->name->tag;
		
	}
	function setNameAttributes($var) {
	    
	    $class = get_class($this) . ' name ' . $var;
		$this->name->attributes['class'] = $class;
		$this->name->attributes['itemprop'] = 'name';
		
	}

	function getNameAttributes() {
	
		return $this->name->attributes;
		
	}

	function setUrlValue($var) {
	
		$this->url->value = $var;
		
	}

	function getUrlValue($var) {
	
		return $this->url->value;
		
	}
	
	function setUrlTag($var) {
	
		$this->url->tag = $var;
		
	}

	function getUrlTag() {
	
		return $this->url->tag;
		
	}
	function setUrlAttributes($var) {
	    
	    $class = get_class($this) . ' url ' . $var;
		$this->url->attributes['class'] = $class;
		$this->url->attributes['itemprop'] = 'url';
		
	}

	function getUrlAttributes() {
	
		return $this->url->attributes;
		
	}
	function setImageValue($var) {
	
		$this->image->value = $var;
		
	}

	function getImageValue($var) {
	
		return $this->image->value;
		
	}
	
	function setImageTag($var) {
	
		$this->image->tag = $var;
		
	}

	function getImageTag() {
	
		return $this->image->tag;
		
	}
	function setImageAttributes($var) {
	    
	    $class = get_class($this) . ' image ' . $var;
		$this->image->attributes['class'] = $class;
		$this->image->attributes['itemprop'] = 'image';
		
	}

	function getImageAttributes() {
	
		return $this->image->attributes;
		
	}
	function setDescriptionValue($var) {
	
		$this->description->value = $var;
		
	}

	function getDescriptionValue($var) {
	
		return $this->description->value;
		
	}
	
	function setDescriptionTag($var) {
	
		$this->description->tag = $var;
		
	}

	function getDescriptionTag() {
	
		return $this->description->tag;
		
	}
	function setDescriptionAttributes($var) {
	    
	    $class = get_class($this) . ' description ' . $var;
		$this->description->attributes['class'] = $class;
		$this->description->attributes['itemprop'] = 'description';
		
	}

	function getDescriptionAttributes() {
	
		return $this->image->attributes;
		
	}

}
/*

class DataType {

	
}

class Boolean extends DataType {


}
*/

?>