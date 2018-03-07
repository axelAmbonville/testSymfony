<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180307095132 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objectif ADD valeur INT DEFAULT NULL, ADD image TINYTEXT NOT NULL');
        $this->addSql('ALTER TABLE partie ADD carte_rejected INT NOT NULL, ADD j1_id INT NOT NULL, ADD j2_id INT NOT NULL, ADD main_j1 TEXT NOT NULL, ADD main_j2 TEXT NOT NULL, ADD carte_placed_j1 TEXT NOT NULL, ADD carte_placed_j2 TEXT NOT NULL, ADD score_j1 INT NOT NULL, ADD score_j2 INT NOT NULL, ADD tour INT NOT NULL, ADD manche INT NOT NULL, ADD pioche TEXT NOT NULL, ADD objectifs TEXT NOT NULL, ADD actions_j1 TEXT NOT NULL, ADD actions_j2 TEXT NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objectif DROP valeur, DROP image');
        $this->addSql('ALTER TABLE partie DROP carte_rejected, DROP j1_id, DROP j2_id, DROP main_j1, DROP main_j2, DROP carte_placed_j1, DROP carte_placed_j2, DROP score_j1, DROP score_j2, DROP tour, DROP manche, DROP pioche, DROP objectifs, DROP actions_j1, DROP actions_j2');
    }
}
