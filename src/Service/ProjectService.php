<?php

namespace App\Service;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;

class ProjectService
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function createProject(string $name, string $client): Project
    {
        $project = new Project();
        $project->setName($name);
        $project->setClient($client);

        $this->em->persist($project);
        $this->em->flush();

        return $project;
    }

    public function closeProject(Project $project): Project
    {
        $project->setIsClosed(true);

        $this->em->persist($project);
        $this->em->flush();

        return $project;
    }
}