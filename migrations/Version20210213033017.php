<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210213033017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE puesto_trabajo (id INT AUTO_INCREMENT NOT NULL, cliente_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, zona VARCHAR(50) DEFAULT NULL, INDEX IDX_DBFAC776DE734E51 (cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE puesto_trabajo_usuario (puesto_trabajo_id INT NOT NULL, usuario_id INT NOT NULL, INDEX IDX_7F841C05EFEE8B82 (puesto_trabajo_id), INDEX IDX_7F841C05DB38439E (usuario_id), PRIMARY KEY(puesto_trabajo_id, usuario_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reporte (id INT AUTO_INCREMENT NOT NULL, tipo_id INT NOT NULL, ubicacion_id INT DEFAULT NULL, usuario_id INT NOT NULL, descripcion LONGTEXT DEFAULT NULL, INDEX IDX_5CB1214A9276E6C (tipo_id), UNIQUE INDEX UNIQ_5CB121457E759E8 (ubicacion_id), INDEX IDX_5CB1214DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_reporte (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(1) NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ubicacion (id INT AUTO_INCREMENT NOT NULL, latitud DOUBLE PRECISION NOT NULL, longitud DOUBLE PRECISION NOT NULL, velocidad DOUBLE PRECISION DEFAULT NULL, precisiongps DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE puesto_trabajo ADD CONSTRAINT FK_DBFAC776DE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE puesto_trabajo_usuario ADD CONSTRAINT FK_7F841C05EFEE8B82 FOREIGN KEY (puesto_trabajo_id) REFERENCES puesto_trabajo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE puesto_trabajo_usuario ADD CONSTRAINT FK_7F841C05DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reporte ADD CONSTRAINT FK_5CB1214A9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo_reporte (id)');
        $this->addSql('ALTER TABLE reporte ADD CONSTRAINT FK_5CB121457E759E8 FOREIGN KEY (ubicacion_id) REFERENCES ubicacion (id)');
        $this->addSql('ALTER TABLE reporte ADD CONSTRAINT FK_5CB1214DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE foto ADD reporte_id INT DEFAULT NULL, CHANGE extension extension VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE foto ADD CONSTRAINT FK_EADC3BE592CA572 FOREIGN KEY (reporte_id) REFERENCES reporte (id)');
        $this->addSql('CREATE INDEX IDX_EADC3BE592CA572 ON foto (reporte_id)');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE puesto_trabajo DROP FOREIGN KEY FK_DBFAC776DE734E51');
        $this->addSql('ALTER TABLE puesto_trabajo_usuario DROP FOREIGN KEY FK_7F841C05EFEE8B82');
        $this->addSql('ALTER TABLE foto DROP FOREIGN KEY FK_EADC3BE592CA572');
        $this->addSql('ALTER TABLE reporte DROP FOREIGN KEY FK_5CB1214A9276E6C');
        $this->addSql('ALTER TABLE reporte DROP FOREIGN KEY FK_5CB121457E759E8');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE puesto_trabajo');
        $this->addSql('DROP TABLE puesto_trabajo_usuario');
        $this->addSql('DROP TABLE reporte');
        $this->addSql('DROP TABLE tipo_reporte');
        $this->addSql('DROP TABLE ubicacion');
        $this->addSql('DROP INDEX IDX_EADC3BE592CA572 ON foto');
        $this->addSql('ALTER TABLE foto DROP reporte_id, CHANGE extension extension VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE personal CHANGE id_personal id_personal BIGINT NOT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE personal personal BIGINT DEFAULT NULL');
    }
}
