<?php

namespace App\Http\Requests\Api\V1\Quotation;

use App\Http\Requests\FormRequest;
use Spatie\ValidationRules\Rules\Currency;
use Spatie\ValidationRules\Rules\Delimited;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'age'         => ['required', (new Delimited(['integer', 'between:18,70']))->min(1)],
            'currency_id' => ['required', new Currency(), 'in:EUR,GBP,USD'],
            'start_date'  => ['required', 'date', 'date_format:Y/m/d', 'before_or_equal:end_date'],
            'end_date'    => ['required', 'date', 'date_format:Y/m/d', 'after_or_equal:start_date'],
        ];
    }
}
