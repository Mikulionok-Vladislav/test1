<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018073705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phone DROP CONSTRAINT FK_444F97DD8C03F15C');
        $this->addSql('ALTER TABLE phone ALTER employee_id SET NOT NULL');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DD8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE phone DROP CONSTRAINT fk_444f97dd8c03f15c');
        $this->addSql('ALTER TABLE phone ALTER employee_id DROP NOT NULL');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT fk_444f97dd8c03f15c FOREIGN KEY (employee_id) REFERENCES employee (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
