<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228204635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tooth (id INT AUTO_INCREMENT NOT NULL, position VARCHAR(255) NOT NULL, position_numeric INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('INSERT INTO flexi.tooth (`position`,position_numeric) VALUES (\'Bal felső 8\',18),(\'Bal felső 7\',17),(\'Bal felső 6\',16),(\'Bal felső 5\',15),(\'Bal felső 4\',14),(\'Bal felső 3\',13),(\'Bal felső 2\',12),(\'Bal felső 1\',11);');
        $this->addSql('INSERT INTO flexi.tooth (`position`,position_numeric) VALUES (\'Jobb felső 1\',21), (\'Jobb felső 2\',22), (\'Jobb felső 3\',23), (\'Jobb felső 4\',24), (\'Jobb felső 5\',25), (\'Jobb felső 6\',26), (\'Jobb felső 7\',27), (\'Jobb felső 8\',28);');
        $this->addSql('INSERT INTO flexi.tooth (`position`,position_numeric) VALUES (\'Bal alsó 8\',48),(\'Bal alsó 7\',47),(\'Bal alsó 6\',46),(\'Bal alsó 5\',45),(\'Bal alsó 4\',44),(\'Bal alsó 3\',43),(\'Bal alsó 2\',42),(\'Bal alsó 1\',41);');
        $this->addSql('INSERT INTO flexi.tooth (`position`,position_numeric) VALUES (\'Jobb alsó 1\',31), (\'Jobb alsó 2\',32), (\'Jobb alsó 3\',33), (\'Jobb alsó 4\',34), (\'Jobb alsó 5\',35), (\'Jobb alsó 6\',36), (\'Jobb alsó 7\',37), (\'Jobb alsó 8\',38);');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tooth');
    }
}
