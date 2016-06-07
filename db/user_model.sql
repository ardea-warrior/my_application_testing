CREATE TABLE `users_pawon` (
  `uuid` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`uuid`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8