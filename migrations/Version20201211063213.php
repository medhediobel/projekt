<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211063213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planes ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE planes ADD CONSTRAINT FK_F677FF0612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_F677FF0612469DE2 ON planes (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planes DROP FOREIGN KEY FK_F677FF0612469DE2');
        $this->addSql('DROP INDEX IDX_F677FF0612469DE2 ON planes');
        $this->addSql('ALTER TABLE planes DROP category_id');
    }
}
