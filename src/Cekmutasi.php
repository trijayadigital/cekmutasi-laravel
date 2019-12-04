<?php

namespace Tridi\Cekmutasi;

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

use Tridi\Cekmutasi\Services\Bank;
use Tridi\Cekmutasi\Services\PayPal;
use Tridi\Cekmutasi\Services\OVO;
use Tridi\Cekmutasi\Services\GoPay;
use Tridi\Cekmutasi\Support\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Cekmutasi extends Container
{
    public function __construct()
    {
        parent::__construct();
    }
	
	/**
	*	Load bank service
	*
	*	@param Array $configs
	*
	*	@return Object Tridi\Cekmutasi\Services\Bank
	*
	**/

    public function bank($configs = [])
    {
        return (new Bank($configs));
    }

    /**
	*	Load PayPal service
	*
	*	@param Array $configs
	*
	*	@return Object Tridi\Cekmutasi\Services\PayPal
	*
	**/

    public function paypal($configs = [])
    {
        return (new PayPal($configs));
    }

    /**
	*	Load GoPay service
	*
	*	@param Array $configs
	*
	*	@return Object Tridi\Cekmutasi\Services\GoPay
	*
	**/

    public function gopay($configs = [])
    {
    	return (new GoPay($configs));
    }

    /**
	*	Load OVO service
	*
	*	@param Array $configs
	*
	*	@return Object Tridi\Cekmutasi\Services\OVO
	*
	**/

    public function ovo($configs = [])
    {
    	return (new OVO($configs));
    }

    /**
	*	Check your IP
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

    public function checkIP()
    {
    	return $this->curl('/myip', Constant::HTTP_POST);
    }

    /**
	*	Check your cekmutasi balance
	*
	*	@return Object Tridi\Cekmutasi\Container::curl()
	*
	**/

    public function balance()
    {
    	return $this->curl('/balance', Constant::HTTP_POST);
    }

    /**
	*	Handle incoming IPN/Callback data
	*
	*	@param Illuminate\Http\Request $request
	*
	*	@return Object
	*
	**/

    public function catchIPN(Request $request)
    {
        $incomingSignature = $request->server('HTTP_API_SIGNATURE');

        if( empty($incomingSignature) ) {
            Log::info(get_class($this).': Undefined Signature');
            exit("Undefined signature!");
        }

        if( version_compare(PHP_VERSION, '5.6.0', '>=') )
        {
            if( !hash_equals($this->apiSignature, $incomingSignature) ) {
                Log::info(get_class($this).': Invalid Signature, ' . $this->apiSignature . ' vs ' . $incomingSignature);
                exit("Invalid signature!");
            }
        }
        else
        {
            if( $this->apiSignature !== $incomingSignature ) {
                Log::info(get_class($this).': Invalid Signature, ' . $this->apiSignature . ' vs ' . $incomingSignature);
                exit("Invalid signature!");
            }
        }

        $json = $request->getContent();
        $decoded = json_decode($json);

        if( json_last_error() !== JSON_ERROR_NONE ) {
            Log::info(get_class($this).': Invalid JSON, ' . $json);
            exit("Invalid JSON!");
        }

        return $decoded;
    }
}
