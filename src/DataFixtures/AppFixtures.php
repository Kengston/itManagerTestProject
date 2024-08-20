<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Developer;
use App\Entity\Project;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $project = new Project();
        $project->setName('TestProject');
        $project->setClient('Test Client');
        $manager->persist($project);

        $developer = new Developer();
        $developer->setFullName('Test Developer');
        $developer->setJobTitle('Test Job Title');
        $developer->setEmail('test@gmail.com');
        $developer->setPhoneNumber('123-456-7890');

        $manager->persist($developer);

        $manager->flush();
    }
}
