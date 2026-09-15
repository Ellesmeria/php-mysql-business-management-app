-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 30 2026 г., 10:24
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `usuarios de la aplicacion`
--

-- --------------------------------------------------------

--
-- Структура таблицы `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `contacto` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `empresa`, `contacto`, `telefono`, `email`, `descripcion`) VALUES
(4, 'qwerty', '123', '123', 'schooplovsemen@gmail.com', '21332');

-- --------------------------------------------------------

--
-- Структура таблицы `correos`
--

CREATE TABLE `correos` (
  `id_cuenta` int(11) NOT NULL,
  `tipo_cuenta` enum('pop','imap') NOT NULL,
  `cuenta` varchar(50) NOT NULL,
  `puerto_correo_entrante` varchar(5) NOT NULL,
  `puerto_correo_saliente` varchar(5) NOT NULL,
  `servidor_correo_entrante` varchar(150) NOT NULL,
  `servidor_correo_saliente` varchar(150) NOT NULL,
  `seguridad_correo_entrante` varchar(20) NOT NULL,
  `seguridad_correo_saliente` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `correos`
--

INSERT INTO `correos` (`id_cuenta`, `tipo_cuenta`, `cuenta`, `puerto_correo_entrante`, `puerto_correo_saliente`, `servidor_correo_entrante`, `servidor_correo_saliente`, `seguridad_correo_entrante`, `seguridad_correo_saliente`, `password`) VALUES
(1, 'imap', '123@123.tyeer1', '2133', '123', 'weqwe1qwe.yeery', '4qwwqeq.htew', '123', '321', 'qweqwwq');

-- --------------------------------------------------------

--
-- Структура таблицы `dias_libres`
--

CREATE TABLE `dias_libres` (
  `id_ausencia` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `motivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `dias_libres`
--

INSERT INTO `dias_libres` (`id_ausencia`, `id_trabajador`, `fecha_inicio`, `fecha_fin`, `motivo`) VALUES
(39, 21, '2026-06-19', '2026-06-19', 'vacaciones'),
(42, 21, '2026-06-25', '2026-06-26', 'enfermedad'),
(43, 21, '2026-06-20', '2026-06-23', 'enfermedad'),
(44, 21, '2026-06-18', '2026-06-18', 'enfermedad'),
(45, 21, '2026-06-16', '2026-06-16', 'enfermedad');

-- --------------------------------------------------------

--
-- Структура таблицы `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_documento` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `documentos`
--

INSERT INTO `documentos` (`id_documento`, `id_trabajador`, `id_usuario`, `nombre_documento`, `fecha`, `ruta`) VALUES
(123255, 21, 5, '1324', '2026-06-23', 'trabajadores/documentos/21/123255.pdf'),
(123256, 21, 5, '5', '2026-06-23', 'trabajadores/documentos/21/123256.pdf'),
(123257, 21, 5, 'qwe', '2026-06-23', 'trabajadores/documentos/21/123257.pdf');

-- --------------------------------------------------------

--
-- Структура таблицы `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `codico_postal` char(5) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `persona_contacto` varchar(50) NOT NULL,
  `actividad` varchar(100) NOT NULL,
  `num_trabajadores` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre`, `direccion`, `localidad`, `provincia`, `codico_postal`, `telefono`, `email`, `persona_contacto`, `actividad`, `num_trabajadores`) VALUES
(1, 'Asus', 'Calle Metal·lurgia, 38, Planta 1', 'Barcelona', 'Catalonia', '08038', '932938154', 'joan_garcia@asus.com', ' Antonio Campos', 'Fabricación y venta de ordenadores y componentes electrónicos', 85);

-- --------------------------------------------------------

--
-- Структура таблицы `partes_trabajo`
--

