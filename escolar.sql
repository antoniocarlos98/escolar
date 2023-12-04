-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jul-2023 às 18:40
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escolar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `responsavel` varchar(20) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` date NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sexo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `responsavel`, `data_nascimento`, `data_cadastro`, `foto`, `sexo`) VALUES
(1, 'Felipe Santos', '788.888.888-88', '(99) 99999-9999', 'felipe@hotmail.com', 'Rua Almeida Campos 150', '', '2000-11-16', '2020-11-16', 'team-1.jpg', 'M'),
(2, 'Mariano Campos', '789.555.555-55', '(55) 55555-5555', 'mariano@hotmail.com', 'Rua Almeida Campos 145', '', '2001-11-16', '2020-11-16', 'usuario-icone.jpg', 'M'),
(3, 'Marina Silva', '030.992.190-29', '(31) 97139-0746', 'marina@hotmail.com', 'Rua C', '', '2000-11-16', '2020-11-16', 'team-2.jpg', 'M'),
(5, 'Rui Costa Silva', '488.888.888-88', '(33) 33333-3333', 'rui@hotmail.com', 'Rua Almeida Campos 150', '222.222.222-22', '2002-11-17', '2020-11-17', 'sem-foto.jpg', 'M'),
(6, 'Fabricio Silva', '789.522.222-22', '(22) 22222-2222', 'fabricio@hotmail.com', 'Rua Almeida Campos 150', '', '2000-11-26', '2020-11-26', 'usuario-icone.jpg', 'M'),
(7, 'Aluno de Teste', '000.000.000-00', '(54) 41545-4555', 'batista@hotmail.com', 'Rua C', '', '1990-06-14', '2021-06-14', '02.png', 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos_alunos`
--

