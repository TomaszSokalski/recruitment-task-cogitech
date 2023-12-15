<?php

declare(strict_types=1);

namespace App\TypicodeApi;

use App\TypicodeApi\Enum\EndpointEnum;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TypicodeApiRepository
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
    ) {
    }

    public function getPostsCollection(): array
    {
        $response = $this->httpClient->request(
            'GET',
            EndpointEnum::POSTS->value
        );

        return json_decode($response->getContent(), true);
    }

    public function getUsersCollection(): array
    {
        $response = $this->httpClient->request(
            'GET',
            EndpointEnum::USERS->value
        );

        return json_decode($response->getContent(), true);
    }
}