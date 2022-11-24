-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 15 2021 г., 22:09
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sctandembase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeWork` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `dateStart` date NOT NULL,
  `dateFinish` date NOT NULL,
  `square` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contracts`
--

INSERT INTO `contracts` (`id`, `name`, `surname`, `patronymic`, `typeWork`, `city`, `price`, `dateStart`, `dateFinish`, `square`) VALUES
(1, 'Никита', 'Довгаль', 'Михайлович', 'Фасадные работы', 'Ростов-на-Дону', 190000, '2021-05-18', '2021-06-01', 120),
(2, 'Михаил', 'Попов', 'Александравич', 'Фасадные работы', 'Аксай', 320000, '2021-06-09', '2021-06-16', 300),
(3, 'Владислав', 'Бобров', 'Стеепанович', 'Фасадные работы', 'Батайск', 100000, '2021-06-09', '2021-06-13', 80),
(4, 'Артур', 'Аршакян', 'Араратович', 'Фасадные работы', 'Ростов-На-Дону', 240000, '2021-06-07', '2021-06-30', 210),
(5, 'Вероника', 'Ромашко', 'Ивановна', 'Фасадные работы', 'Азов', 150000, '2021-06-01', '2021-06-09', 115),
(6, 'Никита', 'Довгаль', 'Михайлович', 'Кровельные работы', 'Ростов-на-Дону', 190000, '2021-05-18', '2021-06-01', 120),
(7, 'Михаил', 'Попов', 'Александравич', 'Кровельные работы', 'Аксай', 320000, '2021-06-09', '2021-06-16', 300),
(8, 'Владислав', 'Бобров', 'Стеепанович', 'Кровельные работы', 'Батайск', 100000, '2021-06-09', '2021-06-13', 80),
(9, 'Артур', 'Аршакян', 'Араратович', 'Кровельные работы', 'Ростов-На-Дону', 240000, '2021-06-07', '2021-06-30', 210),
(10, 'Вероника', 'Ромашко', 'Ивановна', 'Кровельные работы', 'Азов', 150000, '2021-06-01', '2021-06-09', 115),
(11, 'Оксана', 'Иванова', 'Генадьевна', 'Фасадные работы', 'Азов', 150000, '2021-06-01', '2021-06-09', 115);

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE `materials` (
  `id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priceFull` int(11) NOT NULL,
  `priceSale` int(11) NOT NULL,
  `info` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Matname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgExpamle` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id`, `img`, `count`, `title`, `priceFull`, `priceSale`, `info`, `type`, `Matname`, `imgExpamle`, `color`) VALUES
