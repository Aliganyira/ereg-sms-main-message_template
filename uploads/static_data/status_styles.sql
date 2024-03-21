DROP TABLE IF EXISTS `status_styles`;
CREATE TABLE `status_styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `style_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);
ALTER TABLE `status_styles` ADD PRIMARY KEY (`id`);
ALTER TABLE `status_styles` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

INSERT INTO `status_styles` (`style_name`, `description`, `button_color`, `color`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('Pending', 'Pending Shipping', '<i style=\"color: white; background-color:#f08080;\">#f08080</i>', '#f08080;', 1, 1, '2020-04-14 08:05:23', NULL),
('Approved', 'Approved Booking', '<i style=\"color: white; background-color:#dd5e89;\">#dd5e89</i>', '#dd5e89;', 1, 1, '2020-04-14 08:05:23', NULL),
('Available', 'Available (only when is to be withdrawn at the offices)', '<i style=\"color: white; background-color:#007bff;\">#007bff</i>', '#007bff;', 1, 1, '2020-04-14 08:05:23', NULL),
('Delivered', 'Delivered', '<i style=\"color: white; background-color:#00a65a;\">#00a65a</i>', '#00a65a;', 1, 1, '2020-04-14 08:05:23', NULL),
('Consolidated', 'Consolidated', '<i style=\"color: white; background-color:#17a2b8;\">#17a2b8</i>', '#17a2b8;', 1, 1, '2020-04-14 08:05:23', NULL),
('Distribution', 'Distribution', '<i style=\"color: white; background-color:#a890d3;\">#a890d3</i>', '#a890d3;', 1, 1, '2020-04-14 08:05:23', NULL),
('In Transit', 'In Transit', '<i style=\"color: white; background-color:#00ced1;\">#00ced1</i>', '#00ced1;', 1, 1, '2020-04-14 08:05:23', NULL),
('Not picked up', 'Not picked up', '<i style=\"color: white; background-color:#ff008c;\">#ff008c</i>', '#ff008c;', 1, 1, '2020-04-14 08:05:23', NULL),
('On route', 'On route for delivery (only when it is door to door)', '<i style=\"color: white; background-color:#43bd00;\">#43bd00</i>', '#43bd00;', 1, 1, '2020-04-14 08:05:23', NULL),
('Cancelled', 'Cancelled invoice or transaction', '<i style=\"color: white; background-color:#dd2311;\">#dd2311</i>', '#dd2311;', 1, 1, '2020-04-14 08:05:23', NULL);


