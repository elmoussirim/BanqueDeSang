<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190413164815 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE malade CHANGE groupe_sanguins groupe_sanguin VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE poche CHANGE groupe_sanguins groupe_sanguin VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE serologie CHANGE groupe_sanguins groupe_sanguin VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE malade CHANGE groupe_sanguin groupe_sanguins VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE poche CHANGE groupe_sanguin groupe_sanguins VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE serologie CHANGE groupe_sanguin groupe_sanguins VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
