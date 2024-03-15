<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240315150808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__employe AS SELECT id, nom, prenom, photo, sync_reseda, page_pro, idhal, orcid, mail_secondaire, telephone_secondaire, annee_naissance FROM employe');
        $this->addSql('DROP TABLE employe');
        $this->addSql('CREATE TABLE employe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(64) NOT NULL, prenom VARCHAR(64) NOT NULL, photo VARCHAR(255) DEFAULT NULL, sync_reseda BOOLEAN NOT NULL, page_pro VARCHAR(255) DEFAULT NULL, idhal VARCHAR(50) DEFAULT NULL, orcid VARCHAR(50) DEFAULT NULL, mail_secondaire VARCHAR(128) DEFAULT NULL, telephone_secondaire VARCHAR(10) DEFAULT NULL, annee_naissance INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO employe (id, nom, prenom, photo, sync_reseda, page_pro, idhal, orcid, mail_secondaire, telephone_secondaire, annee_naissance) SELECT id, nom, prenom, photo, sync_reseda, page_pro, idhal, orcid, mail_secondaire, telephone_secondaire, annee_naissance FROM __temp__employe');
        $this->addSql('DROP TABLE __temp__employe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__employe AS SELECT id, nom, prenom, photo, sync_reseda, page_pro, idhal, orcid, mail_secondaire, telephone_secondaire, annee_naissance FROM employe');
        $this->addSql('DROP TABLE employe');
        $this->addSql('CREATE TABLE employe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(64) NOT NULL, prenom VARCHAR(64) NOT NULL, photo VARCHAR(255) DEFAULT NULL, sync_reseda BOOLEAN NOT NULL, page_pro VARCHAR(255) DEFAULT NULL, idhal INTEGER DEFAULT NULL, orcid INTEGER DEFAULT NULL, mail_secondaire VARCHAR(128) DEFAULT NULL, telephone_secondaire VARCHAR(10) DEFAULT NULL, annee_naissance INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO employe (id, nom, prenom, photo, sync_reseda, page_pro, idhal, orcid, mail_secondaire, telephone_secondaire, annee_naissance) SELECT id, nom, prenom, photo, sync_reseda, page_pro, idhal, orcid, mail_secondaire, telephone_secondaire, annee_naissance FROM __temp__employe');
        $this->addSql('DROP TABLE __temp__employe');
    }
}
