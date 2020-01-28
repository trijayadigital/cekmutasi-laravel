# Cekmutasi X Laravel Framework

Development &amp; Integration Toolkit untuk Laravel Framework (5.0+). Untuk framework/bahasa/plugin lainnya, silahkan kunjungi https://github.com/trijayadigital/cekmutasi

## Persyaratan

- PHP 5.4+
- Laravel Framework v5.0+
- cURL extension diaktifkan

## Pemasangan

#### Untuk Laravel 5.5+ LEWETI langkah 2 & 3 karena kami telah menggunakan fitur Package Discovery sehingga Laravel akan mendaftarkan Service Provider dan Alias secara otomatis pada saat pemasangan

1. Jalankan perintah
<pre><code>composer require trijayadigital/cekmutasi-laravel:dev-master</code></pre>

2. Buka file **config/app.php** dan tambahkan kode berikut ke array provider, akan terlihat seperti berikut:
<pre><code>'providers' => [

      // other providers

      Tridi\Cekmutasi\ServiceProvider::class,

],</code></pre>

3. Tambahkan kode berikut ke array aliases
<pre><code>'aliases' => [

      // other aliases

      'Cekmutasi' => Tridi\Cekmutasi\Facade::class,

],</code></pre>

4. Jalankan perintah
<pre><code>composer dump-autoload</code></pre>

5. Lalu
<pre><code>php artisan vendor:publish --provider="Tridi\Cekmutasi\ServiceProvider"</code></pre>

6. Edit **config/cekmutasi.php** dan tambahkan API Key & Signature Anda, atau Anda dapat menambahkan kode berikut ke file **.env**
<pre><code>CEKMUTASI_API_KEY="masukkan api key disini"
CEKMUTASI_API_SIGNATURE="masukkan api signature disini"</code></pre>

## Bagaimana Cara Menggunakan?

Anda dapat menggunakan library cekmutasi dengan mengimpor class cekmutasi. Berikut adalah contoh penggunaan class cekmutasi di Controller

<pre><code>&lt;?php

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

?&gt;</code></pre>

Untuk contoh lainnya, anda dapat memeriksa di file **example/CekmutasiController.php** yang tersedia di dalam package ini

## Method Yang Tersedia

* ### balance()
	Mendapatkan info saldo akun Cekmutasi

* ### checkIP()
	Memeriksa alamat IP Anda yang terdeteksi. IP ini harus ditambahkan ke Whitelist IP dalam pengaturan integrasi Anda jika Anda ingin menggunakan metode HTTP Request atau beberapa plugin
	
* ### catchIPN()
	Menangani data callback / ipn. Metode ini sangat disarankan untuk digunakan karena memiliki verifikasi keamanan callback / ipn
	
* ### bank()
	Memuat layanan Bank. Di bawah ini adalah metode yang tersedia dari layanan bank
	- #### list()
		Dapatkan daftar rekening bank
		
	- #### detail()
		Dapatkan detail rekening bank
		
	- #### balance()
		Dapatkan saldo total rekening bank terdaftar
		
	- #### mutation()
		Dapatkan mutasi bank (maks 1000)

* ### paypal()
	Muat layanan PayPal. Di bawah ini adalah metode yang tersedia dari layanan paypal
	- #### list()
		Dapatkan daftar akun paypal
		
	- #### detail()
		Dapatkan detail akun paypal
		
	- #### balance()
		Dapatkan saldo total akun paypal terdaftar
		
	- #### mutation()
		Dapatkan mutasi paypal (maks 1000)
	
* ### gopay()
	Muat layanan GoPay. Di bawah ini adalah metode yang tersedia dari layanan gopay
	- #### list()
		Dapatkan daftar akun gopay
		
	- #### detail()
		Dapatkan detail akun gopay
		
	- #### balance()
		Dapatkan total saldo akun gopay terdaftar
		
	- #### mutation()
		Dapatkan mutasi gopay (maks 1000)
	
* ### ovo()
	Memuat layanan OVO. Di bawah ini adalah metode yang tersedia dari layanan ovo
	- #### list()
		Dapatkan daftar akun ovo
		
	- #### detail()
		Dapatkan detail akun ovo
		
	- #### balance()
		Dapatkan saldo total akun ovo terdaftar
		
	- #### mutation()
		Dapatkan mutasi ovo (maks 1000)
		
	- #### transferBankList()
		Dapatkan bank tujuan yang tersedia
	
	- #### transferBankInquiry()
		Buat inquiry transfer bank
		
	- #### transferBank()
		Proses transfer dari OVO ke bank
		
	- #### transferBankDetail()
		Dapatkan detail transaksi transfer bank
	
	- #### transferOVOInquiry()
		Lakukan inquiry transfer OVO
		
	- #### transferOVO()
		Proses transfer dari OVO ke OVO

## Saran Keamanan

Untuk cara terbaik menangani Callback / IPN, kami sangat menyarankan Anda untuk menggunakan metode **catchIPN()** dengan validasi keamanan untuk memverifikasi data Callback / IPN yang masuk.
