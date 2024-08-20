<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\DeveloperRepository;
use App\Repository\ProjectRepository;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(DeveloperRepository $developerRepository, ProjectRepository $projectRepository): Response
    {
        dump($developerRepository->getNumberOfDevelopers());
        dump($projectRepository->getNumberOfProjects());
        dump($projectRepository->getDevelopersPerProject());
        die();

    }
}
