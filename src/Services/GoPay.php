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

class GoPay extends Container
{
	private $config = [];

	public function __construct($configs = [])
	{
		parent::__construct();

		$this->config = $configs;
	}

	/**
	*	Get GoPay mutation (max 1000)
	*
	*	@param Array Search Filter $filters
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function mutation($filters = [])
	{
		return $this->curl('/gopay/search', Constant::HTTP_POST, [
			'search'	=> $filters
		]);
	}

	/**
	*	Get all registered gopay accounts
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function list()
	{
		return $this->curl('/gopay/list', Constant::HTTP_POST);
	}

	/**
	*	Get total balance of registered gopay accounts
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function balance()
	{
		return $this->curl('/gopay/balance', Constant::HTTP_POST);
	}

	/**
	*	Get gopay account detail
	*
	*	@param Int GoPay ID $id
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

	public function detail(int $id)
	{
		return $this->curl('/gopay/detail', Constant::HTTP_POST, [
			'id'	=> intval($id)
		]);
	}
}