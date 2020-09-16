<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200916112104 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, color VARCHAR(7) NOT NULL, image VARCHAR(255) DEFAULT NULL, is_valid TINYINT(1) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sheet (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, language_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, INDEX IDX_873C91E2F675F31B (author_id), INDEX IDX_873C91E282F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tutorial (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, language_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, INDEX IDX_C66BFFE9F675F31B (author_id), INDEX IDX_C66BFFE982F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sheet ADD CONSTRAINT FK_873C91E2F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sheet ADD CONSTRAINT FK_873C91E282F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE tutorial ADD CONSTRAINT FK_C66BFFE9F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tutorial ADD CONSTRAINT FK_C66BFFE982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sheet DROP FOREIGN KEY FK_873C91E282F1BAF4');
        $this->addSql('ALTER TABLE tutorial DROP FOREIGN KEY FK_C66BFFE982F1BAF4');
        $this->addSql('ALTER TABLE sheet DROP FOREIGN KEY FK_873C91E2F675F31B');
        $this->addSql('ALTER TABLE tutorial DROP FOREIGN KEY FK_C66BFFE9F675F31B');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE sheet');
        $this->addSql('DROP TABLE tutorial');
        $this->addSql('DROP TABLE user');
    }
}
