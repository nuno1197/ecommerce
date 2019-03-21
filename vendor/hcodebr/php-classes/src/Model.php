<?php 

namespace Hcode;

class Model {

	private $values = [];

	//Saber sempre que um emtodo é chamado

	public function __call($name, $args)
	{
		//Saber se é metodo get ou set
		$method= substr($name, 0 , 3);//a partir da pos 0 traz 3
		$fieldName= substr($name, 3, strlen($name));//primeiras

		switch($method)
		{
			case "get":
				return $this->values[$fieldName];
			break;

			case "set":
					   $this->values[$fieldName] = $args[0];
			break;
		}

	}

	public function setData($data = array())
	{

		foreach ($data as $key => $value) {
			
			$this->{"set".$key}($value);
		}

	}

	public function getValues()
	{
		return $this->values;
	}


}





 ?>