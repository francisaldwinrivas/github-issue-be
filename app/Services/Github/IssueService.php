<?php

declare(strict_types=1);

namespace App\Services\Github;

class IssueService extends Github
{
    private function getUrl(string $repository): string
    {
        return "{$this->baseUrl}/repos/{$this->username}/{$repository}/issues";
    }

    public function search(string $repository, array $params = []): array
    {
        $params = array_merge([
            'assignee' => $this->username,
            'state' => 'open', // optional, to include closed issues
            'per_page' => 100, // GitHub defaults to 30
        ], $params);

        return $this->getClient()
            ->withOptions([
                'debug' => true,
            ])
            ->get(
                $this->getUrl($repository),
                ['query' => $params]
            )
            ->json();
    }
}
