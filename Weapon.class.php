<?php

Class Weapon
{
	protected $_charge;
	protected $_shortRange;
	protected $_mediumRange;
	protected $_longRange;
	protected $_effectZone;
	protected $_abilities;
	protected $_initialCharges;
	protected $_name;

	const SIDE_LASER = 0;
	const LANCE = 1;
	const HEAVY_LANCE = 2;
	const MACHINE_GUN = 3;
	const CANON = 4;

	public static function doc()
	{
		echo file_get_contents('Weapon.doc.txt');
	}

	public function __construct(array $arr)
	{
		if ($arr['preset'] === self::LANCE)
		{
			$this->_shortRange = array(1, 30);
			$this->_mediumRange = array(31, 60);
			$this->_longRange = array(61, 90);
			$this->_effectZone = 0;
			$this->_abilities = 0;
			$this->initialCharges = 0;
			$this->_name = $arr['name'];
		}
		$this->_charge = $this->_initialCharges;
	}

	public function addCharge()
	{
		$this->_charges++;
	}
	
	public function removeCharge()
	{
		$this->_charges--;
	}

	public function getCharge()
	{
		return $this->_charges;
	}

	public function getName()
	{
		return $this->_name;
	}

	public function getRanges()
	{
		return array($this->_shortRange[1], $this->_mediumRange[1], $this->_longRange[1]);
	}
}

?>
