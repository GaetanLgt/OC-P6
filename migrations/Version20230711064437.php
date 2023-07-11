<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711064437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE figure_category (figure_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_5F0A4745C011B5 (figure_id), INDEX IDX_5F0A47412469DE2 (category_id), PRIMARY KEY(figure_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE figure_category ADD CONSTRAINT FK_5F0A4745C011B5 FOREIGN KEY (figure_id) REFERENCES figure (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE figure_category ADD CONSTRAINT FK_5F0A47412469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE figure DROP groupe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE figure_category DROP FOREIGN KEY FK_5F0A4745C011B5');
        $this->addSql('ALTER TABLE figure_category DROP FOREIGN KEY FK_5F0A47412469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE figure_category');
        $this->addSql('ALTER TABLE figure ADD groupe VARCHAR(255) NOT NULL');
    }
}
