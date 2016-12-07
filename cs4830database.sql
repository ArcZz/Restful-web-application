--
-- Database: `bookstore`
--

DROP SCHEMA IF EXISTS bookstore;
CREATE SCHEMA bookstore;
USE bookstore;
SET AUTOCOMMIT=0;

DROP TABLE IF EXISTS `user`;

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name_first` varchar(50) DEFAULT NULL,
  `name_last` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name_first`, `name_last`, `email`, `password`) VALUES
(1, 'rogers63', 'david', 'john', '1312@gmail.com', 'e6a33eee180b07e563d74fee8c2c66b8'),
(2, 'mike28', 'rogers', 'paul', '1312@gmail.com', '2e7dc6b8a1598f4f75c3eaa47958ee2f'),
(3, 'rivera92', 'david', 'john', '1312@gmail.com', '1c3a8e03f448d211904161a6f5849b68'),
(4, 'ross95', 'maria', 'sanders', '1312@gmail.com', '62f0a68a4179c5cdd997189760cbcf18'),
(5, 'paul85', 'morris', 'miller', '1312@gmail.com', '61bd060b07bddfecccea56a82b850ecf'),
(6, 'smith34', 'daniel', 'michael', '1312@gmail.com', '7055b3d9f5cb2829c26cd7e0e601cde5'),
(7, 'james84', 'sanders', 'paul', '1312@gmail.com', 'b7f72d6eb92b45458020748c8d1a3573'),
(8, 'daniel53', 'mark', 'mike', '1312@gmail.com', '299cbf7171ad1b2967408ed200b4e26c'),
(9, 'brooks80', 'morgan', 'maria', '1312@gmail.com', 'aa736a35dc15934d67c0a999dccff8f6'),
(10, 'morgan65', 'paul', 'miller', '1312@gmail.com', 'a28dca31f5aa5792e1cefd1dfd098569');


CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(50) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;
INSERT INTO `book` (`id`, `name`, `price`,`status`) VALUES
(1, 'a', 100,1),
(2, 'b', 20,0),
(3, 'c', 30,0),
(4, 'd', 234,1),
(5, 'e', 21,0),
(6, 'f', 432,1);

CREATE TABLE IF NOT EXISTS `rent` (
  `user_id` int(11) NOT NULL REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE,
  `book_id` int(11) NOT NULL REFERENCES book(id) ON DELETE CASCADE ON UPDATE CASCADE,
  `date` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`, `book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
