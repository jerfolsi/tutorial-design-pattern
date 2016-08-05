<?php

echo "<h1>Strategy Design Pattern</h1>";

//-------------------------------------------------------------------------
//-------------------------------------------------------------------------
// The FireAbility is delt with an Interface
// Each type of Plane gets an instance of a Classe implementing the Interface
// We create different classes which implement the Interface
// ---> a PropertyItFires class
// ---> a PropertyItCantFire class
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------
interface FireAbility
{
	public function action();
	public function setWeaponPower($power);
}

class PropertyItFires implements FireAbility
{
	private $weaponPower = 0;

	//pour implémenter l'interface FireAbility
	public function action()
	{
		echo "<br/>Fire with a WeaponPower of " . $this->weaponPower;
	}

	public function setWeaponPower($power)
	{
		$this->weaponPower = $power;
	}
}

class PropertyItCantFire implements FireAbility
{
	//pour implémenter l'interface FireAbility
	public function action()
	{
		echo "<br/>It can't fire. Sorry";
	}

	public function setWeaponPower($power)
	{

	}
}

//-------------------------------------------------------------------------
//-------------------------------------------------------------------------
// We create an abstract class called Plane
// Different class will inherit from the parent class
// Each derived class of Plan can set it's own kind of FireAbility
// -->SpyingPlane->fireAbility gets a PropertyItCantFire instance
// -->FightingPlance->fireAbilty gets a PropertyItFires instance
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------
abstract class Plane
{
	protected $title = "toto";
	protected $fireAbility = "default";

	public function __construct()
	{
		echo "<br/><br/>Creating a " . __CLASS__;
	}

	public function fireAction()
	{
		$this->fireAbility->action();
	}
}

class SpyingPlane extends Plane
{
	public function __construct()
	{
		parent::__construct();
		$this->fireAbility = new PropertyItCantFire();
	}
}

class FightingPlane extends Plane
{
	public function __construct()
	{
		parent::__construct();
		$this->fireAbility = new PropertyItFires();
		$this->fireAbility->setWeaponPower(20);
	}
}

class BigFightingPlane extends Plane
{
	public function __construct()
	{
		parent::__construct();
		$this->fireAbility = new PropertyItFires();
		$this->fireAbility->setWeaponPower(500);
	}
}
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

$fightPlane1 = new FightingPlane();
$fightPlane1->fireAction();

$BigFightPlane1 = new BigFightingPlane();
$BigFightPlane1->fireAction();

$spyPlane1 = new SpyingPlane();
$spyPlane1->fireAction();
