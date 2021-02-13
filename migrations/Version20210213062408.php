<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210213062408 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE foto CHANGE reporte_id reporte_id INT DEFAULT NULL, CHANGE extension extension VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE provincia CHANGE zona_id zona_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE puesto_trabajo ADD provincia_id INT DEFAULT NULL, DROP zona, DROP provincia, CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE puesto_trabajo ADD CONSTRAINT FK_DBFAC7764E7121AF FOREIGN KEY (provincia_id) REFERENCES provincia (id)');
        $this->addSql('CREATE INDEX IDX_DBFAC7764E7121AF ON puesto_trabajo (provincia_id)');
        $this->addSql('ALTER TABLE reporte CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ubicacion CHANGE velocidad velocidad DOUBLE PRECISION DEFAULT NULL, CHANGE precisiongps precisiongps DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE personal personal BIGINT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE foto CHANGE reporte_id reporte_id INT DEFAULT NULL, CHANGE extension extension VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE provincia CHANGE zona_id zona_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE puesto_trabajo DROP FOREIGN KEY FK_DBFAC7764E7121AF');
        $this->addSql('DROP INDEX IDX_DBFAC7764E7121AF ON puesto_trabajo');
        $this->addSql('ALTER TABLE puesto_trabajo ADD zona VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, ADD provincia VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP provincia_id, CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reporte CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ubicacion CHANGE velocidad velocidad DOUBLE PRECISION DEFAULT \'NULL\', CHANGE precisiongps precisiongps DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE usuario CHANGE personal personal BIGINT DEFAULT NULL');
    }
}
