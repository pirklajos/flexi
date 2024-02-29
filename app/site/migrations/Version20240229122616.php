<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229122616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intervention_tooth (intervention_id INT NOT NULL, tooth_id INT NOT NULL, INDEX IDX_97E193468EAE3863 (intervention_id), INDEX IDX_97E19346A2A44441 (tooth_id), PRIMARY KEY(intervention_id, tooth_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE intervention_tooth ADD CONSTRAINT FK_97E193468EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention_tooth ADD CONSTRAINT FK_97E19346A2A44441 FOREIGN KEY (tooth_id) REFERENCES tooth (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tooth DROP FOREIGN KEY FK_E2848FC28EAE3863');
        $this->addSql('DROP INDEX IDX_E2848FC28EAE3863 ON tooth');
        $this->addSql('ALTER TABLE tooth DROP intervention_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervention_tooth DROP FOREIGN KEY FK_97E193468EAE3863');
        $this->addSql('ALTER TABLE intervention_tooth DROP FOREIGN KEY FK_97E19346A2A44441');
        $this->addSql('DROP TABLE intervention_tooth');
        $this->addSql('ALTER TABLE tooth ADD intervention_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tooth ADD CONSTRAINT FK_E2848FC28EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('CREATE INDEX IDX_E2848FC28EAE3863 ON tooth (intervention_id)');
    }
}
