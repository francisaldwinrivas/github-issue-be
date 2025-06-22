<?php

declare(strict_types=1);

namespace App\Services\Github;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class Github
{
    protected string $baseUrl = 'https://api.github.com';

    protected string $username;

    protected string $token;

    public function __construct()
    {
        $this->username = Config::get('github.username');
        $this->token = Config::get('github.token');
    }

    protected function getClient(): PendingRequest
    {
        $client = Http::acceptJson();

        if ($this->token) {
            $client->withToken($this->token);
        }

        return $client;
    }

    public function getAuthenticatedUser()
    {
        $response = $this->getClient()->get($this->baseUrl.'/user');

        return $response->json();
    }
}
