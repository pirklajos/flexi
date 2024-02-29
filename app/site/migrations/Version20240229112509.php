<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229112509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, treatment_id INT NOT NULL, UNIQUE INDEX UNIQ_D11814AB471C0366 (treatment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB471C0366 FOREIGN KEY (treatment_id) REFERENCES treatment (id)');
        //$this->addSql('ALTER TABLE tooth ADD intervention_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE tooth ADD CONSTRAINT FK_E2848FC28EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('CREATE INDEX IDX_E2848FC28EAE3863 ON tooth (intervention_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE tooth DROP FOREIGN KEY FK_E2848FC28EAE3863');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB471C0366');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP INDEX IDX_E2848FC28EAE3863 ON tooth');
        //$this->addSql('ALTER TABLE tooth DROP intervention_id');
    }
}
