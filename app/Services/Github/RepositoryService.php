<?php

declare(strict_types=1);

namespace App\Services\Github;

class RepositoryService extends Github
{
    protected string $endpoint = 'user/repos';

    public function search(array $params = []): array
    {
        return $this->getClient()
            ->get("{$this->baseUrl}/{$this->endpoint}", $params)
            ->json();
    }
}
