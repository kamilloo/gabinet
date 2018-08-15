<?php

namespace App\Contracts;

interface FileModelInterface
{
    public function getStoragePath(): string;
}