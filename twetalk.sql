-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19-Maio-2022 às 18:35
-- Versão do servidor: 5.6.51
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `twetalk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apelido` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `papelParede` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `usuario`, `email`, `apelido`, `avatar`, `papelParede`, `cidade`, `bio`, `nascimento`) VALUES
(9, 'vezio', 'mpmotta@gmail.com', 'The Chosen One', '081016fdc801054fa0422cb4a0080797.jpg', '599df8b0b5f2f6041f9e58929f227cea.jpg', 'Tatooine', 'you dontÂ´t know the power of the dark side!\r\nMy name is Darh Vader', '1973-03-23'),
(10, 'Manu', 'manu@gmail.com', 'Menuela Gamer Thunderbolt', '812e0fb48cbd3faf1af8b1ca2cf1a16d.jpg', '8bf9e47a1e114b21b326b9e1e48215bc.jpg', 'Hogwarts , New York - USA e Porto Alegre', 'Manuela, adoro Riverdale e Harry Potter', '2010-06-23'),
(11, 'panzer', 'panzer@eu.com', 'Soldier of Love', '49201037e1761a18c27e03fa1af9ee5a.jpg', '91d4a1cc6d03c7a48f6524431fe09393.jpg', 'Porto Alegre - RS - Brasil', 'Lay down your arms\r\nAnd surrender to me\r\nOh, lay down your arms\r\nAnd love me peacefully,\r\nYeah\r\nUse your arms for squeezing,\r\nPleasing the one who loves you so', '1999-10-10'),
(12, 'voldemort', 'avada@kadavra', '', 'no_img.png', 'vazio.png', NULL, NULL, NULL),
(13, 'azozo', 'azozo@maracatu.com', '', 'no_img.png', 'vazio.png', NULL, NULL, NULL),
(14, 'jameson', 'jameson@gmail.com', '', 'no_img.png', 'vazio.png', NULL, NULL, NULL),
(15, 'azozo', 'azozo@bol.com.br', 'CachorrÃ£o', 'fb9f2c0ba5aecf3f72ec31dcc18a6c70.jpg', 'c6b2ce1a9675ab13d8344b62a37896c5.jpg', 'POA - RS', 'Um cara normal', '2000-10-10'),
(16, 'Vader', 'vader@jedi.com', '', '9037e23aa99ef0c6a68293afd15f4f4f.jpg', 'vazio.png', NULL, NULL, NULL),
(17, 'luke', 'luke@jedi.com', '', 'no_img.png', 'vazio.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `postagem` text COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `postagem`, `usuario`, `imagem`, `data`) VALUES
(58, 'dsdsadasdad', 'azozo', NULL, '2022-05-19 16:38:33'),
(59, 'ðŸ˜±ðŸ˜±ðŸ˜±ðŸ˜±ðŸ˜±ðŸ˜±', 'azozo', NULL, '2022-05-19 16:38:46'),
(60, 'hahahahahah', 'Vader', NULL, '2022-05-19 16:40:13'),
(61, 'ðŸ˜©ðŸ˜©ðŸ˜©ðŸ˜©', 'Vader', NULL, '2022-05-19 16:40:36'),
(62, 'star wars', 'Vader', '1b608039cb62bdb8710116831b028ea4.png', '2022-05-19 16:41:30'),
(63, 'postagem em teste automÃ¡tico.', 'luke', NULL, '2022-05-19 17:21:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `senha`, `data`) VALUES
(32, 'azozo', 'azozo@bol.com.br', '9b41e651421ad6a18b24805f3dec2ece25fc4c0667706490cab547ed86ab26544e1ba28705d2a73def28910e342632ec044b274655fac69789c7a36a828bf201', '2022-05-19 16:01:59'),
(33, 'Vader', 'vader@jedi.com', '58c0f4475c13805ad89d829f812360b7ad389995a39de0fc3baf2465fe9acaddfdfb9f2e0ff2ac365c91c93485568afdade5e6962f819bb274b8a2787dc5b6e2', '2022-05-19 16:39:45'),
(34, 'luke', 'luke@jedi.com', '2b966e4c5972aa9b4ec5f5fa006100645065c9d04d18166eeb90293d10bb986642435f426bc5795771cab92878d85f35962b2153deb80b3e982c61172b9ce5cb', '2022-05-19 17:14:53');

--
-- Acionadores `users`
--
DELIMITER $$
CREATE TRIGGER `Tgr_perfil_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
	INSERT INTO perfil (usuario, email, avatar, papelParede) VALUES(NEW.usuario, NEW.email, 'no_img.png', 'vazio.png');
END
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`,`email`,`apelido`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
