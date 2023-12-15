<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostsController extends AbstractController
{
    #[Route('/posts', name: 'app_posts')]
    public function getPosts(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('posts/posts.html.twig', [
            'posts' => $posts,
        ]);
    }
}