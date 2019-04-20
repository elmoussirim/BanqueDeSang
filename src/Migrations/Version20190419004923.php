<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190419004923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE demande_sang ADD CONSTRAINT FK_5ED6B17EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_5ED6B17EED5CA9E6 ON demande_sang (service_id)');
        $this->addSql('ALTER TABLE malade DROP FOREIGN KEY FK_A5563102ED5CA9E6');
        $this->addSql('DROP INDEX IDX_A5563102ED5CA9E6 ON malade');
        $this->addSql('ALTER TABLE malade DROP service_id, DROP age, DROP adresse, DROP profession, DROP telephone');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE demande_sang DROP FOREIGN KEY FK_5ED6B17EED5CA9E6');
        $this->addSql('DROP INDEX IDX_5ED6B17EED5CA9E6 ON demande_sang');
        $this->addSql('ALTER TABLE malade ADD service_id INT NOT NULL, ADD age INT NOT NULL, ADD adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD profession VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD telephone INT NOT NULL');
        $this->addSql('ALTER TABLE malade ADD CONSTRAINT FK_A5563102ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_A5563102ED5CA9E6 ON malade (service_id)');
    }
}
