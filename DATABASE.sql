-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 06, 2020 at 02:48 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE products;

USE products;

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `SKU` char(50) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `type` char(11) NOT NULL,
  `size` char(11) DEFAULT NULL,
  `weight` char(11) DEFAULT NULL,
  `height` char(11) DEFAULT NULL,
  `width` char(11) DEFAULT NULL,
  `lenght` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
