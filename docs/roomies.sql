CREATE TABLE `apartments` (
  `id` BIGINT UNIQUE PRIMARY KEY,
  `name` VARCHAR(255),
  `main_tenant_id` BIGINT UNIQUE NOT NULL,
  `description` TEXT,
  `mixed_gender` TINYINT,
  `pets_allowed` TINYINT,
  `address_id` BIGINT UNIQUE NOT NULL,
  `square_meters` DECIMAL(10,2),
  `num_of_rooms` INT,
  `rent` DECIMAL(10,2),
  `seeking_roomy` TINYINT,
  `seeking_updated_at` TIMESTAMP,
  `created_at` TIMESTAMP
);

CREATE TABLE `addresses` (
  `id` BIGINT PRIMARY KEY,
  `street` VARCHAR(255),
  `house_num` INT,
  `additional` VARCHAR(255),
  `postal_code` VARCHAR(5),
  `city` VARCHAR(50)
);

CREATE TABLE `rooms` (
  `id` BIGINT PRIMARY KEY,
  `appartment_id` BIGINT UNIQUE NOT NULL,
  `rent` DECIMAL(10,2),
  `square_meters` DECIMAL(10,2),
  `tenant_id` BIGINT,
  `occupied` TINYINT
);

CREATE TABLE `users` (
  `id` BIGINT PRIMARY KEY,
  `username` VARCHAR(255),
  `password` VARCHAR(255),
  `role` VARCHAR(255)
);

ALTER TABLE `apartments` ADD FOREIGN KEY (`main_tenant_id`) REFERENCES `users` (`id`);

ALTER TABLE `apartments` ADD FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`);

ALTER TABLE `rooms` ADD FOREIGN KEY (`appartment_id`) REFERENCES `apartments` (`id`);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `rooms` (`tenant_id`);
