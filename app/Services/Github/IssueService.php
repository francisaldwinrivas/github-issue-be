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
            'state' => 'open',
        ], $params);

        return $this->getClient()
            ->get(
                $this->getUrl($repository),
                ['query' => $params]
            )
            ->json();
    }
}
