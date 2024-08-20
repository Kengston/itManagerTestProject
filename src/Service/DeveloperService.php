<?php

namespace App\Service;

use App\Entity\Developer;
use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;

class DeveloperService
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function hireDeveloper(string $fullName, string $jobTitle, string $email, string $phoneNumber): Developer
    {
        $developer = new Developer();

        $developer->setFullName($fullName);

        $developer->setJobTitle($jobTitle);

        $developer->setEmail($email);

        $developer->setPhoneNumber($phoneNumber);

        $this->em->persist($developer);
        $this->em->flush();

        return $developer;
    }

    public function fireDeveloper(Developer $developer): void
    {
        $this->em->remove($developer);
        $this->em->flush();
    }

    public function assignProject(Developer $developer, Project $project): Developer
    {
        $developer->setProject($project);

        $this->em->persist($developer);
        $this->em->flush();

        return $developer;
    }

    public function assignJobTitle(Developer $developer, string $jobTitle): void
    {
        $developer->setJobTitle($jobTitle);

        $this->em->persist($developer);
        $this->em->flush();
    }

}