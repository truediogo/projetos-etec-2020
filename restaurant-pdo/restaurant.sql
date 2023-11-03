-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jul-2020 às 20:17
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `restaurant`
--
CREATE DATABASE IF NOT EXISTS `restaurant` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `restaurant`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(33) NOT NULL,
  `description` varchar(257) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tabela antes do insert `menu`
--

TRUNCATE TABLE `menu`;
--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `title`, `description`, `price`, `img`) VALUES
(44, 'Estrogonofe de frango', 'Estrogonofe é um prato originário da culinária russa composto de cubos de carne bovina servidos num molho de creme de leite.', 49.9, '5f18934a5c90e-1595446090.webp'),
(45, 'Almôndegas ao molho', 'Almôndega, ou porpeta, é um prato cujo ingrediente principal é uma bola de carne magra moída de aproximadamente 5 cm de diâmetro e servida, numa refeição, em várias unidades.', 39.9, '5f189362097bc-1595446114.jpg'),
(46, 'Filé à parmegiana', 'Composto por um pedaço de carne fatiado, empanado com farinha de trigo e ovos, coberto com queijo do tipo parmesão, presunto e bastante molho de tomate e condimentos como orégano e coentro.', 69.9, '5f1893aeb2993-1595446190.jfif'),
(47, 'Medalhão de Frango com Bacon', 'Cubos de frango temperados e enrolados em fatias de bacon.', 49.9, '5f18942525040-1595446309.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `passphrase` varchar(33) NOT NULL,
  `email` varchar(65) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tabela antes do insert `users`
--

TRUNCATE TABLE `users`;
--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `passphrase`, `email`, `role`) VALUES
(1, 'restaurant', '543acc010e1f014120817f1e8b8022c2', 'teste@teste.com', 999);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
