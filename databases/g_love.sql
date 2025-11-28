-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-11-2025 a las 01:23:29
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `g_love`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_asociar_juego_categoria` (IN `p_game_name` VARCHAR(250), IN `p_tag_name` VARCHAR(250))   BEGIN
    -- Declaramos variables para guardar los IDs
    DECLARE v_id_game INT;
    DECLARE v_id_tag INT;

    -- 1. LÓGICA PARA EL JUEGO (GAME)
    -- Buscamos si el juego ya existe
    SELECT id_game INTO v_id_game
    FROM games
    WHERE game_name = p_game_name
    LIMIT 1;

    -- Si no existe (la variable es NULL), lo creamos y recuperamos el ID generado
    IF v_id_game IS NULL THEN
        INSERT INTO games (game_name) VALUES (p_game_name);
        SET v_id_game = LAST_INSERT_ID();
    END IF;

    -- 2. LÓGICA PARA LA ETIQUETA (TAG)
    -- Buscamos si el tag ya existe
    SELECT id_tag INTO v_id_tag
    FROM tags
    WHERE tag = p_tag_name
    LIMIT 1;

    -- Si no existe, lo creamos y recuperamos el ID generado
    IF v_id_tag IS NULL THEN
        INSERT INTO tags (tag) VALUES (p_tag_name);
        SET v_id_tag = LAST_INSERT_ID();
    END IF;

    -- 3. LÓGICA DE RELACIÓN (GAMES_TAGS)
    -- Verificamos si la relación YA existe para no duplicarla
    IF NOT EXISTS (
        SELECT 1
        FROM games_tags
        WHERE id_game = v_id_game AND id_tag = v_id_tag
    ) THEN
        -- Si no existe la relación, la insertamos
        INSERT INTO games_tags (id_game, id_tag) VALUES (v_id_game, v_id_tag);
    END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `id_game` int NOT NULL,
  `game_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id_game`, `game_name`) VALUES
(1, 'The Witcher 3: Wild Hunt'),
(2, 'Elden Ring'),
(3, 'The Elder Scrolls V: Skyrim'),
(4, 'Cyberpunk 2077'),
(5, 'Baldur\'s Gate 3'),
(6, 'Final Fantasy VII Remake'),
(7, 'Persona 5 Royal'),
(8, 'Diablo IV'),
(9, 'Dark Souls III'),
(10, 'Bloodborne'),
(11, 'Grand Theft Auto V'),
(12, 'Red Dead Redemption 2'),
(13, 'The Legend of Zelda: Breath of the Wild'),
(14, 'God of War Ragnarök'),
(15, 'The Last of Us Part I'),
(16, 'Uncharted 4: A Thief\'s End'),
(17, 'Horizon Forbidden West'),
(18, 'Marvel\'s Spider-Man 2'),
(19, 'Assassin\'s Creed Valhalla'),
(20, 'Call of Duty: Modern Warfare III'),
(21, 'Doom Eternal'),
(22, 'Halo Infinite'),
(23, 'Overwatch 2'),
(24, 'Counter-Strike 2'),
(25, 'Valorant'),
(26, 'Fortnite'),
(27, 'Apex Legends'),
(28, 'BioShock'),
(29, 'Resident Evil 4 Remake'),
(30, 'Silent Hill 2'),
(31, 'Dead Space'),
(32, 'Minecraft'),
(33, 'EA Sports FC 24'),
(34, 'NBA 2K24'),
(35, 'Gran Turismo 7'),
(36, 'Forza Horizon 5'),
(37, 'Rocket League'),
(38, 'Street Fighter 6'),
(39, 'Tekken 8'),
(40, 'Mortal Kombat 1'),
(41, 'Super Smash Bros. Ultimate'),
(42, 'Hollow Knight'),
(43, 'Hades'),
(44, 'Celeste'),
(45, 'Cuphead'),
(46, 'Stardew Valley'),
(47, 'Among Us'),
(48, 'League of Legends'),
(49, 'Dota 2'),
(50, 'Civilization VI'),
(51, 'StarCraft II'),
(52, 'Portal 2'),
(53, 'Mass Effect Legendary Edition'),
(54, 'Halo: The Master Chief Collection'),
(55, 'Destiny 2'),
(56, 'Star Wars Jedi: Survivor'),
(57, 'No Man\'s Sky'),
(58, 'Half-Life 2'),
(59, 'Outer Wilds'),
(60, 'Devil May Cry 5'),
(61, 'Bayonetta'),
(62, 'NieR: Automata'),
(63, 'Metal Gear Solid V: The Phantom Pain'),
(64, 'Batman: Arkham Knight'),
(65, 'Sekiro: Shadows Die Twice'),
(66, 'Ghost of Tsushima'),
(67, 'Fallout: New Vegas'),
(68, 'Final Fantasy XIV'),
(69, 'World of Warcraft'),
(70, 'Dragon Age: Inquisition'),
(71, 'Kingdom Hearts III'),
(72, 'Yakuza: Like a Dragon'),
(73, 'Disco Elysium'),
(74, 'Resident Evil Village'),
(75, 'Alien: Isolation'),
(76, 'Outlast'),
(77, 'Phasmophobia'),
(78, 'Dead by Daylight'),
(79, 'Alan Wake 2'),
(80, 'Age of Empires IV'),
(81, 'Total War: Warhammer III'),
(82, 'XCOM 2'),
(83, 'Cities: Skylines II'),
(84, 'The Sims 4'),
(85, 'Farming Simulator 22'),
(86, 'Left 4 Dead 2'),
(87, 'Team Fortress 2'),
(88, 'Tom Clancy\'s Rainbow Six Siege'),
(89, 'Borderlands 3'),
(90, 'PUBG: Battlegrounds'),
(91, 'Super Mario Odyssey'),
(92, 'Super Mario Wonder'),
(93, 'Ratchet & Clank: Rift Apart'),
(94, 'Crash Bandicoot 4: It\'s About Time'),
(95, 'Spyro Reignited Trilogy'),
(96, 'It Takes Two'),
(97, 'Sonic Frontiers'),
(98, 'Terraria'),
(99, 'Undertale'),
(100, 'Subnautica'),
(101, 'Ark: Survival Evolved'),
(102, 'Slay the Spire'),
(103, 'Vampire Survivors'),
(104, 'Tony Hawks Pro Skater 1 + 2'),
(105, 'Sea of Thieves');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games_tags`
--

