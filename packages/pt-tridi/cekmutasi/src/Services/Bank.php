<?php

namespace PTTridi\Cekmutasi\Services;

use PTTridi\Cekmutasi\Container;
use PTTridi\Cekmutasi\Support\Constant;

class Bank extends Container
{
	private $config = [];

	public function __construct($configs = [])
	{
		parent::__construct();

		$this->config = $configs;
	}

	/**
	*	Search bank mutation
	*
	*	@param Array $options
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function search($options = [])
	{
		return $this->curl('/bank/search', Constant::HTTP_POST, [
			'search'	=> $options
		]);
	}
}