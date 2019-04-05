<?php

require_once('Weapon.class.php');

Class Lance extends Weapon
{
	public static function doc()
	{
		echo file_get_contents('Weapon.doc.txt');
	}

	public function __construct($name)
	{
		$this->_shortRange = array(1, 30);
		$this->_mediumRange = array(31, 60);
		$this->_longRange = array(61, 90);
		$this->_effectZone = 0;
		$this->_abilities = 0;
		$this->_initialCharges = 0;
		$this->_name = $name;
		$this->_charges = $this->_initialCharges;
	}
}
