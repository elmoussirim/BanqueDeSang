<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190225172303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE serologie (id INT AUTO_INCREMENT NOT NULL, date_de_jour DATETIME NOT NULL, numero_poche VARCHAR(255) NOT NULL, a_utiliser_avant DATETIME NOT NULL, nom_prenom_donneur VARCHAR(255) NOT NULL, numero_cin_donneur INT NOT NULL, groupe_sanguins VARCHAR(255) DEFAULT NULL, fait_par_1 VARCHAR(255) DEFAULT NULL, fait_par_2 VARCHAR(255) DEFAULT NULL, aghbr VARCHAR(255) DEFAULT NULL, achcv VARCHAR(255) DEFAULT NULL, tpha VARCHAR(255) DEFAULT NULL, hiv VARCHAR(255) DEFAULT NULL, resultat_serologie VARCHAR(255) DEFAULT NULL, statu INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fiche_de_donneur_de_sang CHANGE groupe groupe VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE serologie');
        $this->addSql('ALTER TABLE fiche_de_donneur_de_sang CHANGE groupe groupe LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
