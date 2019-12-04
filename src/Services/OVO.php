<?php

namespace Tridi\Cekmutasi\Services;

/**
*   (c) PT Trijaya Digital Grup
*
*   @link https://cekmutasi.co.id
*   @link https://tridi.net
*
*   THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
*   EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
*   MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
*   IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
*   CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
*   TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
*   SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*
**/

use Tridi\Cekmutasi\Container;
use Tridi\Cekmutasi\Support\Constant;

class OVO extends Container
{
	private $config = [];

	public function __construct($configs = [])
	{
		parent::__construct();

		$this->config = $configs;
	}

	/**
	*	Get OVO mutation (max 1000)
	*
	*	@param Array Search Filter $filters
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function mutation($filters = [])
	{
		return $this->curl('/ovo/search', Constant::HTTP_POST, [
			'search'	=> $filters
		]);
	}

	/**
	*	Get all registered ovo accounts
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function list()
	{
		return $this->curl('/ovo/list', Constant::HTTP_POST);
	}

	/**
	*	Get total balance of registered ovo accounts
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function balance()
	{
		return $this->curl('/ovo/balance', Constant::HTTP_POST);
	}

	/**
	*	Get ovo account detail
	*
	*	@param Int OVO ID $id
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function detail(int $id)
	{
		return $this->curl('/ovo/detail', Constant::HTTP_POST, [
			'id'	=> intval($id)
		]);
	}

	/**
	*	Get list bank for OVO Transfer
	*
	*	@param String $sourceNumber
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
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
	*	@return Object Tridi\Cekmutasi\Container::curl()
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
	*	@return Object Tridi\Cekmutasi\Container::curl()
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
	*	@return Object Tridi\Cekmutasi\Container::curl()
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
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function transferOVOInquiry($sourceNumber, $destinationNumber)
	{
		return $this->curl('/ovo/transfer-ovo/inquiry', Constant::HTTP_POST, [
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
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function transferOVO($sourceNumber, $destinationNumber, $amount)
	{
		return $this->curl('/ovo/transfer-ovo/send', Constant::HTTP_POST, [
			'source_number'	=> $sourceNumber,
			'phone'	=> $destinationNumber,
			'amount'	=> $amount
		]);
	}
}