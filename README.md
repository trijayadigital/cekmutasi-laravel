# Cekmutasi X Laravel Framework

Development &amp; Integration Toolkit for Laravel Framework (5.0+). For other web framework/language/plugin, please go to https://github.com/trijayadigital/cekmutasi

## Installation

- Run command
<code>composer require trijayadigital/cekmutasi-laravel</code>

- Open your **config/app.php** and add this code to the providers array, it will looks like:
<code>'providers' => [

      // other providers

      Tridi\Cekmutasi\ServiceProvider::class,

],</code>

- Add this code to your class aliases array
<code>'aliases' => [

      // other aliases

      'Cekmutasi' => Tridi\Cekmutasi\Facade::class,

],</code>

- Run command
<code>composer dump-autoload</code>

- Then
<code>php artisan vendor:publish --provider="Tridi\Cekmutasi\ServiceProvider"</code>

- Edit **config/cekmutasi.php** and add your API Key & Signature, or you can add this code to your **.env** file
<code>
	
CEKMUTASI_API_KEY="place your api key here"
CEKMUTASI_API_SIGNATURE="place your api signature here"

 </code>

## How To Use?

You can use cekmutasi library by importing cekmutasi class. Here is the example of using cekmutasi class in Controller

<pre><code><?php

namespace App\Http\Controllers;

use Cekmutasi;

class AnotherController extends Controller
{
	public function index()
	{
	    $mutation = Cekmutasi::bank()->mutation([
					'date'		=> [
						'from'	=> date('Y-m-d') . ' 00:00:00',
						'to'	=> date('Y-m-d') . ' 23:59:59'
					]
				]);

	    dd($mutation);
	}
}

?></code></pre>

For further example, you can check out in **CekmutasiController.php** included in this package

## Available Methods

* ### balance()
	Get cekmutasi account balance

* ### checkIP()
	Check your detected IP address. This IP should be added to Whitelist IP in your integration if you want to use HTTP Request method or some plugins
	
* ### catchIPN()
	Handle callback/ipn data. This method is highly recommended for use because it has pre-build callback/ipn security verification
	
* ### bank()
	Load Bank service. Below are the available methods from bank service
	- #### list()
		Get bank account list
		
	- #### detail()
		Get bank account detail
		
	- #### balance()
		Get total balance of registered bank accounts
		
	- #### mutation()
		Get bank mutation (max 1000)

* ### paypal()
	Load PayPal service. Below are the available methods from paypal service
	- #### list()
		Get paypal account list
		
	- #### detail()
		Get paypal account detail
		
	- #### balance()
		Get total balance of registered paypal accounts
		
	- #### mutation()
		Get paypal mutation (max 1000)
	
* ### gopay()
	Load GoPay service. Below are the available methods from gopay service
	- #### list()
		Get gopay account list
		
	- #### detail()
		Get gopay account detail
		
	- #### balance()
		Get total balance of registered gopay accounts
		
	- #### mutation()
		Get gopay mutation (max 1000)
	
* ### ovo()
	Load OVO service. Below are the available methods from ovo service
	- #### list()
		Get ovo account list
		
	- #### detail()
		Get ovo account detail
		
	- #### balance()
		Get total balance of registered ovo accounts
		
	- #### mutation()
		Get ovo mutation (max 1000)
		
	- #### transferBankList()
		Get the available destination banks
	
	- #### transferBankInquiry()
		Make transfer bank inquiry
		
	- #### transferBank()
		Proccess transfer from OVO to bank
		
	- #### transferBankDetail()
		Get transaction detail of bank transfer
	
	- #### transferOVOInquiry()
		Make transfer OVO inquiry
		
	- #### transferOVO()
		Proccess transfer from OVO to OVO

## Security Advice

For the best way to handle Callback/IPN, we strongly recommend you to use the **catchIPN()** method with pre-build security validation to handle and verifiying incoming callback/ipn data.
