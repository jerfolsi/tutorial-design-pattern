<?php

//------------------------------------------------------
//D(IP) : Dependency Inversion Principle
//------------------------------------------------------
//High-level modules should not depend on low-level modules
//Both should depend on abstractions.
//Abstractions should not depend on details.
//Details should depend on abstractions.

echo "<h1>Dependency Inversion Principle</h1>";

class Animal
{
	private $name;
	private $age;
	private $displayInterface;

	public function __construct($displayInterface, $name, $age)
	{
		$this->displayInterface = $displayInterface;
		$this->name = $name;
		$this->age = $age;
	}

	public function display()
	{
		$this->displayInterface->display($this->name . " / age : " . $this->age);
	}
}

//------------------------------------------------------
// We create an Interface to handle the drawing system
// In the future the display System might change or evolve
// If it happens thanks to the $displayInterface used by our high level class (Animal)
// We wont have to change it. We will only have to create a new DisplayClass implementing
//------------------------------------------------------

interface DisplayInterface
{
	public function display($data);
}

class HtmlDisplaySystem implements DisplayInterface
{
	public function display($data)
	{
		echo "<BR/>html display -->>" . $data . "";
	}
}

//------------------------------------------------------
// We create a new Class implementing DisplayInterface
// to handle our needs to make the display system evolve
// we don't have to modifiy our high level classes (animal)
//------------------------------------------------------
class FutureDisplaySystem implements DisplayInterface
{
	public function display($data)
	{
		echo "<BR/>futur display system even better ->>"
			 . "<span style='color:red'>"
			 . $data . "</span>";
	}
}


//--- at the beginning of the project we use a htmlDisplaySystem
$htmlDisplaySystem = new HtmlDisplaySystem();
$dog = new Animal($htmlDisplaySystem, "Dog", 10);
$dog->display();


//--- a few years later, we decide to change the Display System
//--- tadada!! : we don't have to modify our high level class :)
//--- it's wonderful!
$futureDisplaySystem = new FutureDisplaySystem();
$dog2 = new Animal($futureDisplaySystem, "Dog", 10);
$dog2->display();
