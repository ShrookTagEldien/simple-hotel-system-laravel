<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Room;

class ReservationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $room=Room::where('id',request()->id)->first();
        $capacity=$room->capacity;
        return [
           'accompanies' => "required|integer|max:$capacity",
           'id' => "required|exists:rooms,id"
        ];
    }
}
