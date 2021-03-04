<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201227031734 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planes ADD verfahren_id INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planes ADD CONSTRAINT FK_F677FF06BD3D1FC8 FOREIGN KEY (verfahren_id) REFERENCES verfahren (id)');
        $this->addSql('CREATE INDEX IDX_F677FF06BD3D1FC8 ON planes (verfahren_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE vertreta ADD behoerde_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vertreta ADD CONSTRAINT FK_62E74219DCAFC59C FOREIGN KEY (behoerde_id) REFERENCES behoerde (id)');
        $this->addSql('CREATE INDEX IDX_62E74219DCAFC59C ON vertreta (behoerde_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planes DROP FOREIGN KEY FK_F677FF06BD3D1FC8');
        $this->addSql('DROP INDEX IDX_F677FF06BD3D1FC8 ON planes');
        $this->addSql('ALTER TABLE planes DROP verfahren_id, CHANGE category_id category_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE vertreta DROP FOREIGN KEY FK_62E74219DCAFC59C');
        $this->addSql('DROP INDEX IDX_62E74219DCAFC59C ON vertreta');
        $this->addSql('ALTER TABLE vertreta DROP behoerde_id');
    }
}
