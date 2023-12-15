<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class ListController extends AbstractController
{
    #[Route('/lista', name: 'app_list')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('list/list.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/lista/{id}', name: 'app_list_delete')]
    public function editor_delete(int $id, PostRepository $postRepository, Request $request): Response
    {
        $post = $postRepository->find($id);
        $postRepository->remove($post, true);

        return $this->redirect($request->headers->get("referer"));
    }
}