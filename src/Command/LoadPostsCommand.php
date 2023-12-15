<?php

namespace App\Command;

use App\TypicodeApi\Mapper\PostMapper;
use App\TypicodeApi\TypicodeApiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:load-posts',
    description: 'Fetch posts from external API and save to database.',
)]
class LoadPostsCommand extends Command
{
    public function __construct(
        private readonly TypicodeApiRepository $apiRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly PostMapper $postMapper
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $posts = $this->apiRepository->getPostsCollection();
        $users = $this->apiRepository->getUsersCollection();

        $data = $this->postMapper->mapDataToPostsWithAuthorName($posts, $users);

        foreach ($data as $post) {
            $this->entityManager->persist($post);
        }

        $this->entityManager->flush();
        $io->write('Posts loaded to database');

        return Command::SUCCESS;
    }
}