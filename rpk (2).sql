-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Maio-2021 às 10:17
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rpk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `imagens` varchar(255) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT current_timestamp(),
  `curtidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `body`, `imagens`, `criado_em`, `curtidas`) VALUES
(27, 10, 'TESTANDO', '', '2021-04-05 13:52:37', 0),
(29, 16, 'Reclamação um', '', '2021-04-06 19:14:01', 0),
(32, 10, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2021-04-20 15:29:05', 0),
(39, 15, 'Teste', '', '2021-05-04 20:28:29', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_comentario`
--

CREATE TABLE `posts_comentario` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `criado_no` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts_comentario`
--

INSERT INTO `posts_comentario` (`id`, `comentario`, `criado_no`, `user_id`, `posts_id`) VALUES
(1, 'Primeiro comentário', '2021-04-24 23:04:22', 10, 32),
(12, 'oiii', '2021-05-04 18:06:56', 15, 38),
(13, 'TESTE', '2021-05-04 18:09:11', 15, 33),
(14, 'TESTE', '2021-05-05 07:34:54', 10, 39);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_curtir`
--

CREATE TABLE `posts_curtir` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_imagem`
--

CREATE TABLE `posts_imagem` (
  `id` int(11) NOT NULL,
  `nome_imagem` varchar(255) NOT NULL,
  `imagem_dir` varchar(255) NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_video`
--

CREATE TABLE `posts_video` (
  `id` int(11) NOT NULL,
  `nome_video` varchar(255) NOT NULL,
  `video_dir` varchar(255) NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags_item`
--

CREATE TABLE `tags_item` (
  `tags_item_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `desde` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `desde`) VALUES
(10, 'Naldo', 'naldo@gmail.com', '$2y$10$djF3KpWn/j.SSQgbgDoMQeQKmUf83UGQRNkoBGT8JDwTMNISzrRsK', '2021-03-10 01:40:10'),
(14, 'Domingos edmar', 'Domingos@gmail.com', '$2y$10$bDVfcrJOn3iaPvu/tIAXsu9DwModAbU8D7z0h8fMCZ/X5wouN2OMK', '2021-03-14 19:25:24'),
(15, 'Edson', 'edson@gmail.com', '$2y$10$imVdA/3TudZz5OgsgTdE/uCmKgHg6pNZUC1PeaVuvV0toUqv8PaOK', '2021-04-03 14:34:04'),
(16, 'Lili', 'lidiany@live.com.pt', '$2y$10$9RoYPB9IYwi7LSCPSkzDHOZ7UnqurZ2NjdkjcRI14MHtXcA2AIHma', '2021-04-06 19:13:31');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts_comentario`
--
ALTER TABLE `posts_comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_U` (`user_id`),
  ADD KEY `FK_P` (`posts_id`);

--
-- Índices para tabela `posts_curtir`
--
ALTER TABLE `posts_curtir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user` (`user_id`),
  ADD KEY `FK_posts` (`posts_id`);

--
-- Índices para tabela `posts_imagem`
--
ALTER TABLE `posts_imagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_id` (`posts_id`);

--
-- Índices para tabela `posts_video`
--
ALTER TABLE `posts_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_id` (`posts_id`);

--
-- Índices para tabela `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tags_item`
--
ALTER TABLE `tags_item`
  ADD PRIMARY KEY (`tags_item_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `posts_comentario`
--
ALTER TABLE `posts_comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `posts_curtir`
--
ALTER TABLE `posts_curtir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts_imagem`
--
ALTER TABLE `posts_imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts_video`
--
ALTER TABLE `posts_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tags_item`
--
ALTER TABLE `tags_item`
  MODIFY `tags_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `posts_comentario`
--
ALTER TABLE `posts_comentario`
  ADD CONSTRAINT `FK_U` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `posts_curtir`
--
ALTER TABLE `posts_curtir`
  ADD CONSTRAINT `FK_posts` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `posts_imagem`
--
ALTER TABLE `posts_imagem`
  ADD CONSTRAINT `P_FK` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `posts_imagem_ibfk_1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`);

--
-- Limitadores para a tabela `posts_video`
--
ALTER TABLE `posts_video`
  ADD CONSTRAINT `posts_video_ibfk_1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
