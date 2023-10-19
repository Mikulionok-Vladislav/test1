<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017092530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cabinet_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE email_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE employee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE employee_product_cabinet_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE office_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE phone_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cabinet (id INT NOT NULL, office_id INT DEFAULT NULL, name VARCHAR(30) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4CED05B0FFA0C224 ON cabinet (office_id)');
        $this->addSql('CREATE TABLE email (id INT NOT NULL, employee_id INT DEFAULT NULL, email VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E7927C748C03F15C ON email (employee_id)');
        $this->addSql('CREATE TABLE employee (id INT NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, middlename VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE employee_product_cabinet (id INT NOT NULL, cabinet_id INT DEFAULT NULL, product_id INT DEFAULT NULL, employee_id INT DEFAULT NULL, discription VARCHAR(300) DEFAULT NULL, operation_time INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CD6DAAA4D351EC ON employee_product_cabinet (cabinet_id)');
        $this->addSql('CREATE INDEX IDX_CD6DAAA44584665A ON employee_product_cabinet (product_id)');
        $this->addSql('CREATE INDEX IDX_CD6DAAA48C03F15C ON employee_product_cabinet (employee_id)');
        $this->addSql('CREATE TABLE office (id INT NOT NULL, name VARCHAR(80) NOT NULL, address VARCHAR(80) NOT NULL, type VARCHAR(80) DEFAULT NULL, numberofstaff VARCHAR(80) DEFAULT NULL, phone_number VARCHAR(80) DEFAULT NULL, email VARCHAR(80) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE phone (id INT NOT NULL, employee_id INT DEFAULT NULL, phone VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_444F97DD8C03F15C ON phone (employee_id)');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(50) NOT NULL, price INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cabinet ADD CONSTRAINT FK_4CED05B0FFA0C224 FOREIGN KEY (office_id) REFERENCES office (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C748C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee_product_cabinet ADD CONSTRAINT FK_CD6DAAA4D351EC FOREIGN KEY (cabinet_id) REFERENCES cabinet (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee_product_cabinet ADD CONSTRAINT FK_CD6DAAA44584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee_product_cabinet ADD CONSTRAINT FK_CD6DAAA48C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DD8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE cabinet_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE email_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE employee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE employee_product_cabinet_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE office_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE phone_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('ALTER TABLE cabinet DROP CONSTRAINT FK_4CED05B0FFA0C224');
        $this->addSql('ALTER TABLE email DROP CONSTRAINT FK_E7927C748C03F15C');
        $this->addSql('ALTER TABLE employee_product_cabinet DROP CONSTRAINT FK_CD6DAAA4D351EC');
        $this->addSql('ALTER TABLE employee_product_cabinet DROP CONSTRAINT FK_CD6DAAA44584665A');
        $this->addSql('ALTER TABLE employee_product_cabinet DROP CONSTRAINT FK_CD6DAAA48C03F15C');
        $this->addSql('ALTER TABLE phone DROP CONSTRAINT FK_444F97DD8C03F15C');
        $this->addSql('DROP TABLE cabinet');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE employee_product_cabinet');
        $this->addSql('DROP TABLE office');
        $this->addSql('DROP TABLE phone');
        $this->addSql('DROP TABLE product');
    }
}
