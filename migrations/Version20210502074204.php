<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210502074204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE child ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B35429A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_22B35429A76ED395 ON child (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DD62C21B');
        $this->addSql('DROP INDEX UNIQ_8D93D649DD62C21B ON user');
        $this->addSql('ALTER TABLE user ADD username VARCHAR(180) NOT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', DROP child_id, DROP user_name, CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B35429A76ED395');
        $this->addSql('DROP INDEX UNIQ_22B35429A76ED395 ON child');
        $this->addSql('ALTER TABLE child DROP user_id');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
        $this->addSql('ALTER TABLE user ADD child_id INT DEFAULT NULL, ADD user_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP username, DROP roles, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649DD62C21B ON user (child_id)');
    }
}
