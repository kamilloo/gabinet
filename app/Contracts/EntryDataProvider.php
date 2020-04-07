<?php

namespace App\Contracts;

interface EntryDataProvider
{
    public function getStoragePath(): string;
}
