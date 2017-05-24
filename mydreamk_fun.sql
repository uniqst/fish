-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Трв 24 2017 р., 15:15
-- Версія сервера: 5.5.54-cll
-- Версія PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `mydreamk_fun`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`) VALUES
(112, 0, 'Телефоны'),
(113, 112, 'IPhone');

-- --------------------------------------------------------

--
-- Структура таблиці `cat_option`
--

CREATE TABLE `cat_option` (
  `id` int(11) NOT NULL,
  `incat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `cat_option`
--

INSERT INTO `cat_option` (`id`, `incat_id`, `product_id`, `value`) VALUES
(276, 33, 59, 'SpaceGray'),
(277, 34, 59, '4.7');

-- --------------------------------------------------------

--
-- Структура таблиці `ewq`
--

CREATE TABLE `ewq` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `ewq`
--

INSERT INTO `ewq` (`id`, `brand`) VALUES
(4, 'йцуцй');

-- --------------------------------------------------------

--
-- Структура таблиці `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `image`
--

INSERT INTO `image` (`id`, `product_id`, `name`) VALUES
(205, 59, 'upload/31231212.jpg'),
(206, 59, 'upload/3.jpg'),
(208, 60, 'upload/1.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `in_category`
--

CREATE TABLE `in_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `in_category`
--

INSERT INTO `in_category` (`id`, `category_id`, `name`) VALUES
(33, 113, 'Цвет'),
(34, 113, 'Диагональ'),
(35, 113, 'RAM'),
(36, 113, 'Вес');

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1491507353),
('m140622_111540_create_image_table', 1491507356),
('m140622_111545_add_name_to_image_table', 1491507356);

-- --------------------------------------------------------

--
-- Структура таблиці `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `vk` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `options`
--

INSERT INTO `options` (`id`, `vk`, `facebook`, `twitter`, `youtube`, `skype`, `google`, `instagram`) VALUES
(1, '1', '1', '1', '1', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE `order` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` date NOT NULL,
  `qty` int(11) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8 DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`id`, `created_at`, `update_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
(18, '2017-05-14 00:39:54', '2017-05-14', 2, 12000, '0', 'Андрей', 'Andreymartunenko@gmail.com', '+380635129631', 'Милославская 47'),
(17, '2017-05-07 16:01:29', '2017-05-07', 3, 3000000, '1', '1', '2', '3', '4');

-- --------------------------------------------------------

--
-- Структура таблиці `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(34, 18, 59, 'IPhone 5s SpaceGray', 6000, 2, 12000),
(33, 17, 58, 'IPhone 5s SpaceGray', 999999, 1, 999999),
(32, 17, 57, 'IPhone 5s Silver', 999999, 2, 2000000);

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `content` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`id`, `alias`, `title`, `label`, `content`) VALUES
(6, 'about', 'О нас', 'О нас', '<p>&nbsp;&nbsp; &nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam optio nemo nobis itaque vero in et, delectus ratione dolore doloremque, quia quidem voluptate quas deleniti, saepe sed quis aliquid unde, voluptatibus? Mollitia corpor'),
(7, 'adnrey', 'Андрей', 'Андрей', '<p>Привет Андрей</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `key` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `price` int(11) NOT NULL,
  `price_promo` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `key`, `category_id`, `name`, `group`, `description`, `price`, `price_promo`, `photo`) VALUES
(59, 1059, 113, 'IPhone 5s SpaceGray', '5s', '<p>qweqweqeqw</p>\r\n', 6000, 5000, ''),
(60, 1060, 113, 'IPhone 5s Silver', '5s', '<p>wqeqwewqeqw</p>\r\n', 6000, 5000, '');

-- --------------------------------------------------------

--
-- Структура таблиці `qwe`
--

CREATE TABLE `qwe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `qwe`
--

INSERT INTO `qwe` (`id`, `name`) VALUES
(5, 'йййй');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
(2, 'admin', '$2y$13$WyF7MC6lX4aEi5w8KGfDt.jVvASGvhSj4lGIP7UcXwB7m8dKAMw2K', 'tObrT5ctaOm2aObseQKdmVS-FAA9rB4T');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `cat_option`
--
ALTER TABLE `cat_option`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `ewq`
--
ALTER TABLE `ewq`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Індекси таблиці `in_category`
--
ALTER TABLE `in_category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_4` (`id`),
  ADD KEY `id` (`id`);

--
-- Індекси таблиці `qwe`
--
ALTER TABLE `qwe`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT для таблиці `cat_option`
--
ALTER TABLE `cat_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;
--
-- AUTO_INCREMENT для таблиці `ewq`
--
ALTER TABLE `ewq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT для таблиці `in_category`
--
ALTER TABLE `in_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблиці `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблиці `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT для таблиці `qwe`
--
ALTER TABLE `qwe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
