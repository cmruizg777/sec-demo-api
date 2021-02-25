<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210223195951 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asignacion CHANGE horario_id horario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE foto CHANGE reporte_id reporte_id INT DEFAULT NULL, CHANGE extension extension VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE provincia CHANGE zona_id zona_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE puesto_trabajo CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL, CHANGE provincia_id provincia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reporte CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reporte ADD CONSTRAINT FK_5CB12145035E9DA FOREIGN KEY (puesto_id) REFERENCES puesto_trabajo (id)');
        $this->addSql('CREATE INDEX IDX_5CB12145035E9DA ON reporte (puesto_id)');
        $this->addSql('ALTER TABLE ubicacion CHANGE velocidad velocidad DOUBLE PRECISION DEFAULT NULL, CHANGE precisiongps precisiongps DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE personal personal BIGINT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asignacion CHANGE horario_id horario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE foto CHANGE reporte_id reporte_id INT DEFAULT NULL, CHANGE extension extension VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE provincia CHANGE zona_id zona_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE puesto_trabajo CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL, CHANGE provincia_id provincia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reporte DROP FOREIGN KEY FK_5CB12145035E9DA');
        $this->addSql('DROP INDEX IDX_5CB12145035E9DA ON reporte');
        $this->addSql('ALTER TABLE reporte DROP puesto_id, DROP fecha, CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ubicacion CHANGE velocidad velocidad DOUBLE PRECISION DEFAULT \'NULL\', CHANGE precisiongps precisiongps DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE usuario CHANGE personal personal BIGINT DEFAULT NULL');
    }
}
