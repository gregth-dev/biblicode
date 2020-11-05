<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201105152911 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE code_tag');
        $this->addSql('ALTER TABLE code ADD tags_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE code ADD CONSTRAINT FK_771530988D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tag (id)');
        $this->addSql('CREATE INDEX IDX_771530988D7B4FB4 ON code (tags_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE code_tag (code_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_EBA9802927DAFE17 (code_id), INDEX IDX_EBA98029BAD26311 (tag_id), PRIMARY KEY(code_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE code_tag ADD CONSTRAINT FK_EBA9802927DAFE17 FOREIGN KEY (code_id) REFERENCES code (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE code_tag ADD CONSTRAINT FK_EBA98029BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE code DROP FOREIGN KEY FK_771530988D7B4FB4');
        $this->addSql('DROP INDEX IDX_771530988D7B4FB4 ON code');
        $this->addSql('ALTER TABLE code DROP tags_id');
    }
}
