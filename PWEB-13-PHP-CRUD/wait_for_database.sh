#!/bin/bash
./wait_for_it.sh -h $DB_HOST -p $MYSQL_PORT -t 30 -s && {
    mysql --password="$MYSQL_ROOT_PASSWORD" --execute="GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'%';
    "

    mysql --user="$MYSQL_USER" --password="$MYSQL_PASSWORD" --execute="CONNECT $MYSQL_DATABASE;
    DROP TABLE IF EXISTS calon_siswa;
    DROP TABLE IF EXISTS pegawai;
    
    CREATE TABLE pegawai (
        id INT NOT NULL AUTO_INCREMENT,
        nama VARCHAR(255) NOT NULL,
        jabatan VARCHAR(255) NOT NULL,
        PRIMARY KEY(id)
    );

    CREATE TABLE calon_siswa (
        id INT NOT NULL AUTO_INCREMENT,  
        nama VARCHAR(255) NOT NULL,  
        alamat VARCHAR(255) NOT NULL,  
        jenis_kelamin VARCHAR(16) NOT NULL,  
        agama VARCHAR(16) NOT NULL,  
        sekolah_asal VARCHAR(64) NOT NULL,
        image MEDIUMBLOB NOT NULL,
        image_type VARCHAR(100) NOT NULL,
        pegawai_pendaftar_id INT NOT NULL,
        FOREIGN KEY(pegawai_pendaftar_id) REFERENCES pegawai(id),
        PRIMARY KEY (id)
    );

    INSERT INTO pegawai (nama, jabatan) VALUE ('Putu Dongklek Tangkas', 'Admin Registrasi');
    INSERT INTO pegawai (nama, jabatan) VALUE ('Asep Rinaldi', 'Admin Registrasi');
    INSERT INTO pegawai (nama, jabatan) VALUE ('Victoria Wu', 'Admin Registrasi');
    INSERT INTO pegawai (nama, jabatan) VALUE ('Grace Chen', 'Admin Registrasi');
    INSERT INTO pegawai (nama, jabatan) VALUE ('Muhammad Bima Jago', 'Admin Registrasi');

    SHOW TABLES;
    "
}