-- Création de la table ANNEE_TRANCHE (décennies)
CREATE TABLE `ANNEE_TRANCHE` (
                                 `ID` int(11) NOT NULL AUTO_INCREMENT,
                                 `NOM_ANNEE_TRANCHE` varchar(255) NOT NULL,
                                 PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table ANNEE
CREATE TABLE `ANNEE` (
                         `ID` int(11) NOT NULL AUTO_INCREMENT,
                         `NOM_ANNEE` varchar(11) NOT NULL,
                         `ID_DECENNIE` int(11) NOT NULL,
                         PRIMARY KEY (`ID`),
                         FOREIGN KEY (`ID_DECENNIE`) REFERENCES `ANNEE_TRANCHE`(`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table PAYS
CREATE TABLE `PAYS` (
                        `ID` int(11) NOT NULL AUTO_INCREMENT,
                        `NOM_PAYS` varchar(255) NOT NULL,
                        PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table GROUPE (GROUPE de constructeurs)
CREATE TABLE `GROUPE` (
                          `ID` int(11) NOT NULL AUTO_INCREMENT,
                          `NOM_GROUPE` varchar(255) NOT NULL,
                          PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table CONSTRUCTEUR
CREATE TABLE `CONSTRUCTEUR` (
                                `ID` int(11) NOT NULL AUTO_INCREMENT,
                                `NOM_CONSTRUCTEUR` varchar(255) NOT NULL,
                                `IMAGE_CONSTRUCTEUR` varchar(255) DEFAULT NULL,
                                `ID_PAYS` int(11) NOT NULL,
                                `ID_GROUPE` int(11) NOT NULL,
                                PRIMARY KEY (`ID`),
                                FOREIGN KEY (`ID_PAYS`) REFERENCES `PAYS`(`ID`) ON DELETE CASCADE,
                                FOREIGN KEY (`ID_GROUPE`) REFERENCES `GROUPE`(`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table SEGMENT (SEGMENT de voitures)
CREATE TABLE `SEGMENT` (
                           `ID` int(11) NOT NULL AUTO_INCREMENT,
                           `NOM_SEGMENT` varchar(255) NOT NULL,
                           `IMAGE_SEGMENT` varchar(255) DEFAULT NULL,
                           PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table TYPE (TYPE de voitures)
CREATE TABLE `TYPE` (
                        `ID` int(11) NOT NULL AUTO_INCREMENT,
                        `NOM_TYPE` varchar(255) NOT NULL,
                        `IMAGE_TYPE` varchar(255) DEFAULT NULL,
                        PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table MODELE
CREATE TABLE `MODELE` (
                          `ID` int(11) NOT NULL AUTO_INCREMENT,
                          `NOM_MODELE` varchar(255) NOT NULL,
                          `ID_CONSTRUCTEUR` int(11) NOT NULL,
                          PRIMARY KEY (`ID`),
                          FOREIGN KEY (`ID_CONSTRUCTEUR`) REFERENCES `CONSTRUCTEUR`(`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table UTILISATEUR (utilisateurs)
CREATE TABLE `UTILISATEUR` (
                               `ID` int(11) NOT NULL AUTO_INCREMENT,
                               `PSEUDO_UTILISATEUR` varchar(255) NOT NULL,
                               `PRENOM_UTILISATEUR` varchar(255) NOT NULL,
                               `NOM_UTILISATEUR` varchar(255) NOT NULL,
                               `MAIL_UTILISATEUR` varchar(255) NOT NULL,
                               `PASSWORD_UTILISATEUR` varchar(255) NOT NULL,
                               `ROLE_UTILISATEUR` varchar(255) NOT NULL DEFAULT 'simple',
                               PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table FICHE
CREATE TABLE `FICHE` (
                         `ID` int(11) NOT NULL AUTO_INCREMENT,
                         `ID_CONSTRUCTEUR` int(11) NOT NULL,
                         `ID_TYPE` int(11) NOT NULL,
                         `ID_MODELE` int(11) NOT NULL,
                         `ID_ANNEE_DEBUT` int(11) NOT NULL,
                         `ID_ANNEE_FIN` int(11) NOT NULL,
                         `ID_SEGMENT` int(11) NOT NULL,
                         `NOM_FICHE` varchar(255) NOT NULL,
                         `RESUME_FICHE` varchar(255) NOT NULL,
                         `HISTOIRE_FICHE` text NOT NULL,
                         `DATE_AJOUT` datetime NOT NULL,
                         `ID_UTILISATEUR` int(11) NOT NULL,
                         PRIMARY KEY (`ID`),
                         FOREIGN KEY (`ID_CONSTRUCTEUR`) REFERENCES `CONSTRUCTEUR`(`ID`) ON DELETE CASCADE,
                         FOREIGN KEY (`ID_TYPE`) REFERENCES `TYPE`(`ID`) ON DELETE CASCADE,
                         FOREIGN KEY (`ID_MODELE`) REFERENCES `MODELE`(`ID`) ON DELETE CASCADE,
                         FOREIGN KEY (`ID_ANNEE_DEBUT`) REFERENCES `ANNEE`(`ID`) ON DELETE CASCADE,
                         FOREIGN KEY (`ID_ANNEE_FIN`) REFERENCES `ANNEE`(`ID`) ON DELETE CASCADE,
                         FOREIGN KEY (`ID_SEGMENT`) REFERENCES `SEGMENT`(`ID`) ON DELETE CASCADE,
                         FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `UTILISATEUR`(`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table VERSION
CREATE TABLE `VERSION` (
                           `ID` int(11) NOT NULL AUTO_INCREMENT,
                           `ID_FICHE` int(11) NOT NULL,
                           `APPELLATION` varchar(255) NOT NULL,
                           `CARBURANT` varchar(255) NOT NULL,
                           `CONSTRUCTION_ANNEE` varchar(255) NOT NULL,
                           `NOM_MOTEUR` varchar(255) NOT NULL,
                           `CYLINDREE` varchar(255) NOT NULL,
                           `PERFORMANCE` varchar(255) NOT NULL,
                           `COUPLE` varchar(255) NOT NULL,
                           `ZERO_A_100` varchar(255) NOT NULL,
                           `VMAX` varchar(255) NOT NULL,
                           `CONSOMMATION` varchar(255) NOT NULL,
                           `CARROSSERIE` varchar(255) NOT NULL,
                           `MARCHE_CONTINENT` varchar(255) NOT NULL,
                           PRIMARY KEY (`ID`),
                           FOREIGN KEY (`ID_FICHE`) REFERENCES `FICHE`(`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Création de la table IMAGE
CREATE TABLE `IMAGE` (
                         `ID` int(11) NOT NULL AUTO_INCREMENT,
                         `ID_FICHE` int(11) NOT NULL,
                         `IMAGE_URL` varchar(255) NOT NULL,
                         `ORDRE` int(11) NOT NULL,
                         PRIMARY KEY (`ID`),
                         INDEX `idx_id_fiche` (`ID_FICHE`), -- Index sur ID_FICHE
                         FOREIGN KEY (`ID_FICHE`) REFERENCES `FICHE`(`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
