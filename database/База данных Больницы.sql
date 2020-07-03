-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 03 2020 г., 17:21
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dentistry`
--

-- --------------------------------------------------------

--
-- Структура таблицы `black_list`
--

CREATE TABLE `black_list` (
  `id` int(5) NOT NULL,
  `id_patient` int(5) NOT NULL,
  `name` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` int(5) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `id_profession` int(5) DEFAULT NULL,
  `id_service_type` int(5) DEFAULT NULL,
  `experience` int(2) NOT NULL,
  `cabinet` int(5) NOT NULL,
  `id_root` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `login`, `password`, `name`, `surname`, `patronymic`, `photo`, `id_profession`, `id_service_type`, `experience`, `cabinet`, `id_root`) VALUES
(2, 'mask123', '123', 'Владимир', 'Владимирович', 'Буров', '', 1, 1, 10, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `histories`
--

CREATE TABLE `histories` (
  `id` int(5) NOT NULL,
  `id_reception` int(5) NOT NULL,
  `pass` tinyint(1) NOT NULL,
  `doctor_opinion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `histories`
--

INSERT INTO `histories` (`id`, `id_reception`, `pass`, `doctor_opinion`) VALUES
(31, 98, 0, ''),
(32, 99, 0, ''),
(33, 100, 0, ''),
(34, 101, 0, ''),
(35, 102, 0, ''),
(36, 103, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_root` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `operator`
--

INSERT INTO `operator` (`id`, `login`, `password`, `id_root`) VALUES
(1, 'add', '123', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `police` int(16) NOT NULL,
  `passport` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number_phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `name`, `surname`, `patronymic`, `birthday`, `police`, `passport`, `email`, `number_phone`) VALUES
(1, 'Ростислав', 'Михайлов', 'Владимирович', '1999-05-01', 1234, 1234, 'therxgames0@gmail.com', 324342);

-- --------------------------------------------------------

--
-- Структура таблицы `profession`
--

CREATE TABLE `profession` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profession`
--

INSERT INTO `profession` (`id`, `name`) VALUES
(1, 'Стоматолог-гигиенист'),
(2, 'Стоматолог-терапевт'),
(3, 'Стоматолог-пародонтолог'),
(4, 'Стоматолог-хирург'),
(5, 'Стоматолог-ортопед'),
(6, 'Стоматолог-ортодонт');

-- --------------------------------------------------------

--
-- Структура таблицы `reception`
--

CREATE TABLE `reception` (
  `id` int(5) NOT NULL,
  `id_service_name` int(5) DEFAULT NULL,
  `id_patient` int(5) DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `date_receipt` date DEFAULT NULL,
  `time_receipt` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reception`
--

INSERT INTO `reception` (`id`, `id_service_name`, `id_patient`, `id_doctor`, `date_receipt`, `time_receipt`) VALUES
(100, 1, 1, 2, '2020-03-03', '09:30:00'),
(101, 1, 1, 2, '2020-03-24', '11:00:00'),
(102, 1, 1, 2, NULL, NULL),
(103, 1, 1, 2, '2020-05-16', '09:30:00');

-- --------------------------------------------------------

--
-- Структура таблицы `roots`
--

CREATE TABLE `roots` (
  `id` int(5) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roots`
--

INSERT INTO `roots` (`id`, `type`) VALUES
(1, 'operator'),
(2, 'doctor');

-- --------------------------------------------------------

--
-- Структура таблицы `services_name`
--

CREATE TABLE `services_name` (
  `id` int(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `id_type` int(5) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `procedure_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services_name`
--

INSERT INTO `services_name` (`id`, `name`, `description`, `id_type`, `price`, `procedure_time`) VALUES
(1, 'Консультация (анализ состояния полости рта, составление плана лечения)', 'Современный темп нашей городской жизни сильно бьет по нашему графику. Так что это может легко привести к нежелательным последствиям для общего состояния вашего здоровья полости рта.\r\nТаким образом, важно позаботиться о гигиене полости рта. Конечно, это должно быть сделано наравне с проведением регулярных общих и профилактических осмотров у стоматолога.\r\n\r\nТакие регулярные обследования зубов и десен гарантируют, что вашему здоровью ничто не угрожает. Это подтвердит, что все проблемы с зубами обнаруживаются и устраняются нашими врачами сразу.\r\n\r\nИмеется в виду длинный список постоянных клиентов, которые ежеквартально посещают нашу клинику…', 1, 200, '00:30:00'),
(2, 'Комплексная  диагностика (фотодиагностика,оценка R-исследований(ОПТГ,КТ)', '', 1, 1000, '00:30:00'),
(3, 'Фотополимерная реставрация  (пломба)', '', 2, 1500, '01:00:00'),
(4, 'Художественная реставрация ( полное косметическое восстановление зуба)', '', 2, 10000, '01:00:00'),
(5, 'Эндодонтическое лечение (лечение корневых каналов под микроскопом)', '', 2, 3000, '00:45:00'),
(6, 'Профилактическая комплексная чистка зубов (УЗ+AirFlow)', '', 3, 2000, '01:00:00'),
(7, 'Пародонтологическая чистка', '', 3, 3000, '01:00:00'),
(9, 'Удаление зуба', '', 4, 500, '01:00:00'),
(10, 'Удаление зуба (ретинированный зуб)  ', '', 4, 3500, '01:00:00'),
(11, 'Операция установки имплантата (“Mis” ,”Biohorizons”, “Straumann”)', '', 4, 20000, '01:00:00'),
(13, 'Синуслифтинг (открытый)', '', 4, 14500, '01:00:00'),
(14, 'Металлокерамическая коронка', '', 5, 7000, '01:30:00'),
(15, 'Керамическая  коронка', '', 5, 12000, '01:30:00'),
(16, 'Керамический винир', '', 5, 13500, '01:30:00'),
(17, 'Съёмное протезирование', '', 5, 10000, '01:30:00'),
(18, 'Лечение брекет-системами (за 1 челюсть)', '', 6, 15000, '02:00:00'),
(19, 'Лечение трейнерами,аппаратами(за 1 челюсть)', '', 6, 6000, '02:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `services_type`
--

CREATE TABLE `services_type` (
  `id` int(5) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `img` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services_type`
--

INSERT INTO `services_type` (`id`, `type`, `img`) VALUES
(1, 'Консультация', 'img/services/Консультация.jpg'),
(2, 'Терапевтическая стоматология', 'img/services/Терапевтическая стоматология.jpg'),
(3, 'Профилактическая стоматология', 'img/services/Профилактическая стоматология.jpg'),
(4, 'Хирургическая стоматология', 'img/services/Хирургическая стоматология.jpg'),
(5, 'Ортопедическая стоматология', 'img/services/Ортопедическая стоматология.jpg\r\n'),
(6, 'Ортодонтическая стоматология', 'img/services/Ортодонтическая стоматология.jpg\r\n');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `black_list`
--
ALTER TABLE `black_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profession` (`id_profession`),
  ADD KEY `id_service_type` (`id_service_type`),
  ADD KEY `root` (`id_root`);

--
-- Индексы таблицы `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reception` (`id_reception`);

--
-- Индексы таблицы `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_root` (`id_root`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_service_name` (`id_service_name`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Индексы таблицы `roots`
--
ALTER TABLE `roots`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services_name`
--
ALTER TABLE `services_name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`id_type`);

--
-- Индексы таблицы `services_type`
--
ALTER TABLE `services_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `black_list`
--
ALTER TABLE `black_list`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `profession`
--
ALTER TABLE `profession`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `reception`
--
ALTER TABLE `reception`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT для таблицы `roots`
--
ALTER TABLE `roots`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `services_name`
--
ALTER TABLE `services_name`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `services_type`
--
ALTER TABLE `services_type`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `black_list`
--
ALTER TABLE `black_list`
  ADD CONSTRAINT `black_list_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`);

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`id_profession`) REFERENCES `profession` (`id`),
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`id_service_type`) REFERENCES `services_type` (`id`),
  ADD CONSTRAINT `doctors_ibfk_3` FOREIGN KEY (`id_root`) REFERENCES `roots` (`id`);

--
-- Ограничения внешнего ключа таблицы `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_ibfk_1` FOREIGN KEY (`id_reception`) REFERENCES `reception` (`id`);

--
-- Ограничения внешнего ключа таблицы `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`id_root`) REFERENCES `roots` (`id`);

--
-- Ограничения внешнего ключа таблицы `reception`
--
ALTER TABLE `reception`
  ADD CONSTRAINT `reception_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `reception_ibfk_2` FOREIGN KEY (`id_service_name`) REFERENCES `services_name` (`id`),
  ADD CONSTRAINT `reception_ibfk_3` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`);

--
-- Ограничения внешнего ключа таблицы `services_name`
--
ALTER TABLE `services_name`
  ADD CONSTRAINT `services_name_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `services_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
