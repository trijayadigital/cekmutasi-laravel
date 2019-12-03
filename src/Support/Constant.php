<?php

namespace Tridi\Cekmutasi\Support;

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

class Constant
{
	const VERSION = '1.0';
	const API_BASEURL = 'https://api.cekmutasi.co.id/v1';

    const BANK = 1;
    const PAYPAL = 2;
    const GOPAY = 3;
    const OVO = 4;

    const HTTP_GET = 0;
    const HTTP_POST = 1;

    const FORMAT_JSON = 'application/json';
    const FORMAT_XML = 'text/xml';
}