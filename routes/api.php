<?php

declare(strict_types=1);

use App\Http\Controllers\Github\IssueController;
use App\Http\Controllers\Github\RepositoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    /**
     * GITHUB Routes
     */
    Route::prefix('github')->name('github.')->group(function () {
        /**
         * REPOSITORY Routes
         */
        Route::prefix('repository')->name('repository.')->group(function () {
            Route::get('search', [RepositoryController::class, 'search'])->name('search');

            Route::prefix('{repository}/issue')->name('issue.')->group(function () {
                Route::get('search', [IssueController::class, 'search'])->name('search');
            });
        });
    });
});
