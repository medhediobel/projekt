<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201226163613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE behoerde (id INT AUTO_INCREMENT NOT NULL, typ VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, benutzername VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beteiligte (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, nachname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, benutzername VARCHAR(255) NOT NULL, telefon VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE verfahren (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, nummer INT NOT NULL, art VARCHAR(255) NOT NULL, groesse VARCHAR(255) NOT NULL, kosten VARCHAR(255) NOT NULL, finanzierung VARCHAR(255) NOT NULL, ort VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vertreta (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, nachname VARCHAR(255) NOT NULL, stelle VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planes ADD auszuge VARCHAR(255) NOT NULL, ADD auslage VARCHAR(255) NOT NULL, ADD plan_nach VARCHAR(255) NOT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD reference VARCHAR(255) NOT NULL, ADD telefon INT NOT NULL, ADD benutzname VARCHAR(255) NOT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE behoerde');
        $this->addSql('DROP TABLE beteiligte');
        $this->addSql('DROP TABLE verfahren');
        $this->addSql('DROP TABLE vertreta');
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planes DROP auszuge, DROP auslage, DROP plan_nach, CHANGE category_id category_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP reference, DROP telefon, DROP benutzname, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
