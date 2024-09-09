
--TYPOLOGIE nombre de cylindres
CREATE TABLE TY_NOMBRE_CYLINDRE (
                                    id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                    NOMBRE_CYLINDRE INT NOT NULL -- Stocke le nombre de cylindres
);
INSERT INTO TY_NOMBRE_CYLINDRE (NOMBRE_CYLINDRE)
VALUES
    (1),
    (2),
    (3),
    (4),
    (5),
    (6),
    (8),
    (12),
    (16); -- Ajoute d'autres valeurs selon le besoin

--TYPOLOGIE combustion
CREATE TABLE TY_COMBUSTION (
                               id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                               NOM_COMBUSTION VARCHAR(50) NOT NULL-- Accepte des valeurs nulles
);
INSERT INTO TY_COMBUSTION (NOM_COMBUSTION)
VALUES
    ('essence'),
    ('diesel'); -- Insertion d'une valeur nulle

--TYPOLOGIE cycle moteur
CREATE TABLE TY_CYCLE_MOTEUR (
                                 id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                 NOM_CYCLE_MOTEUR INT NOT NULL-- Accepte des valeurs nulles
);
INSERT INTO TY_CYCLE_MOTEUR (NOM_CYCLE_MOTEUR)
VALUES
    (2),
    (4); -- Insertion d'une valeur nulle

--TYPOLOGIE alimentation
CREATE TABLE TY_ALIMENTATION (
                                 id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                 NOM_ALIMENTATION VARCHAR(50) NOT NULL-- Accepte des valeurs nulles
);
INSERT INTO TY_ALIMENTATION (NOM_ALIMENTATION)
VALUES
    ('Carburateur'),
    ('Injection directe'),
    ('Turbo'),
    ('Compresseur'); -- Insertion d'une valeur nulle

--TYPOLOGIE norme emission
CREATE TABLE TY_NORME_EMISSION (
                                   id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                   NOM_NORME VARCHAR(50) NOT NULL-- Accepte des valeurs nulles
);
INSERT INTO TY_NORME_EMISSION (NOM_NORME)
VALUES
    ('Euro 1'),
    ('Euro 2'),
    ('Euro 3'),
    ('Euro 4'),
    ('Euro 5'),
    ('Euro 6'),
    ('EPA Tier 1'),
    ('EPA Tier 2'),
    ('EPA Tier 3'),
    ('CARB'),
    ('BS6'),
    ('Euro VI'),
    ('EPA 2010'); -- Insertion d'une valeur nulle

--TYPOLOGIE transmission
CREATE TABLE TY_TRANSMISSION (
                                 id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                 NOM_TRANSMISSION VARCHAR(50) NOT NULL-- Accepte des valeurs nulles
);
INSERT INTO TY_TRANSMISSION (NOM_TRANSMISSION)
VALUES
    ('Manuelle'),
    ('Automatique'),
    ('Automatique double embrayage DCT'),
    ('Automatique double embrayage DSG'),
    ('Automatique à variation continue CVT'),
    ('Semi-automatique'); -- Insertion d'une valeur nulle

--TYPOLOGIE propulsion
CREATE TABLE TY_PROPULSION (
                               id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                               NOM_PROPULSION VARCHAR(50) NOT null UNIQUE -- Assure que chaque type est unique
);
INSERT INTO TY_PROPULSION (NOM_PROPULSION)
VALUES
    ('Traction avant FWD'),
    ('Propulsion arrière RWD'),
    ('Transmission intégrale AWD'),
    ('Transmission 4x4 4WD'),
    ('Hybridation'),
    ('Electrique');

--TYPOLOGIE nombre rapports
CREATE TABLE TY_NOMBRE_RAPPORTS (
                                    id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                    NOMBRE_RAPPORTS INT UNIQUE NOT null-- Assure que chaque nombre de rapports est unique
);
INSERT INTO TY_NOMBRE_RAPPORTS (nombre_rapports)
VALUES
    (3),
    (4),
    (5),
    (6),
    (7),
    (8),
    (9),
    (10);

--TYPOLOGIE suralimentation
CREATE TABLE TY_SURALIMENTATION (
                                    id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                    NOM_SURALIMENTATION VARCHAR(50) UNIQUE NOT null-- Assure que chaque type est unique
);
INSERT INTO TY_SURALIMENTATION (NOM_SURALIMENTATION)
VALUES
    ('Turbo'),
    ('Bi-turbo'),
    ('Compresseur');

--TYPOLOGIE refroidissement
CREATE TABLE TY_REFROIDISSEMENT (
                                    id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                    NOM_REFROIDISSEMENT VARCHAR(50) UNIQUE NOT null-- Assure que chaque type est unique
);
INSERT INTO TY_REFROIDISSEMENT (NOM_REFROIDISSEMENT)
VALUES
    ('Air'),
    ('Liquide');

--TYPOLOGIE architecture moteur
CREATE TABLE TY_ARCHITECTURE_MOTEUR (
                                        id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                        NOM_ARCHITECTURE_MOTEUR VARCHAR(50) UNIQUE NOT null-- Assure que chaque type est unique
);
INSERT INTO TY_ARCHITECTURE_MOTEUR (NOM_ARCHITECTURE_MOTEUR)
VALUES
    ('Ligne'),
    ('V'),
    ('W'),
    ('A plat');

--TYPOLOGIE distribution
CREATE TABLE TY_DISTRIBUTION (
                                 id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                                 NOM_DISTRIBUTION VARCHAR(50) UNIQUE NOT null-- Assure que chaque type est unique
);
INSERT INTO TY_DISTRIBUTION (NOM_DISTRIBUTION)
VALUES
    ('SOHC'),
    ('DOHC'),
    ('Multivalves'),
    ('VVT'),
    ('VTEC');

--TYPOLOGIE allumage
CREATE TABLE TY_ALLUMAGE (
                             id INT PRIMARY KEY AUTO_INCREMENT, -- Génère automatiquement un identifiant unique
                             NOM_ALLUMAGE VARCHAR(50) UNIQUE NOT null-- Assure que chaque type est unique
);
INSERT INTO TY_ALLUMAGE (NOM_ALLUMAGE)
VALUES
    ('Electronique'),
    ('Bougies'),
    ('Compression');

