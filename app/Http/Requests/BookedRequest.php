<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "station_from"  => 'required|exists:stations,id|numeric',
            "station_to"    => 'required|exists:stations,id|numeric|gt:'.request()->station_from,
            "seat_id"      => 'required|exists:seats,id|numeric',
        ];
    }
}
