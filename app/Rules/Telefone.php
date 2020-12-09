<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Telefone implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
    * Valida o formato do telefone e celular com ddd. Não aceita sem ddd
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    public function passes($attribute, $value)
    {
       
        $regex = '/^(\d{2})(\s?)(9?\d{4})(-?)\d{4}$/';

        if (preg_match($regex, $value) == false) {

            // O número não foi validado.
            return false;
        } else {

            // Telefone válido.
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Telefone inválido.';
    }
}
