<?php

class Button {

	private $buttonName;
	private $buttonValue;
	private $buttonStyle;
    private $buttonType;
    private $data;
	
	function __construct() {
		$this->buttonName = "";
		$this->buttonValue = "";
		$this->buttonStyle = "";
	}

    /**
     * The __set() method (Magic Methods) is called whenever you attempt to write to
     * a non-existing or private property of an object.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if(property_exists($this,$name)) {

            $this->$name = $value;

        }else{
            //An associative array s created when a property that has not been declared is set
            $this->data[$name] = $value;

        }
    }

    /**
     * The __get() method (Magic Methods) is called whenever you attempt to read a non-existing
     * or private property of an object.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }else{
            //returns the value of the attribute even though it is private/hidden
            return $this->$name;
        }

    }


	function displayButton() {
		
		echo "<input type='". $this->buttonType . "' value='". $this->buttonValue . "' style='". $this->buttonStyle . "' name='". $this->buttonName. "' />";
	}
}
/*//Create new button object

//Set the values
$b1 = new Button();
$b1->buttonName = "submit";
$b1->buttonValue = "Cancel";

//Uses magic method to set non-existing property (buttonType)
$b1->buttonType = "submit";
$b1->buttonStyle = "font-family:sans-serif";

//Display the button
$b1->displayButton();*/


?>