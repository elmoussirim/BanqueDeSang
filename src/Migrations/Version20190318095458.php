<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190318095458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE demande_sang ADD nom_service_id INT NOT NULL, DROP nom_service');
        $this->addSql('ALTER TABLE demande_sang ADD CONSTRAINT FK_5ED6B17EEC132991 FOREIGN KEY (nom_service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_5ED6B17EEC132991 ON demande_sang (nom_service_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE demande_sang DROP FOREIGN KEY FK_5ED6B17EEC132991');
        $this->addSql('DROP INDEX IDX_5ED6B17EEC132991 ON demande_sang');
        $this->addSql('ALTER TABLE demande_sang ADD nom_service VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nom_service_id');
    }
}
