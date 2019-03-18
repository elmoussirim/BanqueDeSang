<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190308201431 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poche_en_attente ADD statut INT NOT NULL');
        $this->addSql('ALTER TABLE poche_entree CHANGE statu statut INT NOT NULL');
        $this->addSql('ALTER TABLE serologie CHANGE statu statut INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poche_en_attente DROP statut');
        $this->addSql('ALTER TABLE poche_entree CHANGE statut statu INT NOT NULL');
        $this->addSql('ALTER TABLE serologie CHANGE statut statu INT NOT NULL');
    }
}
