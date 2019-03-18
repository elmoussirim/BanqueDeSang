<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190223045115 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE test_sang_donneur (id INT AUTO_INCREMENT NOT NULL, date_de_jour DATETIME NOT NULL, numero_poche INT NOT NULL, a_utiliser_avant DATETIME NOT NULL, nom_prenom_donneur VARCHAR(255) NOT NULL, numero_cin_donneur INT NOT NULL, groupes_sanguins LONGTEXT NOT NULL, groupes_sanguins_test_2 LONGTEXT NOT NULL, fait_par VARCHAR(255) NOT NULL, fait_par_test2 VARCHAR(255) NOT NULL, aghb1 VARCHAR(255) DEFAULT NULL, achcv VARCHAR(255) DEFAULT NULL, tpha VARCHAR(255) DEFAULT NULL, hiv VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE test_sang_donneur');
    }
}
