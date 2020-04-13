<?php

namespace App\Contracts;

interface CategoryRequestInterface
{
    public function getName(): string;
    public function getIcon(): string;
}
