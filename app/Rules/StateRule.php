<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StateRule implements Rule
{

    private $states;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->states = require app_path("states.php");
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !$value || array_key_exists($value, $this->states);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not valid.';
    }
}
