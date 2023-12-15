<?php

namespace App\TypicodeApi\Enum;

enum EndpointEnum: string
{
    case POSTS = 'https://jsonplaceholder.typicode.com/posts';
    case USERS = 'https://jsonplaceholder.typicode.com/users';
}