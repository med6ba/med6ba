--
-- Base de données: `appgrh`
--

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

CREATE TABLE `affecter` (
  `idemploye` int(11) NOT NULL,
  `idservice` varchar(10) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  PRIMARY KEY  (`idemploye`,`idservice`,`datedebut`),
  KEY `idemploye` (`idemploye`),
  KEY `idservice` (`idservice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `affecter`
--

INSERT INTO `affecter` (`idemploye`, `idservice`, `datedebut`, `datefin`) VALUES
(1, 'SF', '2023-01-02', '2024-01-02'),
(2, 'SA', '2024-03-15', '2025-03-15'),
(5, 'SF', '2024-01-01', '2025-01-01'),
(9, 'SM', '2024-01-01', '2025-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `idemploye` int(11) NOT NULL auto_increment,
  `photo` varchar(100) default NULL,
  `ncin` varchar(100) default NULL,
  `nom` varchar(100) default NULL,
  `prenom` varchar(100) default NULL,
  `adresse` varchar(200) default NULL,
  `tel` varchar(100) default NULL,
  `email` varchar(100) default NULL,
  `datedenaissance` date default NULL,
  `datederecrutement` date default NULL,
  `fonction` varchar(100) default NULL,
  `specialite` varchar(100) default NULL,
  `salairenet` double default NULL,
  `motdepasse` varchar(100) default NULL,
  PRIMARY KEY  (`idemploye`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`idemploye`, `photo`, `ncin`, `nom`, `prenom`, `adresse`, `tel`, `email`, `datedenaissance`, `datederecrutement`, `fonction`, `specialite`, `salairenet`, `motdepasse`) VALUES
(1, 'photo1.png', '123456789', 'Doe', 'john', '123 Rue Agadir', '1234567890', 'john.doe@example.com', '1990-01-15', '2022-02-01', 'Manager', 'Finance', 5000, '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(2, 'photo2.png', '987654321', 'Smith', 'Jane', '456 Rue B', '9876543210', 'jane.smith@example.com', '1992-05-20', '2022-03-15', 'Developer', 'IT', 60000, '2aa60a8ff7fcd473d321e0146afd9e26df395147'),
(3, 'photo3.png', '555555555', 'Johnson', 'Michael', '789 Rue C', '5555555555', 'michael.johnson@example.com', '1988-08-10', '2022-04-20', 'Analyst', 'Business', 55000, '1119cfd37ee247357e034a08d844eea25f6fd20f'),
(4, 'photo4.png', '444444444', 'Brown', 'Emily', '987 Rue D', '4444444444', 'emily.brown@example.com', '1995-03-25', '2022-05-25', 'Engineer', 'Engineering', 65000, 'a1d7584daaca4738d499ad7082886b01117275d8'),
(5, 'photo5.png', '777777777', 'Wilson', 'David', '654 Rue E', '7777777777', 'david.wilson@example.com', '1985-12-05', '2022-06-30', 'Sales Representative', 'Sales', 60000, 'edba955d0ea15fdef4f61726ef97e5af507430c0'),
(6, 'photo6.png', '222222222', 'Miller', 'Olivia', '321 Rue F', '2222222222', 'olivia.miller@example.com', '1993-09-15', '2022-07-05', 'HR Manager', 'Human Resources', 55000, '6d749e8a378a34cf19b4c02f7955f57fdba130a5'),
(7, 'photo7.png', '888888888', 'Jones', 'Daniel', '789 Rue G', '8888888888', 'daniel.jones@example.com', '1987-06-20', '2022-08-10', 'Designer', 'Creative', 70000, '330ba60e243186e9fa258f9992d8766ea6e88bc1'),
(8, 'photo8.png', '666666666', 'Davis', 'Sophia', '456 Rue H', '6666666666', 'sophia.davis@example.com', '1991-02-01', '2022-09-15', 'Manager', 'Operations', 75000, 'a8dbbfa41cec833f8dd42be4d1fa9a13142c85c2'),
(9, 'photo9.png', '999999999', 'Martinez', 'William', '123 Rue I', '9999999999', 'william.martinez@example.com', '1989-07-10', '2022-10-20', 'Developer', 'IT', 65000, '024b01916e3eaec66a2c4b6fc587b1705f1a6fc8'),
(10, 'photo10.png', '555555555', 'Taylor', 'Chris', '789 Rue J', '5555555555', 'chris.taylor@example.com', '1985-11-10', '2022-11-25', 'Marketing Specialist', 'Marketing', 70000, 'f68ec41cde16f6b806d7b04c705766b7318fbb1d');

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

CREATE TABLE `pointage` (
  `idp` int(11) NOT NULL auto_increment,
  `idemploye` int(11) NOT NULL,
  `datepointage` date NOT NULL,
  `heuredentree` time NOT NULL,
  `heuresortie` time NOT NULL,
  `notes` varchar(500) NOT NULL,
  PRIMARY KEY  (`idp`),
  KEY `idemploye` (`idemploye`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `pointage`
--

INSERT INTO `pointage` (`idp`, `idemploye`, `datepointage`, `heuredentree`, `heuresortie`, `notes`) VALUES
(3, 1, '2024-03-24', '10:00:00', '18:00:00', 'Aucun'),
(4, 4, '2024-03-24', '09:00:00', '15:00:00', 'Aucun'),
(5, 6, '2024-03-24', '09:00:00', '15:00:00', 'Aucun'),
(6, 6, '2024-03-24', '09:00:00', '15:00:00', 'Aucun'),
(7, 7, '2024-03-24', '09:00:00', '16:00:00', 'Aucun'),
(11, 1, '2024-03-26', '09:00:00', '15:00:00', 'Aucun');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `idservice` varchar(10) NOT NULL,
  `nomservice` varchar(100) NOT NULL,
  PRIMARY KEY  (`idservice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`idservice`, `nomservice`) VALUES
('SA', 'SERVICE ADMINISTRATIF'),
('SC', 'SERVICE COMMERCIAL'),
('SF', 'SERVICE FINANCIER'),
('SI', 'SERVICE INFORMATIQUE'),
('SM', 'SERVICE MAINTENANCE'),
('SMI', 'SERVICE MARKETING');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD CONSTRAINT `affecter_ibfk_1` FOREIGN KEY (`idemploye`) REFERENCES `employe` (`idemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affecter_ibfk_2` FOREIGN KEY (`idservice`) REFERENCES `service` (`idservice`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pointage`
--
ALTER TABLE `pointage`
  ADD CONSTRAINT `pointage_ibfk_1` FOREIGN KEY (`idemploye`) REFERENCES `employe` (`idemploye`) ON DELETE CASCADE ON UPDATE CASCADE;
