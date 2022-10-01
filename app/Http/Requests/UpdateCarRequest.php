<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AmenityRule;
use App\Models\CarType;
use Illuminate\Validation\Rule;

class UpdateCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('update cars');
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $amenity_rule = new AmenityRule;
        return array_merge([
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'name' => 'required|string|'.Rule::unique('cars','name')->ignore($this->car, 'id'),
        'car_type_id' => 'nullable|integer',
        'rental_company' => "nullable|string|min:3",
        'rental_information' => 'string|'.Rule::requiredIf(isset($this->rental_company) && !empty($this->rental_company)),
        'no_of_passenger' => "nullable|integer|min:0",
        'no_of_baggage' => 'nullable|integer|min:0',
        'price' => 'required|numeric|min:0.01',
        ],  $amenity_rule::$validation_rules);
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!CarType::find($this->car_type_id)) {
                $validator->errors()->add('car_type_id', 'Unknow Car Type. Please select from the available option!');
            }
        });
    }
}
