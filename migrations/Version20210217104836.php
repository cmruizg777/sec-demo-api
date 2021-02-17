<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217104836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE asignacion (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, horario_id INT DEFAULT NULL, puesto_id INT NOT NULL, inicio DATE NOT NULL, fin DATE NOT NULL, INDEX IDX_25629271DB38439E (usuario_id), INDEX IDX_256292714959F1BA (horario_id), INDEX IDX_256292715035E9DA (puesto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asignacion_dia (asignacion_id INT NOT NULL, dia_id INT NOT NULL, INDEX IDX_42A55431D3B92F9E (asignacion_id), INDEX IDX_42A55431AC1F7597 (dia_id), PRIMARY KEY(asignacion_id, dia_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dia (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(20) NOT NULL, codigo VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horario (id INT AUTO_INCREMENT NOT NULL, entrada TIME NOT NULL, salida TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asignacion ADD CONSTRAINT FK_25629271DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE asignacion ADD CONSTRAINT FK_256292714959F1BA FOREIGN KEY (horario_id) REFERENCES horario (id)');
        $this->addSql('ALTER TABLE asignacion ADD CONSTRAINT FK_256292715035E9DA FOREIGN KEY (puesto_id) REFERENCES puesto_trabajo (id)');
        $this->addSql('ALTER TABLE asignacion_dia ADD CONSTRAINT FK_42A55431D3B92F9E FOREIGN KEY (asignacion_id) REFERENCES asignacion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE asignacion_dia ADD CONSTRAINT FK_42A55431AC1F7597 FOREIGN KEY (dia_id) REFERENCES dia (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE foto CHANGE reporte_id reporte_id INT DEFAULT NULL, CHANGE extension extension VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE provincia CHANGE zona_id zona_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE puesto_trabajo CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL, CHANGE provincia_id provincia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reporte CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_163233B420332D99 ON tipo_reporte (codigo)');
        $this->addSql('ALTER TABLE ubicacion CHANGE velocidad velocidad DOUBLE PRECISION DEFAULT NULL, CHANGE precisiongps precisiongps DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE personal personal BIGINT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asignacion_dia DROP FOREIGN KEY FK_42A55431D3B92F9E');
        $this->addSql('ALTER TABLE asignacion_dia DROP FOREIGN KEY FK_42A55431AC1F7597');
        $this->addSql('ALTER TABLE asignacion DROP FOREIGN KEY FK_256292714959F1BA');
        $this->addSql('DROP TABLE asignacion');
        $this->addSql('DROP TABLE asignacion_dia');
        $this->addSql('DROP TABLE dia');
        $this->addSql('DROP TABLE horario');
        $this->addSql('ALTER TABLE foto CHANGE reporte_id reporte_id INT DEFAULT NULL, CHANGE extension extension VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE provincia CHANGE zona_id zona_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE puesto_trabajo CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL, CHANGE provincia_id provincia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reporte CHANGE ubicacion_id ubicacion_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_163233B420332D99 ON tipo_reporte');
        $this->addSql('ALTER TABLE ubicacion CHANGE velocidad velocidad DOUBLE PRECISION DEFAULT \'NULL\', CHANGE precisiongps precisiongps DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE usuario CHANGE personal personal BIGINT DEFAULT NULL');
    }
}
