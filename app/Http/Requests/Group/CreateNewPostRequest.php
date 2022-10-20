<?php

namespace App\Http\Requests\Group;

use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateNewPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // change authorize later
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'content' => 'required|string',
            'group_id' => 'required|integer',
            'member_id' => 'required|integer',
            'attachment' => 'string',
        ];
    }

    protected function failedValidation(ValidationValidator $validator)
    {
        $errors = $this->validator->errors();

        throw new HttpResponseException(
            response()->json([
                'code' => 400,
                'status' => 'bad request',
                'message' => $errors
            ], 400)
        );
    }
}
