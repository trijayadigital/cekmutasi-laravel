<?php

namespace Tridi\Cekmutasi\Support;

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