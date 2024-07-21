CREATE DATABASE profs_haroun20240724;

USE profs_haroun20240724;

CREATE TABLE enseignants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo LONGBLOB,
    kode VARCHAR(255),
    type VARCHAR(255),
    discipline VARCHAR(255),
    telephone VARCHAR(255),
    kourriel VARCHAR(255),
    residence VARCHAR(255),
    x VARCHAR(255),
    linkedin VARCHAR(255),
    insta VARCHAR(255),
    tiktok VARCHAR(255),
    youtube VARCHAR(255)
);
