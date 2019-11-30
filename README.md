# Cekmutasi X Laravel Framework
Development &amp; Integration Toolkit for Laravel Framework (5.3+)

## Installation
- Copy **packages** folder under your laravel root directory, or you can skip to **packages/pt-tridi** if **packages** folder already exists (http://prntscr.com/lbg8pl)
- Open your **config/app.php** and add this code to the providers array, it will looks like:

<pre><code>'providers' =&gt; [

      // other providers

      PTTridi\Cekmutasi\CekmutasiServiceProvider::class,

],</code></pre>

- Add this code to your class aliases array

<pre><code>'aliases' =&gt; [

      // other aliases

      'Cekmutasi' => PTTridi\Cekmutasi\CekmutasiFacade::class,

],</code></pre>

- Open your **composer.json** in the root folder then add this code to the psr-4 on autoload section, it will looks like:

<pre><code>&quot;autoload&quot;: {

        // other section
        
        &quot;psr-4&quot;: {
            &quot;App\\&quot;: &quot;app/&quot;,
            &quot;PTTridi\\Cekmutasi\\&quot;: &quot;packages/pt-tridi/cekmutasi/src&quot;,
        },
        
       // other section
       
},</code></pre>

- Then run composer command on your Command Line Console

<pre><code>composer dump-autoload</code></pre>

- Add **CEKMUTASI_API_KEY** & **CEKMUTASI_API_SIGNATURE** to your **.env** file, it will looks like

<pre><code>// other env variable
	
CEKMUTASI_API_KEY="place your api key here"
CEKMUTASI_API_SIGNATURE="place your api signature here"

 </code></pre>

## How To Use?

You can use cekmutasi library by importing cekmutasi class. Here is the example of using cekmutasi class in Controller

<pre><code>&#x3C;?php

namespace App\Http\Controllers;

use Cekmutasi;

class AnotherController extends Controller
{
    $mutation = Cekmutasi::bank()-&#x3E;mutation([
				'date'		=&gt; [
					'from'	=&gt; date('Y-m-d') . ' 00:00:00',
					'to'	=&gt; date('Y-m-d') . ' 23:59:59'
				]
			]);

    dd($mutation);
}

?&#x3E;</code></pre>

For further example, you can check out in **CekmutasiController.php** included in this package

## Available Methods

* ### [balance()](packages/pt-tridi/cekmutasi/src/Cekmutasi.php#L94)
	Get cekmutasi account balance

* ### [checkIP()](packages/pt-tridi/cekmutasi/src/Cekmutasi.php#L82)
	Check your detected IP address. This IP should be added to Whitelist IP in your integration if you want to use HTTP Request method or some plugins
	
* ### [catchIPN()](packages/pt-tridi/cekmutasi/src/Cekmutasi.php#L108)
	Handle callback/ipn data. This method is highly recommended for use because it has pre-build callback/ipn security verification
	
* ### [bank()](packages/pt-tridi/cekmutasi/src/Cekmutasi.php#L28)
	Load Bank service. Below are the available methods from bank service
	- #### [list()](packages/pt-tridi/cekmutasi/src/Services/Bank.php#L42)
		Get bank account list
		
	- #### [detail()](packages/pt-tridi/cekmutasi/src/Services/Bank.php#L68)
		Get bank account detail
		
	- #### [balance()](packages/pt-tridi/cekmutasi/src/Services/Bank.php#L54)
		Get total balance of registered bank accounts
		
	- #### [mutation()](packages/pt-tridi/cekmutasi/src/Services/Bank.php#L28)
		Get bank mutation (max 1000)

* ### [paypal()](packages/pt-tridi/cekmutasi/src/Cekmutasi.php#L42)
	Load PayPal service. Below are the available methods from paypal service
	- #### [list()](packages/pt-tridi/cekmutasi/src/Services/PayPal.php#L42)
		Get paypal account list
		
	- #### [detail()](packages/pt-tridi/cekmutasi/src/Services/PayPal.php#L68)
		Get paypal account detail
		
	- #### [balance()](packages/pt-tridi/cekmutasi/src/Services/PayPal.php#L54)
		Get total balance of registered paypal accounts
		
	- #### [mutation()](packages/pt-tridi/cekmutasi/src/Services/PayPal.php#L28)
		Get paypal mutation (max 1000)
	
* ### [gopay()](packages/pt-tridi/cekmutasi/src/Cekmutasi.php#L56)
	Load GoPay service. Below are the available methods from gopay service
	- #### [list()](packages/pt-tridi/cekmutasi/src/Services/GoPay.php#L42)
		Get gopay account list
		
	- #### [detail()](packages/pt-tridi/cekmutasi/src/Services/GoPay.php#L68)
		Get gopay account detail
		
	- #### [balance()](packages/pt-tridi/cekmutasi/src/Services/GoPay.php#L54)
		Get total balance of registered gopay accounts
		
	- #### [mutation()](packages/pt-tridi/cekmutasi/src/Services/GoPay.php#L28)
		Get gopay mutation (max 1000)
	
* ### [ovo()](packages/pt-tridi/cekmutasi/src/Cekmutasi.php#L70)
	Load OVO service. Below are the available methods from ovo service
	- #### [list()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L42)
		Get ovo account list
		
	- #### [detail()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L68)
		Get ovo account detail
		
	- #### [balance()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L54)
		Get total balance of registered ovo accounts
		
	- #### [mutation()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L28)
		Get ovo mutation (max 1000)
		
	- #### [transferBankList()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L84)
		Get the available destination banks
	
	- #### [transferBankInquiry()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L104)
		Make transfer bank inquiry
		
	- #### [transferBank()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L128)
		Proccess transfer from OVO to bank
		
	- #### [transferBankDetail()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L147)
		Get transaction detail of bank transfer
	
	- #### [transferOVOInquiry()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L165)
		Make transfer OVO inquiry
		
	- #### [transferOVO()](packages/pt-tridi/cekmutasi/src/Services/OVO.php#L186)
		Proccess transfer from OVO to OVO

## Security Advice

For the best way to handle Callback/IPN, we strongly recommend you to use the **catchIPN()** method with pre-build security validation to handle and verifiying incoming callback/ipn data.
