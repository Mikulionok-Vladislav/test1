<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231027060627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE email DROP CONSTRAINT FK_E7927C748C03F15C');
        $this->addSql('ALTER TABLE email ALTER employee_id SET NOT NULL');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C748C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee ADD password VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE employee ADD roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE email DROP CONSTRAINT fk_e7927c748c03f15c');
        $this->addSql('ALTER TABLE email ALTER employee_id DROP NOT NULL');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT fk_e7927c748c03f15c FOREIGN KEY (employee_id) REFERENCES employee (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee DROP password');
        $this->addSql('ALTER TABLE employee DROP roles');
    }
}
