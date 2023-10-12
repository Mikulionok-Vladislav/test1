<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231003075844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE office ALTER type TYPE VARCHAR(80)');
        $this->addSql('ALTER TABLE office ALTER numberofstaff TYPE VARCHAR(80)');
        $this->addSql('ALTER TABLE office ALTER phone_number TYPE VARCHAR(80)');
        $this->addSql('ALTER TABLE office ALTER email TYPE VARCHAR(80)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE office ALTER type TYPE VARCHAR(30)');
        $this->addSql('ALTER TABLE office ALTER numberofstaff TYPE VARCHAR(30)');
        $this->addSql('ALTER TABLE office ALTER phone_number TYPE VARCHAR(30)');
        $this->addSql('ALTER TABLE office ALTER email TYPE VARCHAR(30)');
    }
}
