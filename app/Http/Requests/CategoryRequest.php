<?php

namespace App\Http\Requests;


use App\Contracts\CategoryRequestInterface;

class CategoryRequest extends Request implements CategoryRequestInterface
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'icon' => ['required', 'string']
        ];
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getIcon(): string
    {
        return $this->input('icon');
    }
}
