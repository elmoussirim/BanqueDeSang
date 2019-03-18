<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190305171612 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE poche_en_attente (id INT AUTO_INCREMENT NOT NULL, n_ordre INT NOT NULL, date DATETIME NOT NULL, nom_donneur VARCHAR(255) NOT NULL, prenom_donneur VARCHAR(255) NOT NULL, cin_donneur INT NOT NULL, preleveur VARCHAR(255) NOT NULL, cin_preleveur INT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE poche_apres_separation');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE poche_apres_separation (id INT AUTO_INCREMENT NOT NULL, n_ordre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, date DATETIME NOT NULL, nom_donneur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom_donneur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, cin_donneur INT NOT NULL, preleveur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, cin_preleveur INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE poche_en_attente');
    }
}
