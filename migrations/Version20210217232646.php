<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217232646 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE puesto_trabajo_usuario');
        $this->addSql('ALTER TABLE asignacion CHANGE horario_id horario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE foto CHANGE reporte_id reporte_id INT DEFAULT NULL, CHANGE extension extension VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE provincia CHANGE zona_id zona_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE puesto_trabajo CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL, CHANGE provincia_id provincia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reporte CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ubicacion CHANGE velocidad velocidad DOUBLE PRECISION DEFAULT NULL, CHANGE precisiongps precisiongps DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE personal personal BIGINT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE puesto_trabajo_usuario (puesto_trabajo_id INT NOT NULL, usuario_id INT NOT NULL, INDEX IDX_7F841C05DB38439E (usuario_id), INDEX IDX_7F841C05EFEE8B82 (puesto_trabajo_id), PRIMARY KEY(puesto_trabajo_id, usuario_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE puesto_trabajo_usuario ADD CONSTRAINT FK_7F841C05DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE puesto_trabajo_usuario ADD CONSTRAINT FK_7F841C05EFEE8B82 FOREIGN KEY (puesto_trabajo_id) REFERENCES puesto_trabajo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE asignacion CHANGE horario_id horario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE foto CHANGE reporte_id reporte_id INT DEFAULT NULL, CHANGE extension extension VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE provincia CHANGE zona_id zona_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE puesto_trabajo CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL, CHANGE provincia_id provincia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reporte CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ubicacion CHANGE velocidad velocidad DOUBLE PRECISION DEFAULT \'NULL\', CHANGE precisiongps precisiongps DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE usuario CHANGE personal personal BIGINT DEFAULT NULL');
    }
}
