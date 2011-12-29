-- phpMyAdmin SQL Dump
-- version 2.6.0-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 09, 2006 at 12:53 PM
-- Server version: 4.1.10
-- PHP Version: 5.1.2
-- 
-- Database: `port`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `cat_po`
-- 

DROP TABLE IF EXISTS `cat_po`;
CREATE TABLE `cat_po` (
  `c_id` int(11) NOT NULL auto_increment,
  `port_id` int(11) NOT NULL default '0',
  `cat_id` int(11) NOT NULL default '0',
  `port_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`c_id`)
) ENGINE=MyISAM  AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `cat_po`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `cat_port`
-- 

DROP TABLE IF EXISTS `cat_port`;
CREATE TABLE `cat_port` (
  `ID` int(11) NOT NULL auto_increment,
  `NAME` varchar(75) NOT NULL default '',
  `cat_order` smallint(11) NOT NULL default '0',
  `cat_desc` text NOT NULL,
  `cat_sef_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `cat_port`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `details`
-- 

DROP TABLE IF EXISTS `details`;
CREATE TABLE `details` (
  `det_id` int(11) NOT NULL auto_increment,
  `det_name` varchar(75) NOT NULL default '',
  `det_desc` text NOT NULL,
  PRIMARY KEY  (`det_id`)
) ENGINE=MyISAM  AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `details`
-- 

INSERT INTO `details` VALUES (1, 'default', '<table width="100%" border="0" align="center"><tr><td colspan="2" rowspan="4" align="left" valign="top">{image} </td>      <td width="893" valign="top">{title}        <div align="left"></div></td>    </tr>    <tr>      <td valign="top" >{description}     ...</td>    </tr>    <tr>      <td><div align="left">{website}</div></td>    </tr> <tr>      <td>{back_link}</td>    </tr> </table>');
INSERT INTO `details` VALUES (2, 'detail', 'detail');

-- --------------------------------------------------------

-- 
-- Table structure for table `images_port`
-- 

DROP TABLE IF EXISTS `images_port`;
CREATE TABLE `images_port` (
  `id` int(8) NOT NULL auto_increment,
  `port_id` int(8) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `img_large` varchar(255) NOT NULL default '',
  `img_thumb` varchar(255) NOT NULL default '',
  `_order` int(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `port_id` (`port_id`)
) ENGINE=MyISAM  AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `images_port`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `portfolio`
-- 

DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE `portfolio` (
  `ID` int(11) NOT NULL auto_increment,
  `NAME` varchar(75) NOT NULL default '',
  `IMAGE` varchar(75) NOT NULL default '',
  `DESCRIPTION` text NOT NULL,
  `CAT` int(11) NOT NULL default '0',
  `LENGTH` int(11) NOT NULL default '0',
  `WEBSITE` varchar(120) NOT NULL default '',
  `SHOWORDER` int(11) NOT NULL default '10',
  `SEF_NAME` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  KEY `SHOWORDER` (`SHOWORDER`)
) ENGINE=MyISAM  AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `portfolio`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `settings`
-- 

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL auto_increment,
  `set_readme` varchar(75) NOT NULL default 'read_me.gif',
  `set_logo` varchar(75) NOT NULL default '',
  `set_maxthumbs` int(11) NOT NULL default '0',
  `set_imageh` int(11) NOT NULL default '0',
  `set_imagew` int(11) NOT NULL default '0',
  `set_lclass` varchar(75) NOT NULL default '',
  `set_tclass` varchar(75) NOT NULL default '',
  `set_hclass` varchar(75) NOT NULL default '',
  `set_htext` varchar(75) NOT NULL default '',
  `set_hcolor` varchar(75) NOT NULL default '',
  `set_hsize` varchar(75) NOT NULL default '',
  `set_align` varchar(10) NOT NULL default '',
  `set_temp_id` int(11) NOT NULL default '0',
  `set_cat` tinyint(4) NOT NULL default '1',
  `set_det_id` int(11) NOT NULL default '0',
  `resize_width` int(4) NOT NULL default '0',
  `resize_height` int(4) NOT NULL default '0',
  `inclusion_script` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`settings_id`)
) ENGINE=MyISAM  AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `settings`
-- 

INSERT INTO `settings` VALUES (1, 'images/read_me.gif','images/logo.jpg', 3, 700, 500, '111', '', '345', 'Verdana, Arial, Helvetica, sans-serif', '#006600', 'smaller', 'left', 1, 1, 1, 104, 102, '/myp/test.php');

-- --------------------------------------------------------

-- 
-- Table structure for table `templates`
-- 

DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `temp_id` int(11) NOT NULL auto_increment,
  `temp_name` varchar(75) NOT NULL default '',
  `temp_desc` text NOT NULL,
  PRIMARY KEY  (`temp_id`)
) ENGINE=MyISAM  AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `templates`
-- 

INSERT INTO `templates` VALUES (1, 'default', '<table width="100%" border="0" align="center"><tr><td colspan="2" rowspan="3" align="left" valign="top">{image} </td>      <td width="893" valign="top">{title}        <div align="left"></div></td>    </tr>    <tr>      <td valign="top" >{description}     ...</td>    </tr>    <tr>      <td><div align="left">{readmore}</div></td>    </tr>  </table>');
INSERT INTO `templates` VALUES (2, 'template1', '<table width="100%" border="0" align="center"><tr><td width="852" valign="top">{title}        <div align="left"></div></td>  <td width="96" rowspan="3" valign="top">{image}</td></tr>    <tr>      <td valign="top" >{description}     ...</td>    </tr>    <tr>      <td><div align="left">{readmore}</div></td>      </tr>  </table>');
INSERT INTO `templates` VALUES (3, 'listing', 'listing');

-- --------------------------------------------------------

-- 
-- Table structure for table `variables`
-- 

DROP TABLE IF EXISTS `variables`;
CREATE TABLE `variables` (
  `id` int(8) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL default '',
  `text_text` text NOT NULL,
  `image` varchar(255) NOT NULL default '',
  `image_alt` varchar(255) NOT NULL default '',
  `link_title` varchar(255) NOT NULL default '',
  `link_url` varchar(255) NOT NULL default '',
  `link_target` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `variables`
-- 

        