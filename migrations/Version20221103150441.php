<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221103150441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flash ADD drawer_id INT NOT NULL');
        $this->addSql('ALTER TABLE flash ADD CONSTRAINT FK_AFCE5F033BF1A4CB FOREIGN KEY (drawer_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AFCE5F033BF1A4CB ON flash (drawer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flash DROP FOREIGN KEY FK_AFCE5F033BF1A4CB');
        $this->addSql('DROP INDEX IDX_AFCE5F033BF1A4CB ON flash');
        $this->addSql('ALTER TABLE flash DROP drawer_id');
    }
}
