<?php

namespace Tridi\Cekmutasi;

use Illuminate\Support\Facades\Facade;

class CekmutasiFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
	    return 'Cekmutasi';
	}
}