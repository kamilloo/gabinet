<?php

namespace App\Http\Requests;

class PortfolioRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'filepath' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
        ];
    }

    public function tags():array
    {
        return collect(explode(',', $this->tags))->map(function ($tag){
            return mb_strtolower(trim($tag));
        })->all();
    }
}
