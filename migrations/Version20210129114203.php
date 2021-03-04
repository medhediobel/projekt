<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210129114203 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beteiligte ADD ordnum DOUBLE PRECISION NOT NULL, ADD wiederspruche LONGTEXT NOT NULL, ADD vollmacht LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE calendar ADD typ VARCHAR(255) NOT NULL, ADD tageszeit VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planes ADD lat DOUBLE PRECISION NOT NULL, ADD lng DOUBLE PRECISION NOT NULL, ADD link LONGTEXT NOT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE verfahren_id verfahren_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE vertreta CHANGE behoerde_id behoerde_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beteiligte DROP ordnum, DROP wiederspruche, DROP vollmacht');
        $this->addSql('ALTER TABLE calendar DROP typ, DROP tageszeit');
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planes DROP lat, DROP lng, DROP link, CHANGE category_id category_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE verfahren_id verfahren_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE vertreta CHANGE behoerde_id behoerde_id INT DEFAULT NULL');
    }
}