CREATE TABLE `games_tags` (
  `id_game_tag` int NOT NULL,
  `id_game` int NOT NULL,
  `id_tag` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `games_tags`
--

INSERT INTO `games_tags` (`id_game_tag`, `id_game`, `id_tag`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 1),
(6, 3, 4),
(7, 4, 1),
(8, 4, 5),
(9, 5, 1),
(10, 5, 6),
(11, 6, 7),
(12, 7, 7),
(13, 8, 8),
(14, 9, 1),
(15, 10, 1),
(16, 11, 9),
(17, 11, 10),
(18, 12, 2),
(19, 12, 11),
(20, 13, 2),
(21, 14, 10),
(22, 15, 10),
(23, 15, 12),
(24, 16, 2),
(25, 17, 9),
(26, 18, 10),
(27, 19, 2),
(28, 20, 13),
(29, 21, 14),
(30, 22, 5),
(31, 23, 13),
(32, 24, 15),
(33, 25, 15),
(34, 26, 16),
(35, 27, 16),
(36, 28, 14),
(37, 29, 12),
(38, 30, 17),
(39, 31, 5),
(40, 32, 18),
(41, 32, 19),
(42, 33, 20),
(43, 34, 20),
(44, 35, 21),
(45, 36, 22),
(46, 37, 20),
(47, 38, 23),
(48, 39, 23),
(49, 40, 23),
(50, 41, 23),
(51, 42, 24),
(52, 43, 25),
(53, 44, 26),
(54, 45, 26),
(55, 46, 21),
(56, 47, 27),
(57, 48, 28),
(58, 49, 28),
(59, 50, 6),
(60, 51, 6),
(61, 52, 29),
(62, 53, 1),
(63, 53, 5),
(64, 54, 14),
(65, 55, 30),
(66, 56, 2),
(67, 57, 31),
(68, 58, 14),
(69, 59, 2),
(70, 60, 32),
(71, 61, 32),
(72, 62, 33),
(73, 63, 34),
(74, 64, 10),
(75, 65, 10),
(76, 66, 9),
(77, 67, 1),
(78, 68, 35),
(79, 69, 35),
(80, 70, 1),
(81, 71, 33),
(82, 72, 7),
(83, 73, 1),
(84, 74, 12),
(85, 75, 12),
(86, 76, 12),
(87, 77, 36),
(88, 78, 37),
(89, 79, 17),
(90, 80, 6),
(91, 81, 6),
(92, 82, 38),
(93, 83, 21),
(94, 84, 21),
(95, 85, 21),
(96, 86, 39),
(97, 87, 13),
(98, 88, 15),
(99, 89, 40),
(100, 90, 16),
(101, 91, 26),
(102, 92, 26),
(103, 93, 2),
(104, 94, 26),
(105, 95, 2),
(106, 96, 41),
(107, 97, 26),
(108, 98, 18),
(109, 99, 1),
(110, 100, 19),
(111, 101, 19),
(112, 102, 42),
(113, 103, 43),
(114, 104, 20),
(115, 105, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id_like` int NOT NULL,
  `id_user_from` int NOT NULL,
  `id_user_to` int NOT NULL,
  `visible` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id_message` int NOT NULL,
  `id_user_from` int NOT NULL,
  `id_user_to` int NOT NULL,
  `message` varchar(250) NOT NULL,
  `send_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id_tag` int NOT NULL,
  `tag` varchar(250) NOT NULL,
  `tag_type` enum('userTag','gameCategory','gamerType','playingSchedule') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id_tag`, `tag`, `tag_type`) VALUES
(1, 'RPG', 'gameCategory'),
(2, 'Aventura', 'gameCategory'),
(3, 'Souls-like', 'gameCategory'),
(4, 'Fantasía', 'gameCategory'),
(5, 'Ciencia Ficción', 'gameCategory'),
(6, 'Estrategia', 'gameCategory'),
(7, 'JRPG', 'gameCategory'),
(8, 'Action RPG', 'gameCategory'),
(9, 'Mundo Abierto', 'gameCategory'),
(10, 'Acción', 'gameCategory'),
(11, 'Western', 'gameCategory'),
(12, 'Terror', 'gameCategory'),
(13, 'Shooter', 'gameCategory'),
(14, 'FPS', 'gameCategory'),
(15, 'Tactical Shooter', 'gameCategory'),
(16, 'Battle Royale', 'gameCategory'),
(17, 'Terror Psicológico', 'gameCategory'),
(18, 'Sandbox', 'gameCategory'),
(19, 'Supervivencia', 'gameCategory'),
(20, 'Deportes', 'gameCategory'),
(21, 'Simulación', 'gameCategory'),
(22, 'Carreras', 'gameCategory'),
(23, 'Lucha', 'gameCategory'),
(24, 'Metroidvania', 'gameCategory'),
(25, 'Roguelike', 'gameCategory'),
(26, 'Plataformas', 'gameCategory'),
(27, 'Multijugador', 'gameCategory'),
(28, 'MOBA', 'gameCategory'),
(29, 'Puzzle', 'gameCategory'),
(30, 'MMO', 'gameCategory'),
(31, 'Exploración', 'gameCategory'),
(32, 'Hack and Slash', 'gameCategory'),
(33, 'RPG Acción', 'gameCategory'),
(34, 'Infiltración', 'gameCategory'),
(35, 'MMORPG', 'gameCategory'),
(36, 'Terror Cooperativo', 'gameCategory'),
(37, 'Terror Multijugador', 'gameCategory'),
(38, 'Estrategia Táctica', 'gameCategory'),
(39, 'Shooter Cooperativo', 'gameCategory'),
(40, 'Looter Shooter', 'gameCategory'),
(41, 'Cooperativo', 'gameCategory'),
(42, 'Cartas Roguelike', 'gameCategory'),
(43, 'Roguelite', 'gameCategory'),
(44, 'Gamer Nocturno', 'playingSchedule'),
(45, 'Gamer Diurno', 'playingSchedule'),
(46, 'Gamer Ocasional', 'gamerType'),
(47, 'Gamer Chill', 'gamerType'),
(48, 'Gamer Tryhard', 'gamerType'),
(49, 'Gamer Nocturno', 'gamerType'),
(50, 'Adicto a los Indies', 'userTag'),
(51, 'Fantasy Lover', 'userTag'),
(52, 'Shooter Enjoyer', 'userTag'),
(53, 'Speedrunner de Corazón', 'userTag'),
(54, 'Lore Hunter', 'userTag'),
(55, 'Noob con Potencial', 'userTag'),
(56, 'Afk por Merendar', 'userTag'),
(57, 'Main supp de Corazón', 'userTag'),
(58, 'Grindeador de Vida', 'userTag'),
(59, 'Plataformero o nada', 'userTag');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` enum('hombre','mujer','otro','prefiero no decirlo') NOT NULL,
  `birth` date NOT NULL,
  `identification_number` bigint NOT NULL,
  `verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_games`
--

CREATE TABLE `users_games` (
  `id_user_game` int NOT NULL,
  `id_user` int NOT NULL,
  `id_game` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_tags`
--

CREATE TABLE `users_tags` (
  `id_user_tag` int NOT NULL,
  `id_user` int NOT NULL,
  `id_tag` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`);

--
-- Indices de la tabla `games_tags`
--
ALTER TABLE `games_tags`
  ADD PRIMARY KEY (`id_game_tag`),
  ADD KEY `id_game` (`id_game`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_user_from` (`id_user_from`),
  ADD KEY `id_user_to` (`id_user_to`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_pk` (`identification_number`);

--
-- Indices de la tabla `users_games`
--
ALTER TABLE `users_games`
  ADD PRIMARY KEY (`id_user_game`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_game` (`id_game`);

--
-- Indices de la tabla `users_tags`
--
ALTER TABLE `users_tags`
  ADD PRIMARY KEY (`id_user_tag`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tag` (`id_tag`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `games_tags`
--
ALTER TABLE `games_tags`
  MODIFY `id_game_tag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_games`
--
ALTER TABLE `users_games`
  MODIFY `id_user_game` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_tags`
--
ALTER TABLE `users_tags`
  MODIFY `id_user_tag` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `games_tags`
--
ALTER TABLE `games_tags`
  ADD CONSTRAINT `games_tags_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`),
  ADD CONSTRAINT `games_tags_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`);

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_user_from`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_user_to`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `users_games`
--
ALTER TABLE `users_games`
  ADD CONSTRAINT `users_games_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `users_games_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`);

--
-- Filtros para la tabla `users_tags`
--
ALTER TABLE `users_tags`
  ADD CONSTRAINT `users_tags_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `users_tags_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
