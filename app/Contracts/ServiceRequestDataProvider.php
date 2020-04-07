<?php

namespace App\Contracts;

interface ServiceRequestDataProvider extends EntryDataProvider
{
    public function getTitle(): string;
    public function getDescription(): ?string;
    public function getCategoryId(): ?int;
}