CREATE TABLE `partes_trabajo` (
  `id_parte_trabajo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `problema` varchar(255) NOT NULL,
  `solucion` text NOT NULL,
  `solucionado` enum('Si','No') NOT NULL DEFAULT 'No',
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `partes_trabajo`
--

INSERT INTO `partes_trabajo` (`id_parte_trabajo`, `id_usuario`, `fecha`, `problema`, `solucion`, `solucionado`, `observaciones`) VALUES
(2, 5, '2026-06-25 11:10:51', 'qwerty', '12345', 'Si', '54321'),
(3, 5, '2026-06-25 13:25:16', '1234', '123', 'No', '312'),
(4, 5, '2026-06-25 12:47:50', 'qwe', 'ewq', 'Si', 'wqe'),
(5, 5, '2026-06-25 13:13:14', '123', '32', 'Si', '123'),
(6, 5, '2026-06-25 13:26:39', '123', '231', 'No', '123'),
(9, 5, '2026-06-25 13:28:36', 'semen', '123', 'Si', '123'),
(10, 5, '2026-06-25 13:31:37', 'gqrkhhkrqkqrhkqwrhk', 'wrqllqwrklkjqwhq wrlkhqqw rhlhqhqwr hllhk qwr hqw rhhqwkq wrhqwrwrqllqwrklkjqwhq wrlkhqqw rhlhqhqwr hllhk qwr hqw rhhqwkq wrhqwrjlk hlwrq hhqwr hlwqrhjlq wrh wqrlkqrqwr hrqw hkhwrwrqllqwrklkjqwhq wrlkhqqw rhlhqhqwr hllhk qwr hqw rhhqwkq wrhqwrjlk hlwrq hhqwr hlwqrhjlq wrh wqrlkqrqwr hrqw hkhwrjlk hlwrq hhqwr hlwqrhjlq wrh wqrlkqrqwr hrqw hkhwr', 'Si', 'wrqllqwrklkjqwhq wrlkhqqw rhlhqhqwr hllhk qwr hqw rhhqwkq wrhqwrjlk hlwrq hhqwr hlwqrhjlq wrh wqrlkqrqwr hrqw hkhwrwrqllqwrklkjqwhq wrlkhqqw rhlhqhqwr hllhk qwr hqw rhhqwkq wrhqwrjlk hlwrq hhqwr hlwqrhjlq wrh wqrlkqrqwr hrqw hkhwrwrqllqwrklkjqwhq wrlkhqqw rhlhqhqwr hllhk qwr hqw rhhqwkq wrhqwrjlk hlwrq hhqwr hlwqrhjlq wrh wqrlkqrqwr hrqw hkhwr'),
(11, 5, '2026-06-26 09:28:45', 'asd', 'asd', 'Si', 'asddsa'),
(12, 5, '0000-00-00 00:00:00', '231', '132', 'Si', '2313'),
(13, 5, '2026-06-13 12:52:00', 'agua', 'exelente', 'Si', 'he bebido33'),
(14, 5, '2026-05-07 10:28:00', 'wqewqe', 'weqeqwewqewqweq', 'No', 'ewqqeewqewq');

-- --------------------------------------------------------

--
-- Структура таблицы `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `pregunta` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `id_usuario`, `titulo`, `pregunta`, `fecha`) VALUES
(16, 5, 'Cómo puedo mejorar mi español más rápido?', 'Cuerpo de la pregunta:\r\nHola a todos. Estoy estudiando español, pero a veces siento que avanzo muy despacio. Entiendo algunas palabras cuando leo, pero cuando tengo que hablar me bloqueo mucho. Qué consejos podéis darme para mejorar mi nivel y hablar con más seguridad?', '2026-06-15'),
(17, NULL, 'Qué lugares recomendáis visitar en Granada?', 'Buenas tardes. Vivo en Granada desde hace poco tiempo y quiero conocer mejor la ciudad. Ya he visto algunas zonas del centro, pero me gustaría visitar lugares bonitos, tranquilos o interesantes. Qué sitios recomendáis para pasear o pasar una tarde agradable?', '2026-06-15');

-- --------------------------------------------------------

--
-- Структура таблицы `respuestas`
--

