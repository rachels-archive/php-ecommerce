CREATE DATABASE IF NOT EXISTS `ecotribe` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ecotribe`;

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
);

INSERT INTO `product` (`product_name`,`product_category`, `product_price`, `product_image`) VALUES
('Modern Bed Frame', 'Bedroom',1300, 'assets/products/bedframe1.png'),
('Classic Bed Frame', 'Bedroom', 1200, 'assets/products/bedframe3.png'),
('Large Closet','Bedroom', 1500, 'assets/products/closet.png'),
('Clothing Rack', 'Bedroom',240, 'assets/products/rack.png'),
('Round Mirror', 'Bathroom',90, 'assets/products/mirror.png'),
('Lamp Shade', 'Living Room',35, 'assets/products/lampshade.png'), 
('Round Coffee Table', 'Living Room',200, 'assets/products/table1.jpg'),
('Coffee Table', 'Living Room',250,'assets/products/table2.png'),
('Premium Chair', 'Living Room',180, 'assets/products/chair2.png'),
('Cabinet','Bedroom', 300, 'assets/products/cabinet.png'),
('Bath Accessories Set', 'Bathroom',65, 'assets/products/set.png'),
( 'Kitchen Table', 'Kitchen',680, 'assets/products/table3.png'),
( 'Basic Chair', 'Kitchen',110, 'assets/products/chair1.png'),
( 'Kitchen Tray','Kitchen',30, 'assets/products/tray.png');

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password_hash` varchar(225) NOT NULL
);

INSERT INTO `user` (`username`, `email`, `password_hash`) VALUES 
('admin', 'admin@ecotribe.com', '$2y$10$ZDsHZWGuRQNWG2XTByJRqeeT1bV1ITmpu3VwbiKws4obUAufBxONq');

ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
