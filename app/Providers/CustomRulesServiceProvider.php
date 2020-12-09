<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

use App\Rules\CPF;
use App\Rules\CNPJ;
use App\Rules\Telefone;

class CustomRulesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('CPF', function($attribute, $value, $parameter, $validator){
		    return (new CPF())->passes($attribute, $value);
        });

        Validator::extend('CNPJ', function($attribute, $value, $parameter, $validator){
		    return (new CNPJ())->passes($attribute, $value);
        });

        Validator::extend('telefone', function($attribute, $value, $parameter, $validator){
		    return (new Telefone())->passes($attribute, $value);
        });
    }
}
