<?php

namespace PTTridi\Cekmutasi\Services;

use PTTridi\Cekmutasi\Container;
use PTTridi\Cekmutasi\Support\Constant;

class PayPal extends Container
{
	private $config = [];

	public function __construct($configs = [])
	{
		parent::__construct();

		$this->config = $configs;
	}

	/**
	*	Search PayPal mutation
	*
	*	@param Array $options
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function search($options = [])
	{
		return $this->curl('/paypal/search', Constant::HTTP_POST, [
			'search'	=> $options
		]);
	}

	/**
	*	Get payment detail
	*
	*	@param String $username
	*
	*	@param String $transactionid
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function detail($username, $transactionid)
	{
		return $this->curl('/paypal/detail', Constant::HTTP_POST, [
			'username'	=> $username,
			'transactionid' => $transactionid
		]);
	}
}