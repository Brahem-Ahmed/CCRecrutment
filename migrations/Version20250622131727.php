<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250622131727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, cv VARCHAR(255) NOT NULL, lettre_motivation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, candidat_id INT NOT NULL, offre_id INT DEFAULT NULL, date_candidature DATETIME NOT NULL, cv_joint VARCHAR(255) NOT NULL, lettre_motivation_joint VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_E33BD3B88D0EB82 (candidat_id), INDEX IDX_E33BD3B84CC8505A (offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, secteur VARCHAR(255) NOT NULL, site_web VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE offre_emploi (id INT AUTO_INCREMENT NOT NULL, my_entreprise_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, type_contrat VARCHAR(50) NOT NULL, lieu VARCHAR(255) NOT NULL, date_publication DATETIME NOT NULL, date_expiration DATETIME NOT NULL, INDEX IDX_132AD0D176DBDF4B (my_entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, date_inscription DATETIME NOT NULL, etat TINYINT(1) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B88D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B84CC8505A FOREIGN KEY (offre_id) REFERENCES offre_emploi (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre_emploi ADD CONSTRAINT FK_132AD0D176DBDF4B FOREIGN KEY (my_entreprise_id) REFERENCES entreprise (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B88D0EB82
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B84CC8505A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre_emploi DROP FOREIGN KEY FK_132AD0D176DBDF4B
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE candidat
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE candidature
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE entreprise
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE offre_emploi
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
    }
}
