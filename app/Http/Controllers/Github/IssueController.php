<?php

declare(strict_types=1);

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
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
        return $this->service->search(repository: $repository);
    }
}
