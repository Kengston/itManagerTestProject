<?php

namespace App\DataFixtures;

use App\Service\DeveloperService;
use App\Service\ProjectService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(
        private ProjectService $projectService,
        private DeveloperService $developerService)
    { }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $project = $this->projectService->createProject('Zakaz', 'McDonalds');
        $developer = $this->developerService->hireDeveloper('John', 'Cashier', 'john11@gmail.com', '+88005553535');

        $this->developerService->assignProject($developer, $project);
    }
}
