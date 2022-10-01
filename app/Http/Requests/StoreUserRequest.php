<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'image' => 'image|max:1024',
        'flight.number' => 'nullable|string|unique:flights,number',
        'flight.airline_id' => 'required:numeric',
        'flight.from' => "required|string|min:3",
        'flight.to' => "required|string|min:3",
        'flight.departure_on' => 'required|date',
        'flight.arriving_on' => 'required|date',
        'flight.flight_class_id' => 'required|numeric',
        'flight.stops' => 'nullable',
        'flight.fare_type_id' => 'required|numeric',
        'flight.cancellation_fee' => 'nullable|numeric',
        'flight.tax' => 'nullable|numeric',
        'flight.price' => 'required|numeric|min:0.01',
        ];
    }
}
