DROP DATABASE IF EXISTS fernish;
CREATE DATABASE fernish;
USE fernish;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS products (
  `id` INT AUTO_INCREMENT primary key NOT NULL,
  `title` varchar(255) NOT NULL,
  `collection` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `alt1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `review` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `status` boolean not null default 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=10;

CREATE TABLE IF NOT EXISTS users (
  `id` INT AUTO_INCREMENT primary key NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` boolean not null default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=10;

INSERT INTO products (`id`, `title`, `collection`, `color`, `category`, `description`, `price`, `image1`, `alt1`, `image2`, `image3`, `review`, `stock`, `status`) VALUES
(1, 'Terry Armchair', 'livingroom', 'beige', 'chair', 'ARMCHAIR WITH TERRY UPHOLSTERY ON THE CHAIRBACK AND WOODEN LEGS.<br/><br/>\r\n\r\nColour: Dark beige<br/><br/>\r\n\r\nWidth x Height x Length<br/>\r\n64.5 x 66 x 76 cm', 499, './public/assets/images/living_room/terry_armchair1.png','armchair', './public/assets/images/living_room/terry_armchair2.png', './public/assets/images/living_room/terry_armchair3.png', NULL, 100, 1),
(2, 'Large Irregular Mirror', 'livingroom', '', 'mirror', 'LARGE IRREGULAR-SHAPED MIRROR WITH A BLACK FRAME.<br/>\r\nFEATURES THREE ANCHOR POINTS FOR HORIZONTAL AND VERTICAL PLACEMENT.<br/><br/>\r\n\r\nWidth x Height x Length<br/>\r\n80 x 110 x 2.5 cm', 449, './public/assets/images/living_room/mirror1.png','big mirror', './public/assets/images/living_room/mirror2.png', './public/assets/images/living_room/mirror3.png', NULL, 100, 1),
(3, 'Alabaster Floor Lamp', 'livingroom', 'golden', 'lighting', 'FLOOR LAMP WITH AN ALABASTER LAMPSHADE AND GOLDEN STAND. EMITS A WARM AND NATURAL LIGHT, CREATING A VERY COSY ATMOSPHERE.<br/>\r\nALABASTER IS A COMPACT, TRANSLUCENT STONE SIMILAR TO MARBLE, WHICH HAS BEEN USED HISTORICALLY FOR SCULPTURE OR DECORATIVE ARCHITECTURAL ELEMENTS.\r\nLIGHT BULB NOT INCLUDED. RECOMMENDED MAX. 25W BULB. IF THE EXTERNAL CABLE OR CORD OF THE LAMP GETS DAMAGED, IT MUST ONLY BE REPLACED BY A QUALIFIED TECHNICIAN IN ORDER TO AVOID ANY RISK. <br/><br/>\r\n\r\nColour: Golden<br/><br/>\r\n\r\nWidth x Height x Length<br/>\r\n37 x 146 x 18 cm', 579, './public/assets/images/living_room/floor_lamp1.png','tall lamp', './public/assets/images/living_room/floor_lamp2.png', './public/assets/images/living_room/floor_lamp3.png', NULL, 100, 1),
(4, 'Walnut Armchair with Hemp Upholstery ', 'livingroom', 'ecru', 'chair', 'ARMCHAIR UPHOLSTERED WITH NATURAL-COLOURED 100% HEMP FABRIC WITH SOLID SPANISH WALNUT ARMS HAND-TREATED WITH MATTE WAX.<br/>\r\nITS DESIGN IS THE RESULT OF A COLLABORATION WITH BLASCO, A COMPANY THAT SPECIALIZES IN UPHOLSTERED FURNITURE.<br/><br/>\r\n\r\nColour: Ecru<br/><br/>\r\n\r\nWidth x Height x Length<br/>\r\n63 x 75 x 78 cm', 799, './public/assets/images/living_room/walnut_armchair1.png','armchair with wood', './public/assets/images/living_room/walnut_armchair2.png', './public/assets/images/living_room/walnut_armchair3.png', NULL, 100, 1),
(5, 'Mirror with Antique Finish Glass', 'livingroom', 'black', 'mirror', 'SQUARE MIRROR WITH ANTIQUE FINISH GLASS.<br/><br/>\r\n\r\nColour: Black<br/><br/>\r\n\r\nWidth x Height x Length<br/>\r\n60 x 60 x 2.8 cm', 399, './public/assets/images/living_room/antique_mirror1.png','big mirror', './public/assets/images/living_room/antique_mirror2.png', './public/assets/images/living_room/antique_mirror3.png', NULL, 100, 1),
(6, 'Cement Lamp', 'livingroom', 'cement', 'lighting', 'LAMP WITH A CEMENT BASE AND A PLEATED LAMPSHADE.<br/>\r\nLIGHT BULB NOT INCLUDED.<br/>\r\nIF THE EXTERNAL CABLE OR CORD OF THE LAMP GETS DAMAGED, IT MUST ONLY BE REPLACED BY A QUALIFIED TECHNICIAN IN ORDER TO AVOID ANY RISK.<br/><br/>\r\n\r\nColour: Cement<br/><br/>\r\n\r\nWidth x Height x Length<br/>\r\n36 x 52.5 x 36 cm', 389, './public/assets/images/living_room/cement_lamp1.png','grey cement lamp', './public/assets/images/living_room/cement_lamp2.png', './public/assets/images/living_room/cement_lamp3.png', NULL, 100, 1),
(7, 'Striped Blanket', 'livingroom', 'yellow', 'blanket', 'ACRYLIC BLANKET WITH A CONTRAST STRIPE AND FRINGING.<br/><br/>\r\n\r\nColour: Yellow<br/><br/>\r\n\r\n140 x 190 cm', 235, './public/assets/images/living_room/striped_blanket1.png','yellow blanket', './public/assets/images/living_room/striped_blanket2.png', './public/assets/images/living_room/striped_blanket3.png', NULL, 100, 1),
(8, 'Wooden Storage Unit', 'livingroom', 'brown', 'storageunit', 'THIS CONTEMPORARY AND RUSTIC STYLE WOODEN STORAGE UNIT COMBINES THREE STORAGE SHELVES AT DIFFERENT HEIGHTS.\r\nWITH THIS STORAGE UNIT, EVERYTHING WILL BE NEAT AND TIDY.<br/>\r\nPERFECT FOR BATHROOMS, KITCHENS, LIVING ROOMS, OR EVEN BEDROOMS OR DRESSING ROOMS.<br/>\r\nTHANKS TO ITS DESIGN AND FUNCTIONALITY, YOU WILL ACHIEVE A MINIMALIST SPACE OF UNIQUE INDUSTRIAL INSPIRATION.<br/>\r\nWEIGHT: 2.5 KG.<br/><br/>\r\n\r\nColour: Brown<br/><br/>\r\n\r\nWidth x Height x Length<br/>\r\n28.2 x 88.3 x 18.5 cm', 789, './public/assets/images/living_room/storage_unit1.png','wood storage', './public/assets/images/living_room/storage_unit2.png', './public/assets/images/living_room/storage_unit3.png', NULL, 100, 1);