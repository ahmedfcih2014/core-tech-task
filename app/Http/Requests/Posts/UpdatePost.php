<?php

namespace App\Http\Requests\Posts;

use App\Exceptions\Forbidden;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // throwing custom forbidden for clarify its response
        if (!Gate::allows('update-post', $this->post)) {
            throw new Forbidden("You are not allowed to update this post.");
        }
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
            'title' => 'required|string|max:255',
            'slug' =>  'required|string|max:255',
            'content' => 'required|string',
        ];
    }
}