CREATE TABLE `arquivos_alunos` (
  `id` int(11) NOT NULL,
  `aluno` int(11) NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `arquivos_alunos`
--

INSERT INTO `arquivos_alunos` (`id`, `aluno`, `arquivo`, `data`, `descricao`) VALUES
(2, 7, '15-06-2021-12-50-31-euepedro.zip', '2021-06-15', 'Declaração'),
(3, 7, '15-06-2021-12-58-17-pdf-os.pdf', '2021-06-15', 'Matricula');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL,
  `arquivo` varchar(100) DEFAULT NULL,
  `periodo` int(11) NOT NULL,
  `modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `turma`, `nome`, `descricao`, `arquivo`, `periodo`, `modulo`) VALUES
(5, 3, 'Introduçao ao Curso', 'Aula introdutória para explicar os conceitos e a grade ...', 'boleto-teste.pdf', 6, 0),
(6, 3, 'Conceitos de Desenvolvimento', '', 'tabelas-sistema-oficina.rar', 6, 0),
(7, 3, 'Introduçao ao Curso', '', 'tabelas-sistema-oficina.rar', 7, 0),
(9, 3, 'Primeiros Comandos', '', NULL, 6, 0),
(10, 3, 'Conceitos de Programação', 'aaaaaaaaa', 'tabelas-sistema-oficina.rar', 6, 0),
(11, 3, 'Conceitos de Desenvolvimento', '', 'boletim.pdf', 7, 0),
(12, 3, 'Introduçao ao Curso', '', NULL, 8, 0),
(13, 3, 'Conceitos de Desenvolvimento', '', NULL, 8, 0),
(14, 3, 'Conceitos de Programação', '', NULL, 8, 0),
(15, 5, 'Introdução', 'aaaaaaaa', NULL, 10, 2),
(16, 6, 'Introdução ao Design', 'Introducao ....', NULL, 11, 0),
(17, 5, 'fdfdsfs', 'fsdfsdfds', NULL, 10, 2),
(19, 5, 'fsfsdfdssfdsf', 'fdsfsdfsdfds', NULL, 10, 1),
(20, 6, 'Teste', 'esafdfssdfas', NULL, 11, 0),
(21, 6, 'Introdução', 'aaaaaaa', NULL, 12, 0),
(22, 7, 'Introdução', 'dsfs', NULL, 15, 4),
(23, 7, 'Principios ...', 'fsdfafa', NULL, 15, 4),
(24, 7, 'Introdução', 'ffsfsd', NULL, 13, 4),
(25, 7, 'dsfads', 'fdsfsdfsd', NULL, 14, 4),
(26, 7, 'Introdução', 'fdfdsfs', NULL, 13, 5),
(27, 1, 'Aula 1', '', NULL, 16, 0),
(28, 1, 'Introdução ao Conteúdo', 'teste fdafdaf', NULL, 16, 0),
(29, 1, 'aaaaa', '', NULL, 17, 0),
(30, 1, 'bbbb', '', NULL, 17, 0),
(31, 1, 'cccc', '', NULL, 17, 0),
(32, 1, 'Fundamentos', '', NULL, 16, 0),
(33, 1, 'Inicio dos códigos', '', NULL, 16, 0),
(34, 1, 'Primeiros Comandos', '', NULL, 16, 0),
(35, 1, 'Criando um Site', '', NULL, 16, 0),
(36, 1, 'Imagens no Site', '', NULL, 16, 0),
(37, 1, 'Aprendendo Links', '', NULL, 16, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamadas`
--

CREATE TABLE `chamadas` (
  `id` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `aluno` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `presenca` varchar(5) NOT NULL,
  `justificativa` varchar(255) DEFAULT NULL,
  `data` date NOT NULL,
  `periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamadas`
--

INSERT INTO `chamadas` (`id`, `turma`, `aluno`, `aula`, `presenca`, `justificativa`, `data`, `periodo`) VALUES
(13, 3, 1, 5, 'P', NULL, '2020-11-24', 6),
(14, 3, 2, 5, 'P', NULL, '2020-11-24', 6),
(15, 3, 3, 5, 'F', NULL, '2020-11-24', 6),
(16, 3, 5, 5, 'P', NULL, '2020-11-24', 6),
(17, 3, 5, 6, 'P', NULL, '2020-11-24', 6),
(18, 3, 5, 9, 'F', NULL, '2020-11-24', 6),
(19, 3, 5, 10, 'F', NULL, '2020-11-24', 6),
(20, 3, 5, 7, 'P', NULL, '2020-11-24', 7),
(21, 3, 5, 11, 'F', NULL, '2020-11-25', 7),
(22, 3, 5, 12, 'P', NULL, '2020-11-25', 8),
(23, 3, 5, 13, 'P', NULL, '2020-11-25', 8),
(24, 3, 5, 14, 'F', NULL, '2020-11-25', 8),
(25, 5, 7, 19, 'P', NULL, '2021-06-14', 10),
(26, 5, 6, 19, 'P', NULL, '2021-06-14', 10),
(27, 6, 6, 16, 'P', NULL, '2021-06-14', 11),
(28, 7, 6, 24, 'F', NULL, '2021-06-15', 13),
(29, 7, 6, 26, 'P', NULL, '2021-06-15', 13),
(30, 7, 6, 25, 'P', NULL, '2021-06-15', 14),
(40, 1, 5, 27, 'P', NULL, '2023-07-24', 16),
(41, 1, 2, 27, 'P', NULL, '2023-07-24', 16),
(42, 1, 3, 27, 'P', NULL, '2023-07-24', 16),
(43, 1, 1, 27, 'P', NULL, '2023-07-24', 16),
(44, 1, 5, 28, 'F', NULL, '2023-07-24', 16),
(45, 1, 2, 28, 'P', NULL, '2023-07-24', 16),
(46, 1, 3, 28, 'P', NULL, '2023-07-24', 16),
(47, 1, 1, 28, 'P', NULL, '2023-07-24', 16),
(48, 1, 5, 32, 'P', NULL, '2023-07-25', 16),
(49, 1, 2, 32, 'P', NULL, '2023-07-25', 16),
(50, 1, 3, 32, 'P', NULL, '2023-07-25', 16),
(51, 1, 1, 32, 'P', NULL, '2023-07-25', 16),
(52, 1, 1, 33, 'P', NULL, '2023-07-25', 16),
(53, 1, 2, 33, 'P', NULL, '2023-07-25', 16),
(54, 1, 3, 33, 'F', NULL, '2023-07-25', 16),
(55, 1, 5, 33, 'F', NULL, '2023-07-25', 16),
(56, 1, 5, 34, 'P', NULL, '2023-07-25', 16),
(57, 1, 2, 34, 'P', NULL, '2023-07-25', 16),
(58, 1, 3, 34, 'P', NULL, '2023-07-25', 16),
(59, 1, 1, 34, 'P', NULL, '2023-07-25', 16),
(60, 1, 1, 35, 'F', NULL, '2023-07-25', 16),
(61, 1, 2, 35, 'F', NULL, '2023-07-25', 16),
(62, 1, 3, 35, 'F', NULL, '2023-07-25', 16),
(63, 1, 5, 35, 'P', NULL, '2023-07-25', 16),
(64, 1, 1, 36, 'P', NULL, '2023-07-25', 16),
(65, 1, 2, 36, 'F', NULL, '2023-07-25', 16),
(66, 1, 3, 36, 'P', NULL, '2023-07-25', 16),
(67, 1, 5, 36, 'F', NULL, '2023-07-25', 16),
(69, 1, 5, 37, 'P', NULL, '2023-07-25', 16),
(70, 1, 2, 37, 'P', NULL, '2023-07-25', 16),
(71, 1, 3, 37, 'P', NULL, '2023-07-25', 16),
(72, 1, 1, 37, 'P', NULL, '2023-07-25', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `nome_escola` varchar(75) NOT NULL,
  `endereco_escola` varchar(100) NOT NULL,
  `telefone_escola` varchar(20) DEFAULT NULL,
  `email_adm` varchar(50) DEFAULT NULL,
  `rodape_relatorios` varchar(500) DEFAULT NULL,
  `cnpj_escola` varchar(25) DEFAULT NULL,
  `cidade_escola` varchar(50) DEFAULT NULL,
  `pgto_boleto` varchar(5) NOT NULL,
  `media_porcentagem_presenca` int(11) NOT NULL,
  `media_pontos_minimo_aprovacao` int(11) NOT NULL,
  `maximo_pontos_disciplina` int(11) NOT NULL,
  `carga_horaria_cert` int(11) NOT NULL,
  `ativo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `nome_escola`, `endereco_escola`, `telefone_escola`, `email_adm`, `rodape_relatorios`, `cnpj_escola`, `cidade_escola`, `pgto_boleto`, `media_porcentagem_presenca`, `media_pontos_minimo_aprovacao`, `maximo_pontos_disciplina`, `carga_horaria_cert`, `ativo`) VALUES
(1, 'Escola Freitas', 'Rua X, Número 10 Bairro RX', '(22) 22222-2222', 'contato@hugocursos.com.br', 'Texto que vai aparecer no rodapé dos relatórios teste', '22.222.222/2222-22', 'Belo Horizonte', 'Sim', 70, 60, 100, 250, 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `data_venc` date NOT NULL,
  `arquivo` varchar(100) DEFAULT NULL,
  `pago` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `descricao`, `valor`, `funcionario`, `data`, `data_venc`, `arquivo`, `pago`) VALUES
(1, 'Conta de Luz', '550.00', '444.444.455-55', '2020-11-25', '2020-11-27', 'conta3.jpg', 'Não'),
(2, 'Conta de Água', '950.00', '444.444.455-55', '2020-11-25', '2020-11-27', 'conta3.jpg', 'Sim'),
(3, 'Conta de Luz', '1450.00', '444.444.455-55', '2020-11-25', '2020-11-27', 'boletim.pdf', 'Sim'),
(4, 'Pagamento Eletrecista', '890.00', '444.444.455-55', '2020-11-25', '2020-11-27', 'sem-foto.jpg', 'Não'),
(6, 'Conta de Água', '690.00', '444.444.455-55', '2020-11-25', '2020-11-25', 'sem-foto.jpg', 'Não'),
(7, 'Compra de Cadeiras', '150.00', '444.444.455-55', '2020-11-25', '2020-11-25', 'sem-foto.jpg', 'Não'),
(8, 'Compra de Materiais', '600.00', '444.444.455-55', '2020-11-26', '2020-11-26', 'sem-foto.jpg', 'Não'),
(9, 'Pagamento Serviço', '250.00', '444.444.455-55', '2020-11-26', '2020-11-26', 'sem-foto.jpg', 'Sim'),
(10, 'fdsfadsfsa', '50.00', '000.000.000-00', '2021-06-14', '2021-06-14', 'sem-foto.jpg', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `nome`) VALUES
(1, 'Programação WEB'),
(2, 'WEB Designer'),
(4, 'Design Gráfico'),
(5, 'Programador de Jogos'),
(6, 'Ensino Médio'),
(7, 'Preparatório Concurso'),
(8, 'Musculação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cargo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `email`, `telefone`, `endereco`, `cargo`) VALUES
(1, 'Matheus Santos', '788.888.888-88', 'mateus@hotmail.com', '(99) 99999-9999', 'Rua X', 'Porteiro'),
(2, 'Talita Silva', '899.999.999-99', 'talita@hotmail.com', '(99) 99999-9999', 'Rua Almeida Campos 150', 'Cantineira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `id` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `aluno` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`id`, `turma`, `aluno`, `data`) VALUES
(13, 2, 5, '2020-11-18'),
(14, 1, 5, '2020-11-18'),
(15, 3, 5, '2020-11-18'),
(16, 4, 5, '2020-11-18'),
(17, 1, 2, '2020-11-18'),
(18, 1, 3, '2020-11-18'),
(19, 2, 1, '2020-11-18'),
(20, 2, 3, '2020-11-18'),
(21, 3, 3, '2020-11-18'),
(22, 3, 1, '2020-11-24'),
(23, 3, 2, '2020-11-24'),
(24, 1, 1, '2020-11-24'),
(25, 2, 2, '2020-11-26'),
(26, 5, 7, '2021-06-14'),
(27, 5, 6, '2021-06-14'),
(28, 6, 6, '2021-06-14'),
(29, 7, 6, '2021-06-15'),
(30, 7, 1, '2022-11-01'),
(31, 6, 3, '2022-11-01'),
(32, 5, 3, '2022-11-01'),
(33, 6, 2, '2022-11-01'),
(34, 6, 1, '2022-11-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `aluno` int(11) NOT NULL,
  `professor` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `mensagem` varchar(1000) NOT NULL,
  `arquivo` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `aluno`, `professor`, `titulo`, `mensagem`, `arquivo`, `data`, `hora`) VALUES
(2, 3, 4, 'Msg testes', 'mensagem ce tests dfaffsafaas', 'sem-foto.jpg', '2022-11-01', '14:55:55'),
(3, 3, 3, 'Mensgaeem prof teste', 'teste sdsfa fdf a fa fteste sdsfa fdf a fa fteste sdsfa fdf a fa fteste sdsfa fdf a fa fteste sdsfa fdf a fa fteste sdsfa fdf a fa fteste sdsfa fdf a fa f', 'Boleto_Marina-Silva_01_01_2023_486417503.pdf', '2022-11-01', '15:00:30'),
(4, 3, 3, 'Mensgaeem prof teste', 'Resposta', 'verso.jpg', '2022-11-01', '15:17:44'),
(5, 3, 3, 'Mensgaeem prof teste', 'teste', 'sem-foto.jpg', '2023-01-27', '18:02:16'),
(6, 3, 4, 'afdasfdasfsaf', 'aaaaaaaaa', 'sem-foto.jpg', '2023-01-27', '18:03:27'),
(7, 3, 3, 'Mensgaeem prof teste', 'fdsafsaf', 'sem-foto.jpg', '2023-01-27', '18:03:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`id`, `nome`) VALUES
(1, 'História da Musculação'),
(2, 'Principios da Musculação'),
(3, 'Métodos da Musculação'),
(4, 'Matemática'),
(5, 'Português'),
(6, 'História');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos_turmas`
--

CREATE TABLE `modulos_turmas` (
  `id` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modulos_turmas`
--

INSERT INTO `modulos_turmas` (`id`, `turma`, `modulo`) VALUES
(1, 5, 1),
(4, 5, 2),
(5, 5, 3),
(8, 7, 4),
(9, 7, 5),
(10, 7, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `mensalidade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `tipo`, `descricao`, `valor`, `funcionario`, `data`, `mensalidade`) VALUES
(1, 'Entrada', 'Pagamento Mensalidade', '60.00', '444.444.455-55', '2020-11-18', 'Sim'),
(2, 'Entrada', 'Pagamento Mensalidade', '60.00', '444.444.455-55', '2020-11-18', 'Sim'),
(3, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-18', 'Sim'),
(4, 'Entrada', 'Pagamento Mensalidade', '50.00', '444.444.455-55', '2020-11-18', 'Sim'),
(5, 'Entrada', 'Pagamento Mensalidade', '50.00', '444.444.455-55', '2020-11-18', 'Sim'),
(6, 'Entrada', 'Pagamento Mensalidade', '50.00', '444.444.455-55', '2020-11-18', 'Sim'),
(7, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-18', 'Sim'),
(10, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-18', 'Sim'),
(11, 'Entrada', 'Pagamento Mensalidade', '90.00', '444.444.455-55', '2020-11-19', 'Sim'),
(12, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-19', 'Sim'),
(15, 'Saída', 'Pagamento ', '0.00', '444.444.455-55', '2020-11-25', ''),
(16, 'Saída', 'Pagamento Conta de Água', '950.00', '444.444.455-55', '2020-11-25', ''),
(17, 'Saída', 'Pagamento Conta de Luz', '1450.00', '444.444.455-55', '2020-11-25', ''),
(18, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-25', 'Sim'),
(19, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-25', 'Sim'),
(20, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-26', 'Sim'),
(21, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-26', 'Sim'),
(22, 'Saída', 'Pagamento Pagamento Serviço', '250.00', '444.444.455-55', '2020-11-26', ''),
(23, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-26', 'Sim'),
(24, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-26', 'Sim'),
(25, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-26', 'Sim'),
(26, 'Entrada', 'Pagamento Mensalidade', '80.00', '444.444.455-55', '2020-11-26', 'Sim'),
(27, 'Entrada', 'Pagamento Mensalidade', '80.00', '000.000.000-00', '2021-06-14', 'Sim'),
(28, 'Entrada', 'Pagamento Mensalidade', '80.00', '000.000.000-00', '2022-05-05', 'Sim'),
(29, 'Entrada', 'Pagamento Mensalidade', '80.00', '000.000.000-00', '2022-05-05', 'Sim'),
(30, 'Entrada', 'Pagamento Mensalidade', '80.00', '000.000.000-00', '2022-11-01', 'Sim'),
(31, 'Entrada', 'Pagamento Mensalidade', '80.00', '000.000.000-00', '2022-11-01', 'Sim'),
(32, 'Entrada', 'Pagamento Mensalidade', '0.00', '000.000.000-00', '0000-00-00', 'Sim'),
(33, 'Entrada', 'Pagamento Mensalidade', '0.00', '000.000.000-00', '0000-00-00', 'Sim'),
(34, 'Entrada', 'Pagamento Mensalidade', '90.00', '000.000.000-00', '2022-11-01', 'Sim'),
(35, 'Entrada', 'Pagamento Mensalidade', '50.00', '000.000.000-00', '2022-11-01', 'Sim'),
(36, 'Saída', 'Pagamento fdsfadsfsa', '50.00', '000.000.000-00', '2022-11-01', ''),
(37, 'Entrada', 'Pagamento Mensalidade', '80.00', '000.000.000-00', '2022-11-01', 'Sim'),
(38, 'Entrada', 'Pagamento Mensalidade', '80.00', '000.000.000-00', '2022-11-01', 'Sim'),
(39, 'Entrada', 'Pagamento Mensalidade', '60.00', '000.000.000-00', '2022-11-01', 'Sim'),
(40, 'Entrada', 'Pagamento Mensalidade', '60.00', '000.000.000-00', '2022-11-01', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `aluno` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `nota` int(11) NOT NULL,
  `nota_max` int(11) NOT NULL,
  `modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`id`, `turma`, `periodo`, `aluno`, `descricao`, `nota`, `nota_max`, `modulo`) VALUES
(6, 3, 7, 3, 'Trabalho Bimestral', 7, 10, 0),
(7, 3, 7, 3, 'Prova Bimestral', 8, 10, 0),
(10, 3, 7, 3, 'Participação', 4, 5, 0),
(11, 3, 6, 3, 'Trabalho Bimestral', 7, 8, 0),
(13, 3, 6, 3, 'Prova Bimestral', 5, 10, 0),
(14, 3, 6, 5, 'Trabalho Bimestral', 5, 8, 0),
(15, 3, 6, 5, 'Prova Bimestral', 9, 10, 0),
(17, 3, 6, 5, 'Participação', 5, 7, 0),
(18, 3, 7, 5, 'Prova Bimestral', 8, 10, 0),
(20, 3, 6, 2, 'Prova Bimestral', 8, 10, 0),
(21, 3, 7, 5, 'Participação', 4, 5, 0),
(22, 3, 7, 5, 'Trabalho Bimestral', 8, 10, 0),
(23, 3, 8, 5, 'Trabalho Bimestral', 10, 10, 0),
(24, 3, 8, 5, 'Prova Bimestral', 10, 10, 0),
(25, 3, 8, 5, 'Participação', 3, 5, 0),
(26, 5, 10, 7, 'Prova', 90, 100, 1),
(27, 5, 10, 6, 'Participação', 8, 10, 2),
(28, 6, 11, 6, 'Trabalho', 15, 20, 0),
(29, 5, 10, 6, 'Trabalho', 30, 40, 1),
(30, 5, 10, 6, 'Prova', 20, 20, 1),
(31, 5, 10, 6, 'Trabalho', 35, 50, 2),
(32, 6, 11, 6, 'Prova', 50, 50, 0),
(33, 5, 10, 6, 'Prova', 25, 30, 2),
(34, 6, 12, 6, 'Trabalho', 40, 45, 0),
(35, 6, 12, 6, 'Prova', 30, 40, 0),
(37, 7, 13, 6, 'Prova', 7, 10, 4),
(38, 7, 13, 6, 'Trabalho', 18, 20, 4),
(39, 7, 13, 6, 'Prova', 8, 10, 5),
(40, 7, 13, 6, 'Trabalho', 15, 20, 5),
(41, 7, 13, 6, 'Prova', 7, 10, 6),
(42, 7, 13, 6, 'Trabalho', 15, 20, 6),
(43, 7, 14, 6, 'Prova', 5, 10, 4),
(44, 7, 14, 6, 'Trabalho', 8, 20, 4),
(45, 7, 14, 6, 'Prova', 8, 10, 5),
(46, 7, 14, 6, 'Trabalho', 18, 20, 5),
(47, 7, 14, 6, 'Prova', 4, 10, 6),
(48, 7, 14, 6, 'Trabalho', 12, 20, 6),
(49, 7, 15, 6, 'Trabalho', 25, 25, 4),
(50, 7, 15, 6, 'Prova', 10, 15, 4),
(51, 7, 15, 6, 'Prova', 10, 15, 6),
(52, 7, 15, 6, 'Trabalho', 20, 25, 6),
(53, 7, 15, 6, 'Prova', 15, 20, 5),
(54, 7, 15, 6, 'Participação', 5, 10, 5),
(55, 7, 15, 6, 'Trabalho', 8, 10, 5),
(56, 2, 4, 5, 'Prova', 70, 70, 0),
(57, 2, 5, 5, '80', 80, 80, 0),
(58, 1, 17, 1, '10', 10, 10, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodos`
--

CREATE TABLE `periodos` (
  `id` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `total_pontos` int(11) NOT NULL,
  `minimo_media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `periodos`
--

INSERT INTO `periodos` (`id`, `turma`, `nome`, `data_inicio`, `data_final`, `total_pontos`, `minimo_media`) VALUES
(4, 2, '1º Bimestre', '2020-11-01', '2020-11-27', 25, 15),
(5, 2, '2º Bimestre', '2020-11-01', '2020-11-27', 25, 15),
(6, 3, '1º Bimestre', '2020-11-01', '2020-11-27', 25, 15),
(7, 3, '2º Bimestre', '2020-11-01', '2020-11-27', 25, 15),
(8, 3, '3º Bimestre', '2020-11-01', '2020-11-28', 25, 15),
(9, 3, '4º Bimestre', '2020-11-01', '2020-11-28', 25, 15),
(10, 5, 'Período Único', '2021-06-01', '2021-12-25', 100, 60),
(11, 6, '1º Semestre', '0000-00-00', '0000-00-00', 100, 60),
(12, 6, '2º Semestre', '2021-07-01', '2021-12-01', 100, 60),
(13, 7, '1º Trimestre', '2021-06-01', '2021-09-30', 30, 18),
(14, 7, '2º Trimestre', '2021-06-01', '2021-10-29', 30, 18),
(15, 7, '3º Trimestre', '2021-06-30', '2021-10-29', 40, 24),
(16, 1, '1 Periodo', '2022-11-01', '2022-12-01', 50, 60),
(17, 1, '2 Período', '2023-07-28', '2023-07-28', 40, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pgto_matriculas`
--

CREATE TABLE `pgto_matriculas` (
  `id` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  `data_venc` date NOT NULL,
  `pago` varchar(5) NOT NULL,
  `arquivo` varchar(100) DEFAULT NULL,
  `valor_pago` decimal(8,2) NOT NULL,
  `data_pgto` date DEFAULT NULL,
  `boleto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pgto_matriculas`
--

INSERT INTO `pgto_matriculas` (`id`, `matricula`, `valor`, `data_venc`, `pago`, `arquivo`, `valor_pago`, `data_pgto`, `boleto`) VALUES
(13, 13, '90.00', '2020-02-02', 'Sim', 'boleto-teste.pdf', '0.00', NULL, NULL),
(14, 13, '90.00', '2020-03-02', 'Não', NULL, '0.00', NULL, NULL),
(15, 13, '90.00', '2020-04-02', 'Não', NULL, '0.00', NULL, NULL),
(16, 13, '90.00', '2020-05-02', 'Não', NULL, '0.00', NULL, NULL),
(17, 13, '90.00', '2020-06-02', 'Não', NULL, '0.00', NULL, NULL),
(18, 13, '90.00', '2020-07-02', 'Não', NULL, '0.00', NULL, NULL),
(19, 13, '90.00', '2020-08-02', 'Não', NULL, '0.00', NULL, NULL),
(20, 13, '90.00', '2020-09-02', 'Não', NULL, '0.00', NULL, NULL),
(21, 13, '90.00', '2020-10-02', 'Não', NULL, '0.00', NULL, NULL),
(22, 13, '90.00', '2020-11-02', 'Não', NULL, '0.00', NULL, NULL),
(23, 13, '90.00', '2020-12-02', 'Não', NULL, '0.00', NULL, NULL),
(24, 13, '90.00', '2021-01-02', 'Não', NULL, '0.00', NULL, NULL),
(25, 14, '80.00', '2019-01-01', 'Sim', 'boleto-teste.pdf', '0.00', NULL, NULL),
(26, 14, '80.00', '2019-02-01', 'Sim', 'boleto-teste.pdf', '0.00', NULL, NULL),
(27, 14, '80.00', '2019-03-01', 'Sim', NULL, '0.00', NULL, NULL),
(28, 14, '80.00', '2019-04-01', 'Sim', NULL, '0.00', NULL, NULL),
(29, 14, '80.00', '2019-05-01', 'Não', NULL, '0.00', NULL, NULL),
(30, 14, '80.00', '2019-06-01', 'Não', NULL, '0.00', NULL, NULL),
(31, 14, '80.00', '2019-07-01', 'Não', NULL, '0.00', NULL, NULL),
(32, 14, '80.00', '2019-08-01', 'Não', NULL, '0.00', NULL, NULL),
(33, 14, '80.00', '2019-09-01', 'Não', NULL, '0.00', NULL, NULL),
(34, 14, '80.00', '2019-10-01', 'Não', NULL, '0.00', NULL, NULL),
(35, 14, '80.00', '2019-11-01', 'Não', NULL, '0.00', NULL, NULL),
(36, 14, '80.00', '2019-12-01', 'Não', NULL, '0.00', NULL, NULL),
(37, 14, '80.00', '2020-01-01', 'Não', NULL, '0.00', NULL, NULL),
(38, 14, '80.00', '2020-02-01', 'Não', NULL, '0.00', NULL, NULL),
(39, 14, '80.00', '2020-03-01', 'Não', NULL, '0.00', NULL, NULL),
(40, 14, '80.00', '2020-04-01', 'Não', NULL, '0.00', NULL, NULL),
(41, 14, '80.00', '2020-05-01', 'Não', NULL, '0.00', NULL, NULL),
(42, 14, '80.00', '2020-06-01', 'Não', NULL, '0.00', NULL, NULL),
(43, 14, '80.00', '2020-07-01', 'Não', NULL, '0.00', NULL, NULL),
(44, 14, '80.00', '2020-08-01', 'Não', NULL, '0.00', NULL, NULL),
(45, 14, '80.00', '2020-09-01', 'Não', NULL, '0.00', NULL, NULL),
(46, 14, '80.00', '2020-10-01', 'Não', NULL, '0.00', NULL, NULL),
(47, 14, '80.00', '2020-11-01', 'Não', NULL, '0.00', NULL, NULL),
(48, 14, '80.00', '2020-12-01', 'Não', NULL, '0.00', NULL, NULL),
(49, 15, '50.00', '2020-12-01', 'Sim', 'boleto-teste.pdf', '0.00', NULL, NULL),
(50, 15, '50.00', '2021-01-01', 'Sim', NULL, '0.00', NULL, NULL),
(51, 15, '50.00', '2021-02-01', 'Sim', NULL, '0.00', NULL, NULL),
(52, 15, '50.00', '2021-03-01', 'Não', NULL, '0.00', NULL, NULL),
(53, 15, '50.00', '2021-04-01', 'Não', NULL, '0.00', NULL, NULL),
(54, 15, '50.00', '2021-05-01', 'Não', NULL, '0.00', NULL, NULL),
(55, 15, '50.00', '2021-06-01', 'Não', NULL, '0.00', NULL, NULL),
(56, 15, '50.00', '2021-07-01', 'Não', NULL, '0.00', NULL, NULL),
(57, 15, '50.00', '2021-08-01', 'Não', NULL, '0.00', NULL, NULL),
(58, 15, '50.00', '2021-09-01', 'Não', NULL, '0.00', NULL, NULL),
(59, 15, '50.00', '2021-10-01', 'Não', NULL, '0.00', NULL, NULL),
(60, 15, '50.00', '2021-11-01', 'Não', NULL, '0.00', NULL, NULL),
(61, 16, '60.00', '2020-11-01', 'Sim', NULL, '0.00', NULL, NULL),
(62, 16, '60.00', '2020-12-01', 'Sim', NULL, '0.00', NULL, NULL),
(63, 16, '60.00', '2021-01-01', 'Não', NULL, '0.00', NULL, NULL),
(64, 16, '60.00', '2021-02-01', 'Não', NULL, '0.00', NULL, NULL),
(65, 16, '60.00', '2021-03-01', 'Não', NULL, '0.00', NULL, NULL),
(66, 16, '60.00', '2021-04-01', 'Não', NULL, '0.00', NULL, NULL),
(67, 16, '60.00', '2021-05-01', 'Não', NULL, '0.00', NULL, NULL),
(68, 16, '60.00', '2021-06-01', 'Não', NULL, '0.00', NULL, NULL),
(69, 16, '60.00', '2021-07-01', 'Não', NULL, '0.00', NULL, NULL),
(70, 16, '60.00', '2021-08-01', 'Não', NULL, '0.00', NULL, NULL),
(71, 16, '60.00', '2021-09-01', 'Não', NULL, '0.00', NULL, NULL),
(72, 16, '60.00', '2021-10-01', 'Não', NULL, '0.00', NULL, NULL),
(73, 17, '80.00', '2019-01-01', 'Sim', NULL, '0.00', NULL, NULL),
(74, 17, '80.00', '2019-02-01', 'Sim', NULL, '0.00', NULL, NULL),
(75, 17, '80.00', '2019-03-01', 'Sim', NULL, '0.00', NULL, NULL),
(76, 17, '80.00', '2019-04-01', 'Sim', NULL, '80.00', '2022-11-01', NULL),
(77, 17, '80.00', '2019-05-01', 'Não', NULL, '0.00', NULL, NULL),
(78, 17, '80.00', '2019-06-01', 'Não', NULL, '0.00', NULL, NULL),
(79, 17, '80.00', '2019-07-01', 'Não', NULL, '0.00', NULL, NULL),
(80, 17, '80.00', '2019-08-01', 'Não', NULL, '0.00', NULL, NULL),
(81, 17, '80.00', '2019-09-01', 'Não', NULL, '0.00', NULL, NULL),
(82, 17, '80.00', '2019-10-01', 'Não', NULL, '0.00', NULL, NULL),
(83, 17, '80.00', '2019-11-01', 'Não', NULL, '0.00', NULL, NULL),
(84, 17, '80.00', '2019-12-01', 'Não', NULL, '0.00', NULL, NULL),
(85, 17, '80.00', '2020-01-01', 'Não', NULL, '0.00', NULL, NULL),
(86, 17, '80.00', '2020-02-01', 'Não', NULL, '0.00', NULL, NULL),
(87, 17, '80.00', '2020-03-01', 'Não', NULL, '0.00', NULL, NULL),
(88, 17, '80.00', '2020-04-01', 'Não', NULL, '0.00', NULL, NULL),
(89, 17, '80.00', '2020-05-01', 'Não', NULL, '0.00', NULL, NULL),
(90, 17, '80.00', '2020-06-01', 'Não', NULL, '0.00', NULL, NULL),
(91, 17, '80.00', '2020-07-01', 'Não', NULL, '0.00', NULL, NULL),
(92, 17, '80.00', '2020-08-01', 'Não', NULL, '0.00', NULL, NULL),
(93, 17, '80.00', '2020-09-01', 'Não', NULL, '0.00', NULL, NULL),
(94, 17, '80.00', '2020-10-01', 'Não', NULL, '0.00', NULL, NULL),
(95, 17, '80.00', '2020-11-01', 'Não', NULL, '0.00', NULL, NULL),
(96, 17, '80.00', '2020-12-01', 'Não', NULL, '0.00', NULL, NULL),
(97, 18, '80.00', '2019-01-01', 'Sim', 'boleto-teste.pdf', '0.00', NULL, NULL),
(98, 18, '80.00', '2019-02-01', 'Sim', NULL, '0.00', NULL, NULL),
(99, 18, '80.00', '2019-03-01', 'Sim', NULL, '0.00', NULL, NULL),
(100, 18, '80.00', '2019-04-01', 'Sim', NULL, '80.00', '2022-05-05', NULL),
(101, 18, '80.00', '2019-05-01', 'Sim', NULL, '80.00', '2022-05-05', NULL),
(102, 18, '80.00', '2019-06-01', 'Sim', NULL, '80.00', '2022-11-01', NULL),
(103, 18, '80.00', '2019-07-01', 'Sim', NULL, '80.00', '2022-11-01', NULL),
(104, 18, '80.00', '2019-08-01', 'Não', NULL, '0.00', NULL, NULL),
(105, 18, '80.00', '2019-09-01', 'Não', NULL, '0.00', NULL, NULL),
(106, 18, '80.00', '2019-10-01', 'Não', NULL, '0.00', NULL, NULL),
(107, 18, '80.00', '2019-11-01', 'Não', NULL, '0.00', NULL, NULL),
(108, 18, '80.00', '2019-12-01', 'Não', NULL, '0.00', NULL, NULL),
(109, 18, '80.00', '2020-01-01', 'Não', NULL, '0.00', NULL, NULL),
(110, 18, '80.00', '2020-02-01', 'Não', NULL, '0.00', NULL, NULL),
(111, 18, '80.00', '2020-03-01', 'Não', NULL, '0.00', NULL, NULL),
(112, 18, '80.00', '2020-04-01', 'Não', NULL, '0.00', NULL, NULL),
(113, 18, '80.00', '2020-05-01', 'Não', NULL, '0.00', NULL, NULL),
(114, 18, '80.00', '2020-06-01', 'Não', NULL, '0.00', NULL, NULL),
(115, 18, '80.00', '2020-07-01', 'Não', NULL, '0.00', NULL, NULL),
(116, 18, '80.00', '2020-08-01', 'Não', NULL, '0.00', NULL, NULL),
(117, 18, '80.00', '2020-09-01', 'Não', NULL, '0.00', NULL, NULL),
(118, 18, '80.00', '2020-10-01', 'Não', NULL, '0.00', NULL, NULL),
(119, 18, '80.00', '2020-11-01', 'Não', NULL, '0.00', NULL, NULL),
(120, 18, '80.00', '2020-12-01', 'Não', NULL, '0.00', NULL, NULL),
(121, 19, '90.00', '2020-02-02', 'Não', NULL, '0.00', NULL, NULL),
(122, 19, '90.00', '2020-03-02', 'Não', NULL, '0.00', NULL, NULL),
(123, 19, '90.00', '2020-04-02', 'Não', NULL, '0.00', NULL, NULL),
(124, 19, '90.00', '2020-05-02', 'Não', NULL, '0.00', NULL, NULL),
(125, 19, '90.00', '2020-06-02', 'Não', NULL, '0.00', NULL, NULL),
(126, 19, '90.00', '2020-07-02', 'Não', NULL, '0.00', NULL, NULL),
(127, 19, '90.00', '2020-08-02', 'Não', NULL, '0.00', NULL, NULL),
(128, 19, '90.00', '2020-09-02', 'Não', NULL, '0.00', NULL, NULL),
(129, 19, '90.00', '2020-10-02', 'Não', NULL, '0.00', NULL, NULL),
(130, 19, '90.00', '2020-11-02', 'Não', NULL, '0.00', NULL, NULL),
(131, 19, '90.00', '2020-12-02', 'Não', NULL, '0.00', NULL, NULL),
(132, 19, '90.00', '2021-01-02', 'Não', NULL, '0.00', NULL, NULL),
(133, 20, '90.00', '2020-02-02', 'Não', NULL, '0.00', NULL, NULL),
(134, 20, '90.00', '2020-03-02', 'Não', NULL, '0.00', NULL, NULL),
(135, 20, '90.00', '2020-04-02', 'Não', NULL, '0.00', NULL, NULL),
(136, 20, '90.00', '2020-05-02', 'Não', NULL, '0.00', NULL, NULL),
(137, 20, '90.00', '2020-06-02', 'Não', NULL, '0.00', NULL, NULL),
(138, 20, '90.00', '2020-07-02', 'Não', NULL, '0.00', NULL, NULL),
(139, 20, '90.00', '2020-08-02', 'Não', NULL, '0.00', NULL, NULL),
(140, 20, '90.00', '2020-09-02', 'Não', NULL, '0.00', NULL, NULL),
(141, 20, '90.00', '2020-10-02', 'Não', NULL, '0.00', NULL, NULL),
(142, 20, '90.00', '2020-11-02', 'Não', NULL, '0.00', NULL, NULL),
(143, 20, '90.00', '2020-12-02', 'Não', NULL, '0.00', NULL, NULL),
(144, 20, '90.00', '2021-01-02', 'Não', NULL, '0.00', NULL, NULL),
(145, 21, '50.00', '2020-12-01', 'Não', NULL, '0.00', NULL, NULL),
(146, 21, '50.00', '2021-01-01', 'Não', NULL, '0.00', NULL, NULL),
(147, 21, '50.00', '2021-02-01', 'Não', NULL, '0.00', NULL, NULL),
(148, 21, '50.00', '2021-03-01', 'Não', NULL, '0.00', NULL, NULL),
(149, 21, '50.00', '2021-04-01', 'Não', NULL, '0.00', NULL, NULL),
(150, 21, '50.00', '2021-05-01', 'Não', NULL, '0.00', NULL, NULL),
(151, 21, '50.00', '2021-06-01', 'Não', NULL, '0.00', NULL, NULL),
(152, 21, '50.00', '2021-07-01', 'Não', NULL, '0.00', NULL, NULL),
(153, 21, '50.00', '2021-08-01', 'Não', NULL, '0.00', NULL, NULL),
(154, 21, '50.00', '2021-09-01', 'Não', NULL, '0.00', NULL, NULL),
(155, 21, '50.00', '2021-10-01', 'Não', NULL, '0.00', NULL, NULL),
(156, 21, '50.00', '2021-11-01', 'Não', NULL, '0.00', NULL, NULL),
(157, 22, '50.00', '2020-12-01', 'Não', NULL, '0.00', NULL, NULL),
(158, 22, '50.00', '2021-01-01', 'Não', NULL, '0.00', NULL, NULL),
(159, 22, '50.00', '2021-02-01', 'Não', NULL, '0.00', NULL, NULL),
(160, 22, '50.00', '2021-03-01', 'Não', NULL, '0.00', NULL, NULL),
(161, 22, '50.00', '2021-04-01', 'Não', NULL, '0.00', NULL, NULL),
(162, 22, '50.00', '2021-05-01', 'Não', NULL, '0.00', NULL, NULL),
(163, 22, '50.00', '2021-06-01', 'Não', NULL, '0.00', NULL, NULL),
(164, 22, '50.00', '2021-07-01', 'Não', NULL, '0.00', NULL, NULL),
(165, 22, '50.00', '2021-08-01', 'Não', NULL, '0.00', NULL, NULL),
(166, 22, '50.00', '2021-09-01', 'Não', NULL, '0.00', NULL, NULL),
(167, 22, '50.00', '2021-10-01', 'Não', NULL, '0.00', NULL, NULL),
(168, 22, '50.00', '2021-11-01', 'Não', NULL, '0.00', NULL, NULL),
(169, 23, '50.00', '2020-12-01', 'Não', NULL, '0.00', NULL, NULL),
(170, 23, '50.00', '2021-01-01', 'Não', NULL, '0.00', NULL, NULL),
(171, 23, '50.00', '2021-02-01', 'Não', NULL, '0.00', NULL, NULL),
(172, 23, '50.00', '2021-03-01', 'Não', NULL, '0.00', NULL, NULL),
(173, 23, '50.00', '2021-04-01', 'Não', NULL, '0.00', NULL, NULL),
(174, 23, '50.00', '2021-05-01', 'Não', NULL, '0.00', NULL, NULL),
(175, 23, '50.00', '2021-06-01', 'Não', NULL, '0.00', NULL, NULL),
(176, 23, '50.00', '2021-07-01', 'Não', NULL, '0.00', NULL, NULL),
(177, 23, '50.00', '2021-08-01', 'Não', NULL, '0.00', NULL, NULL),
(178, 23, '50.00', '2021-09-01', 'Não', NULL, '0.00', NULL, NULL),
(179, 23, '50.00', '2021-10-01', 'Não', NULL, '0.00', NULL, NULL),
(180, 23, '50.00', '2021-11-01', 'Não', NULL, '0.00', NULL, NULL),
(181, 24, '80.00', '2019-01-01', 'Sim', NULL, '0.00', NULL, NULL),
(182, 24, '80.00', '2019-02-01', 'Sim', NULL, '0.00', NULL, NULL),
(183, 24, '80.00', '2019-03-01', 'Sim', NULL, '0.00', NULL, NULL),
(184, 24, '80.00', '2019-04-01', 'Sim', NULL, '80.00', '2022-11-01', NULL),
(185, 24, '80.00', '2019-05-01', 'Não', NULL, '0.00', NULL, NULL),
(186, 24, '80.00', '2019-06-01', 'Não', NULL, '0.00', NULL, NULL),
(187, 24, '80.00', '2019-07-01', 'Não', NULL, '0.00', NULL, NULL),
(188, 24, '80.00', '2019-08-01', 'Não', NULL, '0.00', NULL, NULL),
(189, 24, '80.00', '2019-09-01', 'Não', NULL, '0.00', NULL, NULL),
(190, 24, '80.00', '2019-10-01', 'Não', NULL, '0.00', NULL, NULL),
(191, 24, '80.00', '2019-11-01', 'Não', NULL, '0.00', NULL, NULL),
(192, 24, '80.00', '2019-12-01', 'Não', NULL, '0.00', NULL, NULL),
(193, 24, '80.00', '2020-01-01', 'Não', NULL, '0.00', NULL, NULL),
(194, 24, '80.00', '2020-02-01', 'Não', NULL, '0.00', NULL, NULL),
(195, 24, '80.00', '2020-03-01', 'Não', NULL, '0.00', NULL, NULL),
(196, 24, '80.00', '2020-04-01', 'Não', NULL, '0.00', NULL, NULL),
(197, 24, '80.00', '2020-05-01', 'Não', NULL, '0.00', NULL, NULL),
(198, 24, '80.00', '2020-06-01', 'Não', NULL, '0.00', NULL, NULL),
(199, 24, '80.00', '2020-07-01', 'Não', NULL, '0.00', NULL, NULL),
(200, 24, '80.00', '2020-08-01', 'Não', NULL, '0.00', NULL, NULL),
(201, 24, '80.00', '2020-09-01', 'Não', NULL, '0.00', NULL, NULL),
(202, 24, '80.00', '2020-10-01', 'Não', NULL, '0.00', NULL, NULL),
(203, 24, '80.00', '2020-11-01', 'Não', NULL, '0.00', NULL, NULL),
(204, 24, '80.00', '2020-12-01', 'Não', NULL, '0.00', NULL, NULL),
(205, 25, '90.00', '2020-02-02', 'Não', NULL, '0.00', NULL, NULL),
(206, 25, '90.00', '2020-03-02', 'Não', NULL, '0.00', NULL, NULL),
(207, 25, '90.00', '2020-04-02', 'Não', NULL, '0.00', NULL, NULL),
(208, 25, '90.00', '2020-05-02', 'Não', NULL, '0.00', NULL, NULL),
(209, 25, '90.00', '2020-06-02', 'Não', NULL, '0.00', NULL, NULL),
(210, 25, '90.00', '2020-07-02', 'Não', NULL, '0.00', NULL, NULL),
(211, 25, '90.00', '2020-08-02', 'Não', NULL, '0.00', NULL, NULL),
(212, 25, '90.00', '2020-09-02', 'Não', NULL, '0.00', NULL, NULL),
(213, 25, '90.00', '2020-10-02', 'Não', NULL, '0.00', NULL, NULL),
(214, 25, '90.00', '2020-11-02', 'Não', NULL, '0.00', NULL, NULL),
(215, 25, '90.00', '2022-11-01', 'Sim', NULL, '90.00', '2022-11-01', NULL),
(217, 30, '300.00', '2021-06-01', 'Não', NULL, '0.00', NULL, NULL),
(218, 30, '300.00', '2021-07-01', 'Não', NULL, '0.00', NULL, NULL),
(219, 30, '300.00', '2021-08-01', 'Não', NULL, '0.00', NULL, NULL),
(220, 30, '300.00', '2021-09-01', 'Não', NULL, '0.00', NULL, NULL),
(221, 30, '300.00', '2021-10-01', 'Não', NULL, '0.00', NULL, NULL),
(222, 30, '300.00', '2021-11-01', 'Não', NULL, '0.00', NULL, NULL),
(223, 30, '300.00', '2021-12-01', 'Não', NULL, '0.00', NULL, NULL),
(224, 30, '300.00', '2022-01-01', 'Não', NULL, '0.00', NULL, NULL),
(225, 30, '300.00', '2022-02-01', 'Não', NULL, '0.00', NULL, NULL),
(226, 30, '300.00', '2022-03-01', 'Não', NULL, '0.00', NULL, NULL),
(227, 30, '300.00', '2022-04-01', 'Não', NULL, '0.00', NULL, NULL),
(228, 30, '300.00', '2022-05-01', 'Não', NULL, '0.00', NULL, NULL),
(229, 30, '300.00', '2022-06-01', 'Não', NULL, '0.00', NULL, NULL),
(230, 32, '60.00', '2023-01-01', 'Sim', NULL, '60.00', '2022-11-01', '486417503'),
(231, 32, '60.00', '2023-02-01', 'Não', 'Boleto_Marina-Silva_01_01_2023_486417503.pdf', '0.00', NULL, '486413236'),
(232, 32, '60.00', '2023-03-01', 'Sim', NULL, '60.00', '2022-11-01', '413985942'),
(233, 32, '60.00', '2023-04-01', 'Não', NULL, '0.00', NULL, '486687058'),
(234, 32, '60.00', '2023-05-01', 'Não', NULL, '0.00', NULL, NULL),
(235, 33, '50.00', '2023-02-01', 'Não', NULL, '0.00', NULL, NULL),
(236, 33, '50.00', '2023-03-01', 'Não', NULL, '0.00', NULL, NULL),
(237, 33, '50.00', '2023-04-01', 'Não', NULL, '0.00', NULL, NULL),
(238, 33, '50.00', '2023-05-01', 'Não', NULL, '0.00', NULL, NULL),
(239, 33, '50.00', '2023-06-01', 'Não', NULL, '0.00', NULL, NULL),
(240, 33, '50.00', '2023-07-01', 'Não', NULL, '0.00', NULL, NULL),
(241, 33, '50.00', '2023-08-01', 'Não', NULL, '0.00', NULL, NULL),
(242, 33, '50.00', '2023-09-01', 'Não', NULL, '0.00', NULL, NULL),
(243, 34, '50.00', '2023-02-01', 'Sim', NULL, '50.00', '2022-11-01', NULL),
(244, 34, '50.00', '2023-03-01', 'Não', NULL, '0.00', NULL, NULL),
(245, 34, '50.00', '2023-04-01', 'Não', NULL, '0.00', NULL, NULL),
(246, 34, '50.00', '2023-05-01', 'Não', NULL, '0.00', NULL, NULL),
(247, 34, '50.00', '2023-06-01', 'Não', NULL, '0.00', NULL, NULL),
(248, 34, '50.00', '2023-07-01', 'Não', NULL, '0.00', NULL, NULL),
(249, 34, '50.00', '2023-08-01', 'Não', NULL, '0.00', NULL, NULL),
(250, 34, '50.00', '2023-09-01', 'Não', NULL, '0.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `foto`) VALUES
(3, 'Professor Teste', '777.777.777-77', '(77) 77777-7777', 'professor@hotmail.com', 'Rua Almeida Campos 150', 'usuario-icone.jpg'),
(4, 'Hugo Vasconcelos', '788.888.888-88', '(88) 88888-8888', 'hugovasconcelosf@hotmail.com', 'Rua Almeida Campos 150', 'hugo-profile.jpeg'),
(5, 'Professor 3', '845.555.555-55', '(55) 54222-2222', 'professor3@hotmail.com', 'Rua 5', 'sem-foto.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis`
--

CREATE TABLE `responsaveis` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `responsaveis`
--

INSERT INTO `responsaveis` (`id`, `nome`, `cpf`, `email`, `telefone`, `endereco`) VALUES
(1, 'Katia Silva', '111.111.111-11', 'katia@hotmail.com', '(55) 55555-5555', 'Rua 5'),
(2, 'Kamilah Souza', '222.222.222-22', 'kamila@hotmail.com', '(22) 22222-2222', 'Rua C'),
(3, 'Tamara Freitas', '333.333.333-33', 'tamara@hotmail.com', '(33) 33333-3333', 'Rua G');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `sala` varchar(30) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `sala`, `descricao`) VALUES
(1, '101', 'Segunda 09:00'),
(2, '102', 'Segunda 13:00'),
(3, '103', 'Segunda 18:00'),
(5, '104', 'Segunda 22:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretarios`
--

CREATE TABLE `secretarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `secretarios`
--

INSERT INTO `secretarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`) VALUES
(5, 'Marcos Paulo', 'marcos@hotmail.com', '555.555.555-55', '(55) 55555-5555', 'Rua Almeida Campos 145'),
(6, 'Secretário Teste', 'secretario@hotmail.com', '222.222.222-22', '(22) 22222-2222', 'Rua C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tesoureiros`
--

CREATE TABLE `tesoureiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tesoureiros`
--

INSERT INTO `tesoureiros` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`) VALUES
(3, 'Tesoureiro Teste', '444.444.455-55', '(55) 55555-5555', 'tesoureiro@hotmail.com', 'Rua Almeida Campos 150'),
(4, 'Rubens Silva', '789.541.222-22', '(45) 55555-5555', 'rubens@hotmail.com', 'Rua C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `disciplina` int(11) NOT NULL,
  `sala` int(11) NOT NULL,
  `professor` int(11) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `horario` varchar(30) DEFAULT NULL,
  `dia` varchar(30) DEFAULT NULL,
  `valor_mensalidade` decimal(7,2) DEFAULT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `disciplina`, `sala`, `professor`, `data_inicio`, `data_final`, `horario`, `dia`, `valor_mensalidade`, `ano`) VALUES
(1, 1, 2, 3, '2019-01-01', '2021-01-01', '8:00 as 12:00', 'Sexta-Feira', '80.00', 2020),
(2, 4, 1, 4, '2020-02-02', '2021-02-02', '13:00 as 17:00', 'Segunda a Sexta', '90.00', 2020),
(3, 2, 5, 4, '2019-12-01', '2020-11-01', '13:00 as 17:00', 'Segunda a Sexta', '50.00', 2020),
(4, 5, 3, 3, '2020-11-01', '2021-11-01', '8:00 as 12:00', 'Sexta-Feira', '60.00', 2020),
(5, 8, 2, 4, '2023-01-01', '2023-06-01', '10:00 as 12:00', 'Segunda A Sexta', '60.00', 2021),
(6, 4, 1, 4, '2023-02-01', '2023-10-01', '15:00 as 17:00', 'Segunda A Sexta', '50.00', 2021),
(7, 6, 3, 4, '2021-06-01', '2022-07-01', '7:00 as 11:00', 'Segunda A Sexta', '300.00', 2021);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(25) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`) VALUES
(5, 'Marcos Pedro', '555.555.555-55', 'marcos@hotmail.com', '123', 'secretaria'),
(6, 'Secretário Teste', '222.222.222-22', 'secretario@hotmail.com', '123', 'secretaria'),
(9, 'Professor Teste', '777.777.777-77', 'professor@hotmail.com', '123', 'professor'),
(12, 'Administrador', '000.000.000-00', 'contato@hugocursos.com.br', '123', 'Admin'),
(13, 'Felipe Santos', '788.888.888-88', 'felipe@hotmail.com', '123', 'secretaria'),
(15, 'Felipe Santos', '788.888.888-88', 'felipe@hotmail.com', '123', 'aluno'),
(16, 'Mariano Campos', '789.555.555-55', 'mariano@hotmail.com', '123', 'aluno'),
(17, 'Marina Silva', '030.992.190-29', 'marina@hotmail.com', '123', 'aluno'),
(19, 'Rui Costa Silva', '488.888.888-88', 'rui@hotmail.com', '123', 'aluno'),
(20, 'Tesoureiro Teste', '444.444.455-55', 'tesoureiro@hotmail.com', '123', 'tesoureiro'),
(21, 'Rubens Silva', '789.541.222-22', 'rubens@hotmail.com', '123', 'tesoureiro'),
(22, 'Hugo Vasconcelos', '788.888.888-88', 'hugovasconcelosf@hotmail.com', '123', 'professor'),
(23, 'Fabricio Silva', '789.522.222-22', 'fabricio@hotmail.com', '123', 'aluno'),
(24, 'Aluno de Teste', '000.000.000-00', 'batista@hotmail.com', '123', 'aluno'),
(25, 'Administrador', '000.000.000-00', 'admin@hotmail.com', '123', 'Admin'),
(26, 'Professor 3', '845.555.555-55', 'professor3@hotmail.com', '123', 'professor');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `arquivos_alunos`
--
ALTER TABLE `arquivos_alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chamadas`
--
ALTER TABLE `chamadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modulos_turmas`
--
ALTER TABLE `modulos_turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pgto_matriculas`
--
ALTER TABLE `pgto_matriculas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `secretarios`
--
ALTER TABLE `secretarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tesoureiros`
--
ALTER TABLE `tesoureiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `arquivos_alunos`
--
ALTER TABLE `arquivos_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `chamadas`
--
ALTER TABLE `chamadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `modulos_turmas`
--
ALTER TABLE `modulos_turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `pgto_matriculas`
--
ALTER TABLE `pgto_matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `secretarios`
--
ALTER TABLE `secretarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tesoureiros`
--
ALTER TABLE `tesoureiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
