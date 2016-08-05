<?php

echo "<h1>Prototype Design Pattern</h1>";

interface Animal
{
	public function makeCopy();
}

class Sheep implements Animal
{
	private $name = "";
	private $weight;

	public function __construct($name)
	{
		echo "<br/>" . "Sheep is made and its name is " . $name;
		$this->name = $name;
		$this->weight = 10;
	}

	//--- function to make a Copy of itself
	public function makeCopy()
	{
		echo "<br/><br/>" . "Sheep is being made";
		$newSheep = new Sheep();
		$newSheep = clone $this;
		return $newSheep;
	}

	public function getName()
	{
		return $this->name;
	}

	public function toString()
	{
		echo "<br/>" . "I'm a Sheep whose name is : " . $this->name . 
			 " and my hash is : " . spl_object_hash($this) . 
			 " and my weight is : " . $this->weight;
	}

	public function setWeight($weight)
	{
		$this->weight = $weight;
	}
	
}

class Dog implements Animal
{

	public function __construct()
	{
		echo "<br/><br/>" . "Dog is made";
	}

	//--- function to make a Copy of itself
	public function makeCopy()
	{
		echo "<br/><br/>" . "Dog is being made";
		$Dog = new Dog();
		$Dog = clone $this;
		return $Dog;
	}
}

class CloneFactory
{
	public function getClone(Animal $animalSample)	
	{
		return $animalSample->makeCopy();
	}
}

$animalMaker = new CloneFactory();

//create a sheep
$sally = new Sheep("Sally");
$sally->toString();

//clone a sheep
$sallyClone = $animalMaker->getClone($sally);
$sallyClone->setWeight(40);
$sallyClone->toString();

//create a dog
$doggy = new Dog();
$doggyClone = $animalMaker->getClone($doggy);

