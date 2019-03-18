<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190218001514 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donneur CHANGE dons_anterieurs_volontaires dons_anterieurs_volontaires INT DEFAULT NULL, CHANGE dons_anterieurs_familiaux dons_anterieurs_familiaux INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donneur CHANGE dons_anterieurs_volontaires dons_anterieurs_volontaires VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE dons_anterieurs_familiaux dons_anterieurs_familiaux VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
