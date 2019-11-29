<?php

namespace PTTridi\Cekmutasi\Services;

use PTTridi\Cekmutasi\Container;
use PTTridi\Cekmutasi\Support\Constant;

class GoPay extends Container
{
	private $config = [];

	public function __construct($configs = [])
	{
		parent::__construct();

		$this->config = $configs;
	}

		/**
	*	Search GoPay mutation
	*
	*	@param Array $options
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function search($options = [])
	{
		return $this->curl('/gopay/search', Constant::HTTP_POST, [
			'search'	=> $options
		]);
	}
}