-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2019 at 10:02 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campionario`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessoires`
--

CREATE TABLE `accessoires` (
  `id` int(10) UNSIGNED NOT NULL,
  `famille` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sfamille` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accessoires`
--

INSERT INTO `accessoires` (`id`, `famille`, `sfamille`, `fournisseur`, `code`, `color`, `payes`, `description`, `created_at`, `updated_at`) VALUES
(4, 'fermetture', 'fermetture divisible', 3, '0000', 'noir', 'Tunisie', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2019-09-15 19:20:16', '2019-09-15 19:20:50'),
(5, 'bouton', 'bouton metallique', 4, '0001', 'rouge', 'France', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2019-09-15 19:26:02', '2019-09-15 19:26:02'),
(6, 'étiquette', 'étiquette de marque', 5, '0002', 'vert', 'India', 'description içi..', '2019-09-15 19:28:33', '2019-10-04 09:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `approbations`
--

CREATE TABLE `approbations` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_echentient` int(11) NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `date` date NOT NULL,
  `decision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approbations`
--

INSERT INTO `approbations` (`id`, `code`, `color`, `num_echentient`, `fournisseur`, `date`, `decision`, `note`, `season`, `created_at`, `updated_at`) VALUES
(1, '0000', 'noir', 1245, 3, '2019-09-05', 'xxxxxxxxxxxx', 'xxxxxxxxxxxx', 'A', '2019-09-05 15:30:30', '2019-09-05 15:30:30'),
(2, '0001', 'rouge', 12, 4, '2019-09-15', 'xxxxxxxxxxxx', 'xxxxxxxxxxxx', 'A', '2019-09-15 20:17:28', '2019-09-15 20:17:28'),
(3, '0002', 'vert', 741, 5, '2019-09-15', 'xxxxxxxxxxxx', 'xxxxxxxxxxxx', 'A', '2019-09-15 20:19:26', '2019-09-15 20:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `campionarios`
--

CREATE TABLE `campionarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `idaccessoire` int(11) NOT NULL,
  `idfournisseur` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `numfacture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saison` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` int(11) NOT NULL DEFAULT '0',
  `stat` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campionarios`
--

INSERT INTO `campionarios` (`id`, `idaccessoire`, `idfournisseur`, `qte`, `numfacture`, `user`, `saison`, `file`, `stat`, `created_at`, `updated_at`) VALUES
(4, 4, 3, 10, '1245', 'utilisateur 1', '1qjfgj', 0, 0, '2019-09-11 14:40:00', '2019-09-11 14:40:00'),
(5, 5, 4, 320, '12jk', 'hamdaoui wassim', 'dzuhfuo', 0, 0, '2019-09-11 14:40:32', '2019-09-11 14:40:32'),
(6, 6, 4, 20, 'zieivnze', 'utilisateur 1', '1qjfgj', 0, 1, '2019-09-12 16:20:07', '2019-09-12 16:20:07'),
(7, 4, 5, 12, '12fa23', '2', 'saison1', 0, 0, '2019-10-04 09:46:42', '2019-10-04 09:46:42'),
(8, 4, 3, 110, '12fa25', '2', 'saison 2', 1, 0, '2019-10-04 09:49:01', '2019-10-04 09:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `fichecontroles`
--

CREATE TABLE `fichecontroles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idaccessoire` int(11) NOT NULL,
  `couleuraccessoire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idfournisseur` int(11) NOT NULL,
  `typecontrole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `probleme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcampionario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fichecontroles`
--

INSERT INTO `fichecontroles` (`id`, `user`, `numero`, `idaccessoire`, `couleuraccessoire`, `idfournisseur`, `typecontrole`, `probleme`, `decision`, `idcampionario`, `created_at`, `updated_at`) VALUES
(4, 'Souhir mrabet', '1245896', 4, 'red', 3, 'controle 1', 'probleme1', 'decision 1', 1, '2019-09-03 10:52:46', '2019-09-03 10:52:46'),
(5, 'hamdaoui wassim', '1245896', 5, 'red', 3, 'controle 1', 'probe 2', 'decision 1', 2, '2019-09-05 15:39:13', '2019-09-05 15:39:13'),
(6, 'malek', '124', 4, 'noir', 3, 'controle 1', 'probleme 1', 'decision 1', 8, '2019-10-04 09:51:45', '2019-10-04 09:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `fullname`, `adresse`, `telephone`, `email`, `created_at`, `updated_at`) VALUES
(3, 'Fournisseur 1', 'Tunisie', '+216 92045387', 'fournisseur1@gmail.com', '2019-08-28 12:58:14', '2019-09-15 19:30:14'),
(4, 'Fournisseur 2', 'France', '+216 92045387', 'fournisseur@gmail.com', '2019-09-05 15:41:47', '2019-09-15 19:30:27'),
(5, 'Fournisseur 3', 'India', '+216 92045387', 'fournisseur3@gmail.com', '2019-09-12 17:36:55', '2019-09-15 19:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `integrations`
--

CREATE TABLE `integrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_defaut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qte` int(11) NOT NULL,
  `cause_defaut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_entree` date NOT NULL,
  `date_sortie` date NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `integrations`
--

INSERT INTO `integrations` (`id`, `code`, `type_defaut`, `qte`, `cause_defaut`, `date_entree`, `date_sortie`, `season`, `created_at`, `updated_at`) VALUES
(1, '0001', 'xxxxxxxxxxxxxx', 120, 'xxxxxxxxxxxxxx', '2019-09-05', '2019-09-12', 'A', '2019-09-05 14:47:48', '2019-09-05 14:47:48'),
(2, '0002', 'xxxxxxxxxxxxxxxxxxxx', 20, 'xxxxxxxxxxxxxxxxxxxx', '2019-09-15', '2019-09-17', 'A', '2019-09-15 20:12:55', '2019-09-15 20:12:55'),
(3, '0000', 'xxxxxxxxxxxxxxxxxxxx', 36, 'xxxxxxxxxxxxxxxxxxxx', '2019-09-16', '2019-09-22', 'A', '2019-09-15 20:13:26', '2019-09-15 20:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_25_164005_create_accessoires_table', 2),
(7, '2019_08_27_093328_create_fournisseurs_table', 3),
(8, '2019_08_28_131733_create_campionarios_table', 4),
(9, '2019_09_03_102157_create_fichecontroles_table', 5),
(10, '2019_09_05_082734_create_reclamations_table', 6),
(15, '2019_09_05_114635_create_integrations_table', 7),
(16, '2019_09_05_114853_create_approbations_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reclamations`
--

CREATE TABLE `reclamations` (
  `id` int(10) UNSIGNED NOT NULL,
  `claimed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_accessory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sfamily` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_receive` date DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `claimed_accessory` double(8,2) DEFAULT NULL,
  `garments` int(11) DEFAULT NULL,
  `industrial_unit_cost` int(11) DEFAULT NULL,
  `out_of_standard_detected` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount_charged` double(8,2) DEFAULT NULL,
  `required_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_to_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claim_issued` date DEFAULT NULL,
  `approved_by_supplier` date DEFAULT NULL,
  `debit_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reclamations`
--

INSERT INTO `reclamations` (`id`, `claimed_by`, `supplier`, `season`, `supplier_invoice`, `code_accessory`, `color`, `family`, `sfamily`, `date_receive`, `price`, `quantity`, `total_amount`, `claimed_accessory`, `garments`, `industrial_unit_cost`, `out_of_standard_detected`, `QC`, `total_amount_charged`, `required_by`, `referred_to_month`, `claim_issued`, `approved_by_supplier`, `debit_note`, `validation`, `created_at`, `updated_at`) VALUES
(1, 'societe A', 'Fournisseur 1', 'A', '000', '0000', 'noir', 'fermetture', 'fermetture divisible', '2018-10-29', 0.41, 5112, 615.00, 1500.00, NULL, NULL, 'xxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxx', NULL, 'A', '', '2018-11-03', '2018-11-15', '', 'closed', '2019-09-15 21:00:33', '0000-00-00 00:00:00'),
(2, 'Societe A', 'Fournisseur 2', 'C', '000', '0001', 'rouge', NULL, NULL, '2018-09-21', 0.28, 1600, 464.20, 1600.00, NULL, NULL, 'xxxxxxxxxxxxxx', 'xxxxxxxxxxxxxx', NULL, 'A', NULL, '2018-11-01', '2018-11-06', NULL, NULL, '2019-10-05 17:38:13', '2019-10-05 15:38:13'),
(3, 'societe A', 'Fournisseur 3', 'A', '000', '0002', 'vert', 'étiquette', 'étiquette de marque', '2019-09-13', 120.32, 25, 125478.00, 1245.00, NULL, 1245, NULL, '', 1245.32, 'A', '', '2019-09-19', '2019-09-27', '', 'en cours', '2019-09-15 21:04:03', '2019-09-12 08:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'malek', 'malek@gmail.com', 'Administrateur', '$2y$10$6P4X7Eb/sYWQmTeeG1Rsv.xyP8oKniy0Bx6QYxfjZ7Ub5DOn8Ugnm', 'RXmKkqj9y8P0IlZUYI9gEQq6Ngejz2WqgbZVCGQcySOz2T71QjqOu2cQScrj', '2019-08-27 07:47:30', '2019-08-27 07:47:30'),
(2, 'editor', 'editor@gmail.com', 'Editor', '$2y$10$6351eWeoy6aYjIWWV5b.2OeV9OgqBL0murywh0gwR8zAlthTuvCIy', 'dJtfntfk9cIdV7nBlidTskTp4SzsFutvmo3mAPAOuEaUWsJM1jqFDCz4p9EM', '2019-08-28 16:46:25', '2019-08-28 16:46:25'),
(3, 'consulteur', 'consulteur@gmail.com', 'Consulteur', '$2y$10$jeHi57qVe9OyOfwA9AtRT.AZNbB3TK1wYmhg.j891VzXTXrKtvxAC', 'EFHtQTtLW820j6A2ID4LSM6lzs8rKYhfN3H5cqEuYnmITWidZxFMdCnsXQFT', '2019-08-28 16:58:48', '2019-08-28 16:58:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessoires`
--
ALTER TABLE `accessoires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approbations`
--
ALTER TABLE `approbations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campionarios`
--
ALTER TABLE `campionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fichecontroles`
--
ALTER TABLE `fichecontroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integrations`
--
ALTER TABLE `integrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessoires`
--
ALTER TABLE `accessoires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `approbations`
--
ALTER TABLE `approbations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campionarios`
--
ALTER TABLE `campionarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fichecontroles`
--
ALTER TABLE `fichecontroles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `integrations`
--
ALTER TABLE `integrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
