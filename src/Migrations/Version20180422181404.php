<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180422181404 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, firma VARCHAR(255) DEFAULT NULL, ust_id VARCHAR(255) DEFAULT NULL, vorname VARCHAR(255) NOT NULL, nachname VARCHAR(255) NOT NULL, strasse VARCHAR(255) NOT NULL, plz VARCHAR(255) NOT NULL, ort VARCHAR(255) NOT NULL, land VARCHAR(255) NOT NULL, telefon VARCHAR(255) NOT NULL, fax VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, passwort VARCHAR(255) NOT NULL, anrede TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE post');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, firma VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ust_id VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, vorname VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, nachname VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, strasse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, plz VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ort VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, land VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, telefon VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, fax VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, passwort VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, anrede TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE account');
    }
}
