<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240819221645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE developer ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE developer ADD CONSTRAINT FK_65FB8B9A166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_65FB8B9A166D1F9C ON developer (project_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE developer DROP CONSTRAINT FK_65FB8B9A166D1F9C');
        $this->addSql('DROP INDEX IDX_65FB8B9A166D1F9C');
        $this->addSql('ALTER TABLE developer DROP project_id');
    }
}
