<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201104151651 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code_tags DROP FOREIGN KEY FK_5957FEE78D7B4FB4');
        $this->addSql('CREATE TABLE code_tag (code_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_EBA9802927DAFE17 (code_id), INDEX IDX_EBA98029BAD26311 (tag_id), PRIMARY KEY(code_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE code_tag ADD CONSTRAINT FK_EBA9802927DAFE17 FOREIGN KEY (code_id) REFERENCES code (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE code_tag ADD CONSTRAINT FK_EBA98029BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE code_tags');
        $this->addSql('DROP TABLE tags');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code_tag DROP FOREIGN KEY FK_EBA98029BAD26311');
        $this->addSql('CREATE TABLE code_tags (code_id INT NOT NULL, tags_id INT NOT NULL, INDEX IDX_5957FEE727DAFE17 (code_id), INDEX IDX_5957FEE78D7B4FB4 (tags_id), PRIMARY KEY(code_id, tags_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE code_tags ADD CONSTRAINT FK_5957FEE727DAFE17 FOREIGN KEY (code_id) REFERENCES code (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE code_tags ADD CONSTRAINT FK_5957FEE78D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE code_tag');
        $this->addSql('DROP TABLE tag');
    }
}
