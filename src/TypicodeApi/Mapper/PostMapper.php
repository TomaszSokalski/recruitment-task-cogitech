<?php

namespace App\TypicodeApi\Mapper;

use App\Entity\Post;

class PostMapper
{
    public function mapDataToPostsWithAuthorName(array $posts, array $users): array
    {
        $updatedPosts = [];

        foreach ($posts as $post) {
            foreach ($users as $user) {
                if ($post['userId'] === $user['id']) {
                    $updatedPost = new Post();
                    $updatedPost->setTitle($post['title']);
                    $updatedPost->setBody($post['body']);
                    $updatedPost->setAuthor($user['name']);
                    $updatedPost->setUserId($post['userId']);
                    $updatedPosts[] = $updatedPost;
                }
            }
        }
        return $updatedPosts;
    }
}