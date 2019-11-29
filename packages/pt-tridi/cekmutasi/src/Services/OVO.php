<?php

namespace PTTridi\Cekmutasi\Services;

use PTTridi\Cekmutasi\Container;
use PTTridi\Cekmutasi\Support\Constant;

class OVO extends Container
{
	private $config = [];

	public function __construct($configs = [])
	{
		parent::__construct();

		$this->config = $configs;
	}

	/**
	*	Search OVO mutation
	*
	*	@param Array $options
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function search($options = [])
	{
		return $this->curl('/ovo/search', Constant::HTTP_POST, [
			'search'	=> $options
		]);
	}

	/**
	*	Get list bank for OVO Transfer
	*
	*	@param String $sourceNumber
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function transferBankList($sourceNumber)
	{
		return $this->curl('/ovo/transfer/bank-list', Constant::HTTP_POST, [
			'source_number'	=> $sourceNumber
		]);
	}

	/**
	*	Transfer inquiry
	*
	*	@param String $sourceNumber
	*
	*	@param String $bankCode
	*
	*	@param String $destinationNumber
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function transferBankInquiry($sourceNumber, $bankCode, $destinationNumber)
	{
		return $this->curl('/ovo/transfer/inquiry', Constant::HTTP_POST, [
			'source_number'	=> $sourceNumber,
			'bank_code'	=> $bankCode,
			'destination_number'	=> $destinationNumber
		]);
	}

	/**
	*	Proccess transfer
	*
	*	@param String $uuid
	*
	*	@param String $token
	*
	*	@param String $amount
	*
	*	@param String $note
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function transferBank($uuid, $token, $amount, $note = '')
	{
		return $this->curl('/ovo/transfer/send', Constant::HTTP_POST, [
			'uuid'	=> $uuid,
			'token'	=> $token,
			'amount'	=> $amount,
			'note'	=> $note
		]);
	}

	/**
	*	Get transfer detail
	*
	*	@param String $uuid
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function transferBankDetail($uuid)
	{
		return $this->curl('/ovo/transfer/detail', Constant::HTTP_GET, [
			'uuid'	=> $uuid
		]);
	}

	/**
	*	Transfer Inquiry
	*
	*	@param String $sourceNumber
	*
	*	@param String $destinationNumber
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function transferOVOInquiry($sourceNumber, $destinationNumber)
	{
		return $this->curl('/ovo/transfer/send', Constant::HTTP_POST, [
			'source_number'	=> $sourceNumber,
			'phone'	=> $destinationNumber
		]);
	}

	/**
	*	Process transfer
	*
	*	@param String $sourceNumber
	*
	*	@param String $destinationNumber
	*
	*	@param Int $amount
	*
	*	@return Object PTTridi\Cekmutasi\Container::curl()
	*
	**/

	public function transferOVO($sourceNumber, $destinationNumber, $amount)
	{
		return $this->curl('/ovo/transfer/send', Constant::HTTP_POST, [
			'source_number'	=> $sourceNumber,
			'phone'	=> $destinationNumber,
			'amount'	=> $amount
		]);
	}
}