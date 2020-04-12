<?php

namespace App\Contracts;

interface CertificateUpdateRequestDataProvider extends CertificateRequestDataProvider
{
    public function getPosition(): int;
}
