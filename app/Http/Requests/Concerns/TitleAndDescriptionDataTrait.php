<?php


namespace App\Http\Requests\Concerns;

trait TitleAndDescriptionDataTrait
{

    public function getDescription(): ?string
    {
        return $this->input('description');
    }

    public function getTitle(): string
    {
        return $this->input('title');
    }
}
