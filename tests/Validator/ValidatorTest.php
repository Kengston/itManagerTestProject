<?php

namespace App\Tests\Validator;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Developer;
use App\Entity\Project;

class ValidatorTest extends KernelTestCase
{
    private $validator;
    private $entityManager;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $this->validator = $container->get('validator');
        $this->entityManager = $container->get('doctrine')->getManager();

        $project = new Project();
        $project->setName('TestProject');
        $project->setClient('Test Client');
        $this->entityManager->persist($project);

        $developer = new Developer();
        $developer->setFullName('Test Developer');
        $developer->setJobTitle('Test Job Title');
        $developer->setEmail('test@gmail.com');
        $developer->setPhoneNumber('123-456-7890');
        $this->entityManager->persist($developer);

        $this->entityManager->flush();
    }

    public function testDeveloperWithExistingProject()
    {
        $project = $this->entityManager->getRepository(Project::class)->findOneBy(['name' => 'TestProject']);

        $developer = new Developer();
        $developer->setProject($project);


        $errors = $this->validator->validate($developer);

        // assert that there are no errors
        $this->assertCount(0, $errors);
    }

    public function testDeveloperWithNonExistingProject()
    {
        $project = new Project();
        $developer = new Developer();
        $developer->setProject($project);

        $errors = $this->validator->validate($developer);

        // assert that there are errors (at least one - project doesn't exist)
        $this->assertGreaterThan(0, count($errors));

        // Check if the error message is what we expect.
        // This assumes that the only violation is about the project; if there are other violations, this might fail.
        $this->assertEquals('The Project with id "{{ value }}" does not exist.', $errors->get(0)->getMessage());
    }
}