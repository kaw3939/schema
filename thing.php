<?php
ini_set('display_errors', 'On');
//sets mongo db connection
$username = 'kwilliams';
$password = 'mongo1234';
$connection = new Mongo("mongodb://${username}:${password}@localhost/test",array("persist" => "x"));

//sets the db and collection for the collection object, to change the db, just change the name, you don't need to create one and the same is for the collection.  Thing of the collection as a table

$db = $connection->recipe;
$collection = $db->thing2;

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

//$cursor = $collection->find();

//EXAMPLE: finds one record based on the mongoid
//$cursor = $collection->findOne(array('_id' => new MongoId('4e1bca471ce31e4056000000')));
//finds records based on criteria and in this example we are getting all records that match the value of the name element of the thing object with 'lego block2' sometimes you need to use the period and sometimes you nest arrays depending on the complexity of your object.

$cursor = $collection->find(array('name.value' =>'lego block2'));


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

		foreach($this as $key => $value) {
		
			$obj[$key] = $value;
		}
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