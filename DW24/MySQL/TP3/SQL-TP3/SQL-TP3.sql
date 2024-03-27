-- Base de donnés: `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `NUMEPREUVE` int(11) NOT NULL,
  `DATEPREUVE` date NOT NULL,
  `LIEU` varchar(100) NOT NULL,
  `CODEMAT` varchar(10) NOT NULL,
  PRIMARY KEY  (`NUMEPREUVE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `examen`
--

INSERT INTO `examen` (`NUMEPREUVE`, `DATEPREUVE`, `LIEU`, `CODEMAT`) VALUES
(1, '2017-03-10', 'PARIS1', 'AI'),
(2, '2017-03-10', 'PARIS1', 'PW'),
(3, '2017-03-10', 'PARIS2', 'AI'),
(4, '2017-03-10', 'PARIS2', 'PW'),
(5, '2017-03-11', 'PARIS1', 'SE'),
(6, '2017-03-11', 'PARIS2', 'ST'),
(7, '2017-03-12', 'PARIS1', 'TEC'),
(8, '2017-03-12', 'PARIS2', 'TEP'),
(9, '2017-03-13', 'PARIS1', 'BD'),
(10, '2017-03-13', 'PARIS1', 'CG'),
(11, '2017-03-14', 'PARIS1', 'CA');

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE `notation` (
  `numetu` int(11) NOT NULL,
  `numepreuve` int(11) NOT NULL,
  `note` float default NULL,
  PRIMARY KEY  (`numetu`,`numepreuve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notation`
--

INSERT INTO `notation` (`numetu`, `numepreuve`, `note`) VALUES
(1, 1, 10),
(1, 2, 10),
(1, 3, 20),
(2, 1, 12),
(2, 2, 20),
(2, 3, 12),
(3, 1, NULL),
(3, 2, 14),
(3, 3, NULL),
(4, 1, 15),
(4, 2, 15),
(4, 3, 15),
(6, 1, 13),
(6, 2, 13),
(6, 3, 13),
(7, 1, 12),
(7, 2, NULL),
(7, 3, 12),
(8, 1, 13),
(8, 2, 13);

CREATE TABLE matiere (
    CODEMAT VARCHAR(5) PRIMARY KEY,
    LIBELLE VARCHAR(100)
);

INSERT INTO matiere (CODEMAT, LIBELLE) VALUES
('AI', 'ANALYSE INFORMATIQUE'),
('PW', 'PROGRAMMATION WEB'),
('SE', 'SYSTEME D’EXPLOITATION'),
('ST', 'STATISTIQUES'),
('TEC', 'TECHNIQUES D’EXPRESSIONETDECOMMUNICATION'),
('TLP', 'TECHNIQUES ET LOGIQUEDEPROGRAMMATION'),
('BD', 'BASES DE DONNEES'),
('CG', 'COMPTABILITE GENERALE'),
('CA', 'COMPTABILITE ANALYTIQUE');
