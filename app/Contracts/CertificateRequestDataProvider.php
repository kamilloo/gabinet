<?php

namespace App\Contracts;

interface CertificateRequestDataProvider extends EntryDataProvider
{
    public function getTitle(): string;
    public function getDescription(): ?string;
}
