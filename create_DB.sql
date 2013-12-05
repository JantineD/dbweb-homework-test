--
-- Tabelstructuur voor tabel `choice`
--

CREATE TABLE IF NOT EXISTS `choice` (
  `C_NUMBER` int(11) NOT NULL,
  `C_TEXT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CORRECT` int(11) DEFAULT NULL,
  UNIQUE KEY `C_NUMBER` (`C_NUMBER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `Q_NUMBER` int(11) NOT NULL,
  `Q_TEXT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `Q_NUMBER` (`Q_NUMBER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