('akshdjhw-aaasd-wdsa', '../source/image/Rock-type/rock-type-1.jpg', 100, 'Панели под камень', 580, 420, 'Панели под камень отлично подойдут для обшивки цоколя,забора и фасада.Благодаря специальному матовому покрытию ,они передают всю красоту и естественность различных пород камня', 'siding', 'Волна Камеа', '/source/models/HouseForSit.glb', ''),
('akshdjhw-qdsa-dw2sa-1', '../source/image/T-siding/t-siding-1.jpg', 200, 'Панели под камень', 700, 600, 'Сайдинг-панели(Альпийская сказка) качественно имитируют фактуру скальной породы.\r\nТакой вариант оформления украсит фасад вашего дома и придаст ему благоприятный вид', 'siding', 'Альпийская сказка', '/source/models/HouseForSit.glb', 'Корочневый'),
('akshdjhw-qdsa-dw2sa-2', '../source/image/T-siding/t-siding-2.jpg', 100, 'Панели под камень', 700, 400, 'Сайдинг-панели(Альпийская сказка) качественно имитируют фактуру скальной породы.\r\nТакой вариант оформления украсит фасад вашего дома и придаст ему благоприятный вид', 'siding', 'Альпийская сказка', '/source/models/HouseForSit2.glb', 'Бежевый'),
('asasdasd-asdwd', '../source/image/Block-house/block-house-1.jpg', 200, 'Металлический сайдинг', 689, 519, 'Блокхаус-металический сайдинг, который отлично подойдет для обшивки домов,дачь,бань,заборов.Такой фасад будет яркий и не повторимый,благодаря 3D покрытию,перенесет вас как в классический русский стиль,так и может отлично сочетаться с современным стилем', 'siding', 'Блокхаус', '/source/models/HouseForSit.glb', ''),
('asda-sad-sadasdw', '../source/image/Vinil/vinyl-1.jpg', 100, 'Виниловый сайдинг', 500, 450, 'Сайдинг Деке один из лучших материалов в своем сегменте,благодаря немецкой технологии имеет явное превосходство над другими образцами в плане прочности и внешнего вида.Благодаря такому сайдингу ,любой дом приобретет совсем новый благородный вид', 'siding', 'DOCKE', '/source/models/HouseForSit4.glb', 'Слоновая кость'),
('asda-sad-sadasdw-2', '../source/image/Vinil/vinyl-2.jpg', 100, 'Виниловый сайдинг', 500, 450, 'Сайдинг Деке один из лучших материалов в своем сегменте,благодаря немецкой технологии имеет явное превосходство над другими образцами в плане прочности и внешнего вида.Благодаря такому сайдингу ,любой дом приобретет совсем новый благородный вид', 'siding', 'DOCKE', '/source/models/HouseForSit5.glb', 'Снежная пелена'),
('asda-sad-ssasww', '../source/image/Dolomit/dolomit-1.jpg', 200, 'Панели под кирпич', 650, 420, 'Панели под кирпич производства ДОЛОМИТ отлично подойдут как для цоколя,так и для фасада в целом', 'siding', 'Доломит', '/source/models/HouseForSit4.glb', ''),
('dsaasd-wqdsa-s', '../source/image/Grayne/grayne-1.jpg', 100, 'Панели имитация кедра', 2390, 1490, 'Панели GRAYNE полностью имитируют структуру состаренного канадского кедра и идеально передают уникальную текстуру этого благородного дерева.\r\nВпервые на рынке фасадной отделки материал, который сочетает в себе лучшие эксплуатационные характеристики и натуральный внешний вид!\r\nПанели GRAYNE в сочетании с молдингами KLEER помогут Вам воплотить в реальность любые дизайнерские решения по оформлению Вашего фасада', 'siding', 'GRAYNE', '/source/models/HouseForSit2.glb', ''),
('sdssasdw-sdq-ws', '../source/image/Kedral/kedral-1.jpg', 200, 'Сайдинг Кедрал', 1399, 1149, 'Кедрал-фиброцементная плита,производства Бельгии,но потдерживается постоянно на скледе в России.Такие панели придадут стильность и изысканность любому фасаду,а благодаря составу,полностью не имеют слабостей перед внгешними факторами', 'siding', 'Кедрал', '/source/models/HouseForSit.glb', ''),
('wqdsss-wdsad-dww', '../source/image/Vox/vox-1.jpg', 100, 'Панели под камень', 700, 550, 'Данные панели,польского производства имеют 3D покрытие и форму,благодаря большой толщине и специальному составу,такой материал прочен ,имеет противоударную стойкость и устойчивость к внешним факторам.Дома обшитые такими панелями ,имеют благородный,стильный  и дорогой вид', 'siding', 'VOX', '/source/models/HouseForSit.glb', '');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateReview` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `text`, `dateReview`) VALUES
(1, 'Сделали очень качественно и недорого,всем довольны', '0000-00-00'),
(2, 'Очень довольны, теперь есть крыша над головой ))', '0000-00-00'),
(3, 'Мне все понравилось, молодцы', '2021-06-20'),
(4, 'Все очень понравилось', '2021-06-16'),
(5, 'Сделали очень быстро и качественно ', '2021-06-03'),
(6, 'Сделали очень качественно и недорого,всем довольны', '0000-00-00'),
(7, 'Очень довольны, теперь есть крыша над головой ))', '0000-00-00'),
(8, 'Мне все понравилось, молодцы', '2021-06-20'),
(9, 'Все очень понравилось', '2021-06-16'),
(10, 'Сделали очень быстро и качественно ', '2021-06-03'),
(11, 'Сделали очень быстро и качественно ', '2021-06-03');

-- --------------------------------------------------------

--
-- Структура таблицы `searchengine`
--

CREATE TABLE `searchengine` (
  `id` int(11) NOT NULL,
  `typeWork` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `searchengine`
--

INSERT INTO `searchengine` (`id`, `typeWork`, `brand`, `type`) VALUES
(1, 'siding', 'Альпийская сказка', 'Панели под камень'),
(3, 'siding', 'Docke', 'Виниловый сайдинг'),
(4, 'siding', 'Волна Камеа', 'Панели под камень'),
(5, 'siding', 'BlockHouse', 'Металлический сайдинг'),
(6, 'siding', 'Доломит', 'Панели под кирпич');

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `name`, `surname`, `patronymic`, `post`, `text`, `img`) VALUES
(1, 'Артур', 'Цыганков', 'Геннадьевич', 'Директор', 'Отвечает за весь рабочий механизм компании', '');

-- --------------------------------------------------------

--
-- Структура таблицы `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `works`
--

INSERT INTO `works` (`id`, `material`, `img`) VALUES
(1, 'BlockHouse', '../source/image/welcome-siding.png'),
(2, 'T-Siding', '../source/image/welcome-siding.png'),
(3, 'Виниловый сайдинг', '../source/image/welcome-siding.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contracts`
--
ALTER TABLE `contracts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `title` (`title`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `searchengine`
--
ALTER TABLE `searchengine`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `searchengine`
--
ALTER TABLE `searchengine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
