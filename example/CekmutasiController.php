<?php

namespace App\Http\Controllers;

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

use Cekmutasi;
use Illuminate\Http\Request;

class CekmutasiController extends Controller
{
	/**
	*	Get bank mutations (max 1000)
	*
	**/

	public function mutasiBank()
	{
		$mutasi = Cekmutasi::bank()->mutation([
				'date'		=> [
					'from'	=> date('Y-m-d') . ' 00:00:00',
					'to'	=> date('Y-m-d') . ' 23:59:59'
				]
			]);

		dd($mutasi);
	}

	/**
	*	Get bank account list
	*
	**/

	public function listBank()
	{
		$banks = Cekmutasi::bank()->list();

		dd($banks);
	}

	/**
	*	Get bank account detail
	*
	**/

	public function detailBank()
	{
		$id = 1; // Bank ID from list
		$detail = Cekmutasi::bank()->detail($id);

		dd($detail);
	}

	/**
	*	Get paypal mutations (max 1000)
	*
	**/

	public function mutasiPayPal()
	{
		$mutasi = Cekmutasi::paypal()->mutation([
				'date'		=> [
					'from'	=> date('Y-m-d') . ' 00:00:00',
					'to'	=> date('Y-m-d') . ' 23:59:59'
				]
			]);

		dd($mutasi);
	}

	/**
	*	Get paypal account list
	*
	**/

	public function listPayPal()
	{
		$paypals = Cekmutasi::paypal()->list();

		dd($paypals);
	}

	/**
	*	Get paypal account detail
	*
	**/

	public function detailPayPal()
	{
		$id = 1; // PayPal ID from list
		$detail = Cekmutasi::paypal()->detail($id);

		dd($detail);
	}

	/**
	*	Get gopay mutations (max 1000)
	*
	**/

	public function mutasiGoPay()
	{
		$mutasi = Cekmutasi::gopay()->mutation([
				'date'		=> [
					'from'	=> date('Y-m-d') . ' 00:00:00',
					'to'	=> date('Y-m-d') . ' 23:59:59'
				]
			]);

		dd($mutasi);
	}

	/**
	*	Get gopay account list
	*
	**/

	public function listGoPay()
	{
		$gopays = Cekmutasi::gopay()->list();

		dd($gopays);
	}

	/**
	*	Get gopay account detail
	*
	**/

	public function detailGoPay()
	{
		$id = 1; // GoPay ID from list
		$detail = Cekmutasi::gopay()->detail($id);

		dd($detail);
	}

	/**
	*	Get ovo mutations (max 1000)
	*
	**/

	public function mutasiOVO()
	{
		$mutasi = Cekmutasi::ovo()->mutation([
				'date'		=> [
					'from'	=> date('Y-m-d') . ' 00:00:00',
					'to'	=> date('Y-m-d') . ' 23:59:59'
				]
			]);

		dd($mutasi);
	}

	/**
	*	Get ovo account list
	*
	**/

	public function listOVO()
	{
		$ovos = Cekmutasi::ovo()->list();

		dd($ovos);
	}

	/**
	*	Get ovo account detail
	*
	**/

	public function detailOVO()
	{
		$id = 1; // OVO ID from list
		$detail = Cekmutasi::ovo()->detail($id);

		dd($detail);
	}

	/**
	*	Get cekmutasi.co.id account balance
	*
	**/

	public function balance()
	{
		$result = Cekmutasi::balance();

		dd($result);
	}

	/**
	*	Check your detected IP address
	*
	**/

	public function ip()
	{
		$result = Cekmutasi::checkIP();

		dd($result);
	}

	/**
	*	Handle incoming callback/ipn
	*
	**/

	public function handleCallback(Request $request)
	{
		$ipn = Cekmutasi::catchIPN($request);

		dd($ipn);
	}
}
