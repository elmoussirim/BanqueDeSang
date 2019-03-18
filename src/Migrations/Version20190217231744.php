<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190217231744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donneur ADD donneur_convocable VARCHAR(255) DEFAULT NULL, DROP piece_identite, CHANGE adresse_complete adresse_complete VARCHAR(255) NOT NULL, CHANGE profession profession VARCHAR(255) NOT NULL, CHANGE domaine_activite domaine_activite VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donneur ADD piece_identite VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP donneur_convocable, CHANGE adresse_complete adresse_complete LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE profession profession LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE domaine_activite domaine_activite LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
