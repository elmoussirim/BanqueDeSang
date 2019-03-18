<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190318101854 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE demande_sang DROP FOREIGN KEY FK_5ED6B17E48D62931');
        $this->addSql('DROP INDEX IDX_5ED6B17E48D62931 ON demande_sang');
        $this->addSql('ALTER TABLE demande_sang CHANGE id_service_id service_id INT NOT NULL');
        $this->addSql('ALTER TABLE demande_sang ADD CONSTRAINT FK_5ED6B17EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_5ED6B17EED5CA9E6 ON demande_sang (service_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE demande_sang DROP FOREIGN KEY FK_5ED6B17EED5CA9E6');
        $this->addSql('DROP INDEX IDX_5ED6B17EED5CA9E6 ON demande_sang');
        $this->addSql('ALTER TABLE demande_sang CHANGE service_id id_service_id INT NOT NULL');
        $this->addSql('ALTER TABLE demande_sang ADD CONSTRAINT FK_5ED6B17E48D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_5ED6B17E48D62931 ON demande_sang (id_service_id)');
    }
}
