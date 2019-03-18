<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190305183643 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE serologie ADD nom_donneur VARCHAR(255) NOT NULL, ADD prenom_donneur VARCHAR(255) NOT NULL, ADD cin_donneur VARCHAR(255) NOT NULL, DROP numero_poche, DROP nom_prenom_donneur, CHANGE numero_cin_donneur n_ordre INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE serologie ADD numero_poche VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD nom_prenom_donneur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nom_donneur, DROP prenom_donneur, DROP cin_donneur, CHANGE n_ordre numero_cin_donneur INT NOT NULL');
    }
}
