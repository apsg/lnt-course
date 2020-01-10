<?php

namespace App\Http\Requests;

use App\User;
use Apsg\ZHP\Choragwie\ChoragiewRule;
use Apsg\ZHP\OKK\OKKRule;
use Apsg\ZHP\Stopnie\StopnieRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required', 'min:3'],
            'email'     => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'photo'     => ['nullable', 'image'],
            'choragiew' => [
                'required',
                new ChoragiewRule(),
            ],
            'stopien'   => [
                'required',
                new StopnieRule(),
            ],
//            'okk'       => [
//                'required',
//                new OKKRule(),
//            ],
        ];
    }
}
