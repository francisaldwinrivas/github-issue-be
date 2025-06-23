<?php

declare(strict_types=1);

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use App\Http\Requests\Github\Issue\UpdateRequest;
use App\Services\Github\IssueService;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function __construct(protected IssueService $service)
    {
        // Do something
    }

    public function search(Request $request, string $repository): array
    {
        $issues = $this->service->search(repository: $repository);

        $issueCollection = collect($issues);

        $filteredIssues = $issueCollection->filter(function (array $issue, int $key) {
            $labels = collect($issue['labels'])->pluck('name');

            return !in_array('wontfix', [...$labels]);
        })->all();

        return $filteredIssues;
    }

    public function update(UpdateRequest $request, string $repository, int $issueNumber): array
    {
        return $this->service->update(
            repository: $repository,
            issueNumber: $issueNumber,
            params: $request->all()
        );
    }
}
