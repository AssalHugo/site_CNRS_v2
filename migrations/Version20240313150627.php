<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313150627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe_localisations (employe_id INTEGER NOT NULL, localisations_id INTEGER NOT NULL, PRIMARY KEY(employe_id, localisations_id), CONSTRAINT FK_6B3955B21B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_6B3955B21E0EE9AA FOREIGN KEY (localisations_id) REFERENCES localisations (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_6B3955B21B65292 ON employe_localisations (employe_id)');
        $this->addSql('CREATE INDEX IDX_6B3955B21E0EE9AA ON employe_localisations (localisations_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE employe_localisations');
    }
}