CREATE TABLE `respuestas` (
  `id_respuesta` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `respuestas`
--

INSERT INTO `respuestas` (`id_respuesta`, `id_pregunta`, `id_usuario`, `fecha`, `texto`) VALUES
(22, 16, 8, '2026-06-15', 'A mí me ayudó mucho escuchar español todos los días. No hace falta entender todo. Puedes empezar con vídeos cortos, podcasts fáciles o series con subtítulos en español.'),
(23, 16, NULL, '2026-06-15', 'Yo creo que lo más importante es practicar la conversación. Aunque tengas errores, tienes que hablar. Puedes preparar frases básicas y repetirlas en diferentes situaciones.'),
(46, 17, 5, '2026-06-24', '123'),
(47, 17, 5, '2026-06-24', '123'),
(48, 17, 5, '2026-06-24', '123'),
(49, 17, 5, '2026-06-24', '123'),
(50, 17, 5, '2026-06-24', '123'),
(51, 17, 5, '2026-06-24', 'qwe'),
(52, 17, 5, '2026-06-24', 'qew'),
(53, 17, 5, '2026-06-24', '312'),
(54, 17, 5, '2026-06-24', '132');

-- --------------------------------------------------------

--
-- Структура таблицы `seguimientos`
--

CREATE TABLE `seguimientos` (
  `id_seguimiento` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text NOT NULL,
  `tipo_contacto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `seguimientos`
--

INSERT INTO `seguimientos` (`id_seguimiento`, `id_servicio`, `id_empresa`, `fecha`, `comentario`, `tipo_contacto`) VALUES
(4, 2, 1, '2026-06-24', '123321', 'telefono'),
(5, 2, 1, '2026-06-24', '132321', 'telefono'),
(6, 2, 1, '2026-06-24', 'ogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgj', 'email'),
(7, 2, 1, '2026-06-24', 'ogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgj', 'email'),
(8, 2, 1, '2026-06-24', 'ogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgj', 'email'),
(9, 2, 1, '2026-06-24', 'ogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgj', 'email'),
(10, 2, 1, '2026-06-24', 'ogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgj', 'email'),
(12, 2, 1, '2026-06-24', 'ogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgjogyqrgrgrwgrqwgqg wr ggqrwghk kgh ghkqghkwghrgkqwgkjqwrkhq wrgqg rqrqw gkwgkwgkhgj', 'email'),
(14, 2, 1, '2026-06-24', '123312', 'email'),
(15, 2, 1, '2026-06-24', '123312', 'whatsapp'),
(16, 2, 1, '2026-06-24', '123312', 'telefono'),
(17, 2, 1, '2026-06-24', '123312', 'telefono'),
(35, 2, 1, '2026-06-24', '123', 'visita'),
(36, 2, 1, '2026-06-24', '123', 'email'),
(42, 2, 1, '2026-06-24', '12312312312', 'email'),
(47, 3, 1, '2026-06-25', '213321', 'whatsapp');

-- --------------------------------------------------------

--
-- Структура таблицы `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre`) VALUES
(3, '1234'),
(4, 'limpieza'),
(2, 'Reparar ordenadores');

-- --------------------------------------------------------

--
-- Структура таблицы `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_trabajador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasena_pc` varchar(30) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `puerto` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_email` varchar(30) NOT NULL,
  `numero_telefono` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `trabajadores`
--

INSERT INTO `trabajadores` (`id_trabajador`, `nombre`, `contrasena_pc`, `ip`, `puerto`, `email`, `password_email`, `numero_telefono`) VALUES
(21, 'Semen', '12345', '192.168.0.1', '8080', 'schooplovsemen@gmail.com', 'schooplovsemen@gmail.com', '132'),
(22, 'Ana', '1234', '192.168.0.1', '2', '123123@swqe.rqwqrw', '1242414', '124214241'),
(23, 'Kseniia', 'qwerty', '192.168.255.255', '65432', 'ksenia@hmail.com', '1234', '614558833'),
(24, 'Rick', 'trewq', '192.168.0.5', '8081', 'rick@gmail.com', '1234', '55421355');

-- --------------------------------------------------------

--
-- Структура таблицы `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `user`, `password`) VALUES
(5, 'Semion', '1', '1'),
(8, 'Kseniia1', '2', '2'),
(10, 'asus', '123', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Индексы таблицы `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Индексы таблицы `dias_libres`
--
ALTER TABLE `dias_libres`
  ADD PRIMARY KEY (`id_ausencia`),
  ADD KEY `id_trabajador` (`id_trabajador`);

--
-- Индексы таблицы `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `id_trabajador` (`id_trabajador`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Индексы таблицы `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Индексы таблицы `partes_trabajo`
--
ALTER TABLE `partes_trabajo`
  ADD PRIMARY KEY (`id_parte_trabajo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Индексы таблицы `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `preguntas_ibfk_1` (`id_usuario`);

--
-- Индексы таблицы `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `respuestas_ibfk_1` (`id_pregunta`),
  ADD KEY `respuestas_ibfk_2` (`id_usuario`);

--
-- Индексы таблицы `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`id_seguimiento`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Индексы таблицы `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Индексы таблицы `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_trabajador`);

--
-- Индексы таблицы `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `correos`
--
ALTER TABLE `correos`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `dias_libres`
--
ALTER TABLE `dias_libres`
  MODIFY `id_ausencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123260;

--
-- AUTO_INCREMENT для таблицы `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `partes_trabajo`
--
ALTER TABLE `partes_trabajo`
  MODIFY `id_parte_trabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `id_seguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dias_libres`
--
ALTER TABLE `dias_libres`
  ADD CONSTRAINT `dias_libres_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`) ON DELETE CASCADE,
  ADD CONSTRAINT `documentos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Ограничения внешнего ключа таблицы `partes_trabajo`
--
ALTER TABLE `partes_trabajo`
  ADD CONSTRAINT `partes_trabajo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Ограничения внешнего ключа таблицы `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD CONSTRAINT `seguimientos_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE,
  ADD CONSTRAINT `seguimientos_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
