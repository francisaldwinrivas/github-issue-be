<?php

declare(strict_types=1);

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use App\Services\Github\RepositoryService;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function __construct(protected RepositoryService $service)
    {
        // Do something
    }

    public function search(Request $request): array
    {
        return $this->service->search();
    }
}
