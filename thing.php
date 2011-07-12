<?php
ini_set('display_errors', 'On');
//sets mongo db connection
$username = 'kwilliams';
$password = 'mongo1234';
$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));

//sets the db and collection for the collection object, to change the db, just change the name, you don't need to create one and the same is for the collection.  Thing of the collection as a table

$db = $connection->recipe;
$collection = $db->thing3;

//instantiates a new thing object

$thing = new thing;

$thing->setNameValue("lego block2");
$thing->setNameTag("h1");
$thing->setNameAttributes("some");

$thing->setUrlValue("http://www.lego.com");
$thing->setUrlTag('a');
$thing->setUrlAttributes('link');

$thing->setImageValue('http://www.mmocrunch.com/wp-content/uploads/2008/01/lego.jpg');
$thing->setImageTag('img');
$thing->setImageAttributes('picture');

$thing->setDescriptionValue('This is a small red lego block');
$thing->setDescriptionTag('span');
$thing->setDescriptionAttributes('text');
//passes in the collection object and calls the save method

$thing->save_object($collection);

//EXAMPLE: finds all the records in the db and collection that the collection object is associated with

$cursor = $collection->find();

//EXAMPLE: finds one record based on the mongoid
//$cursor = $collection->findOne(array('_id' => new MongoId('4e1bca471ce31e4056000000')));
//finds records based on criteria and in this example we are getting all records that match the value of the name element of the thing object with 'lego block2' sometimes you need to use the period and sometimes you nest arrays depending on the complexity of your object.

//$cursor = $collection->find(array('name.value' =>'lego block2'));


//asssigns a starting value to identify records
$i = 0;



//itterates through the object
foreach($cursor as $key => $value) {

	$o[$key] = (object) $value;
	$i = $i + 1;
}

//outputs the object
print_r($o);


//$print = var_dump(get_object_vars($thing));

//print_r($print);


class thing {

	private $name;
	private $url;
	private $image;
	private $description;
	private $itemscope = 'http://www.schema.org/Thing';
	
	//saves thing	
	function save_object($collection) {

		$obj = $this->prepare_array();
      	$collection->insert($obj);
	}
	//gets a thing array to pass to mongo, it will error if you just pass in a $this because it can't access the private variables;
	function prepare_array() {
		
		$obj['name'] = $this->name->value;
		$obj['url'] = $this->url->value;
		$obj['image'] = $this->image->value;
		$obj['description'] = $this->description->value;
	/*	
		foreach($this as $key => $value) {
		
			$obj[$key] = $value;
		
		}
	*/
      	return $obj;
	}	
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
	
		$this->name->tag->tagtype = $var;
		
	}

	function getNameTag() {
	
		return $this->name->tag->tagtype ;
		
	}
	function setNameAttributes($var) {
	    
	    $class = get_class($this) . ' name ' . $var;
		$this->name->tag->attributes['class'] = $class;
		$this->name->tag->attributes['itemprop'] = 'name';
		
	}

	function getNameAttributes() {
	
		return $this->name->tag->attributes;
		
	}

	function setUrlValue($var) {
	
		$this->url->value = $var;
		
	}

	function getUrlValue($var) {
	
		return $this->url->value;
		
	}
	
	function setUrlTag($var) {
	
		$this->url->tag->tagtype  = $var;
		
	}

	function getUrlTag() {
	
		return $this->url->tag->tagtype;
		
	}
	function setUrlAttributes($var) {
	    
	    $class = get_class($this) . ' url ' . $var;
		$this->url->tag->attributes['class'] = $class;
		$this->url->tag->attributes['itemprop'] = 'url';
		
	}

	function getUrlAttributes() {
	
		return $this->url->tag->attributes;
		
	}
	function setImageValue($var) {
	
		$this->image->value = $var;
		
	}

	function getImageValue($var) {
	
		return $this->image->value;
		
	}
	
	function setImageTag($var) {
	
		$this->image->tag->tagtype  = $var;
		
	}

	function getImageTag() {
	
		return $this->image->tag->tagtype;
		
	}
	function setImageAttributes($var) {
	    
	    $class = get_class($this) . ' image ' . $var;
		$this->image->tag->attributes['class'] = $class;
		$this->image->tag->attributes['itemprop'] = 'image';
		
	}

	function getImageAttributes() {
	
		return $this->image->tag->attributes;
		
	}
	function setDescriptionValue($var) {
	
		$this->description->value = $var;
		
	}

	function getDescriptionValue($var) {
	
		return $this->description->value;
		
	}
	function getDescriptionFormFieldType() {
	
		return $this->description->form->fieldtype;
		
	}
	function setDescriptionFormFieldType($var) {
	
		$this->description->form->fieldtype = $var;
		
	}
	function getImageFormFieldType() {
	
		return $this->image->form->fieldtype;
		
	}
	function setImageFormFieldType($var) {
	
		$this->image->form->fieldtype = $var;
		
	}
	function getUrlFormFieldType() {
	
		return $this->url->form->fieldtype;
		
	}
	function setUrlFormFieldType($var) {
	
		$this->url->form->fieldtype = $var;
		
	}
	function getNameFormFieldType() {
	
		return $this->name->form->fieldtype;
		
	}

	function setNameFormFieldType($var) {
	
		$this->name->form->fieldtype = $var;
		
	}
	function setDescriptionTag($var) {
	
		$this->description->tag->tagtype = $var;
		
	}

	function getDescriptionTag() {
	
		return $this->description->tag;
		
	}
	function setDescriptionAttributes($var) {
	    
	    $class = get_class($this) . ' description ' . $var;
		$this->description->tag->attributes['class'] = $class;
		$this->description->tag->attributes['itemprop'] = 'description';
		
	}

	function getDescriptionAttributes() {
	
		return $this->image->attributes;
		
	}
	
	function __construct() {
	
		$this->description->tag->tagtype = 'span';
		$this->image->tag->tagtype = 'img';
		$this->url->tag->tagtype = 'a';
		$this->name->tag->tagtype = 'span';
		$this->description->form->fieldtype = 'text';
		$this->image->form->fieldtype = 'text';
		$this->url->form->fieldtype = 'text';
		$this->name->form->fieldtype = 'text';
	
	}

}
?>