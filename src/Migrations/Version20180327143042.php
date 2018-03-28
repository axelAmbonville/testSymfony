<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180327143042 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partie ADD tour_id INT DEFAULT NULL, DROP tour');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3D15ED8D43 FOREIGN KEY (tour_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_59B1F3D15ED8D43 ON partie (tour_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3D15ED8D43');
        $this->addSql('DROP INDEX IDX_59B1F3D15ED8D43 ON partie');
        $this->addSql('ALTER TABLE partie ADD tour TEXT NOT NULL COLLATE utf8_unicode_ci, DROP tour_id');
    }
}
