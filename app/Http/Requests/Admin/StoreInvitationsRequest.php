<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvitationsRequest extends FormRequest
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
        return [
            'email' => 'required|email',
            'sent_at' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'accepted_at' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'rejected_at' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
        ];
    }
}
