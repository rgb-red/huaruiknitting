-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-01-16 09:54:16
-- 服务器版本： 10.1.43-MariaDB
-- PHP 版本： 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `huaruiknitting`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logins` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `salt`, `nickname`, `logins`, `last_login`) VALUES
(0, 'admin', 'dc4365de755522ea963640d64c2b7178', '08aM', '管理员', '0', '0');

-- --------------------------------------------------------

--
-- 表的结构 `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tel` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `factory`
--

CREATE TABLE `factory` (
  `id` int(255) NOT NULL,
  `sort` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `en_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `factory`
--

INSERT INTO `factory` (`id`, `sort`, `title`, `en_title`) VALUES
(8, 0, '办公区', 'Workspace'),
(9, 0, '厂房大楼', 'Plant building'),
(10, 0, '厂房大门', 'Plant door'),
(11, 0, '厂房环境', 'Plant environment'),
(12, 0, '厂房环境', 'Plant environment'),
(13, 0, '厂房环境', 'Plant environment'),
(14, 0, '公司前台', 'Front desk'),
(15, 0, '公司展厅', 'Exhibition hall'),
(16, 0, '公司展厅', 'Exhibition hall'),
(17, 0, '生产环境', 'Environment'),
(18, 0, '生产环境', 'Environment'),
(19, 0, '生产环境', 'Environment'),
(20, 0, '生产环境', 'Environment'),
(21, 0, '生产环境', 'Environment'),
(22, 0, '生产环境', 'Environment'),
(23, 0, '生产环境', 'Environment'),
(24, 0, '生产环境', 'Environment'),
(25, 0, '生产环境', 'Environment'),
(26, 0, '生产环境', 'Environment'),
(27, 0, '生产环境', 'Environment'),
(28, 0, '生产环境', 'Environment'),
(29, 0, '生产环境', 'Environment'),
(30, 0, '生产环境', 'Environment'),
(31, 0, '生产环境', 'Environment'),
(32, 0, '生产环境', 'Environment'),
(33, 0, '生产环境', 'Environment'),
(34, 0, '生产环境', 'Environment'),
(35, 0, '生产环境', 'Environment'),
(36, 0, '生产环境', 'Environment'),
(37, 0, '生产环境', 'Environment'),
(38, 0, '生产环境', 'Environment'),
(39, 0, '生产环境', 'Environment'),
(40, 0, '生产环境', 'Environment'),
(41, 0, '生产环境', 'Environment'),
(42, 0, '生产环境', 'Environment'),
(43, 0, '生产环境', 'Environment'),
(44, 0, '生产环境', 'Environment'),
(45, 0, '生产环境', 'Environment'),
(46, 0, '生产环境', 'Environment'),
(47, 0, '生产环境', 'Environment'),
(48, 0, '生产环境', 'Environment'),
(49, 0, '生产环境', 'Environment'),
(50, 0, '生产环境', 'Environment'),
(51, 0, '生产环境', 'Environment'),
(52, 0, '生产环境', 'Environment'),
(53, 0, '生产环境', 'Environment'),
(54, 0, '生产环境', 'Environment'),
(55, 0, '印花机', 'Printing machine');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `en_title` varchar(255) NOT NULL,
  `classify` tinyint(4) NOT NULL,
  `hot` int(255) NOT NULL,
  `brief` varchar(255) NOT NULL,
  `en_brief` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `en_text` text NOT NULL,
  `cover` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `en_title`, `classify`, `hot`, `brief`, `en_brief`, `text`, `en_text`, `cover`, `status`, `time`) VALUES
(6, '华瑞是一个富有激情和理想的团队', 'Believing in concentrated inspiration and continuous innovation', 1, 0, '华瑞是一个富有激情和理想的团队，充满着追求创新的进取精神，在中国染整行业的发展道路上，华瑞扮演着极其重要的角色。“用心感悟  持续创新”，公司积极开创染整技术应...', 'Believing in concentrated inspiration and continuous innovation, our company has been actively innovating the applicatio...', '&lt;p&gt;华瑞是一个富有激情和理想的团队，充满着追求创新的进取精神，在中国染整行业的发展道路上，华瑞扮演着极其重要的角色。&lt;br&gt;&lt;br&gt;“用心感悟&amp;nbsp; 持续创新”，公司积极开创染整技术应用的创新，充分拓展企业生存空间。坚持企业的核心理念：追求卓越品质、努力打造完善的快速染整营销网络！公司未来广阔的发展空间是职员最好的施展舞台。&lt;br&gt;&lt;br&gt;公司致力于培养有共同价值观和企业文化的专业团队。吸引了一批懂经营、善管理、有专业知识、专业技术、不断追求卓越的人才，这是公司最大的财富。&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Believing in concentrated inspiration and continuous innovation, our company has been actively innovating the application of textile dyeing and finishing and expanding the enterprise’s room of development as much as possible.&lt;br&gt;&lt;/p&gt;', 1, 1, 1578804620),
(7, '华瑞针织实业有限公司', 'Boluo Huarui Knitting Industrial Co., Ltd.', 1, 0, '        博罗县华瑞针织实业有限公司创办于1995年，前身是汕头市金晨织造有限公司，公司一关以竭诚服务，努力为用户创造价值为宗旨，凭借出色的品种和可靠的产...', 'Boluo Huarui Knitting Industrial Co., Ltd., formerly known as Shantou Jinchen Weaving Co., Ltd., was founded in 1995 and...', '&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 博罗县华瑞针织实业有限公司创办于1995年，前身是汕头市金晨织造有限公司，公司一关以竭诚服务，努力为用户创造价值为宗旨，凭借出色的品种和可靠的产品质量立足市场，至今已发展成一家，具有一定规模的大型企业！公司占地面积40000多平方米，整体规划计划可靠兼容多种功能！现如今更创立了惠州市佳炜印花厂有限公司，在原先经验丰富的染整基础上不断发展。&lt;br&gt;&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 公司拥有先进的德国卡尔耶经编、得乐纬编机、电脑提花、亚矶的染缸、立兴经轴缸、气流缸、巨新印花机、台湾青山水洗机，及日本、台湾等知名生产设备。专业从事运动装、泳装、女性内衣面料，功能型面料等设计、研发织造，染色，印花，营销于一体的现代化企业。产品畅销国内外，出口东南亚、美国及欧洲等地，深受广大用户青睐。为了进一步开拓新产品，确保原料品质环保优良，开发出各系列的专门功能产品。公司以ISO9001：2008国际质量管理体系管理模式为指导，致力于产品的质量保证和持续改进，同时严格实行“不合格原材料不投入、不合格品不生产、不合格产品不出厂”的三级产品质量检验制度，坚持“工序自检与质检监控相结合”的全员质量监控制度，目前已通过Oeko-Tex Standard 100环保认证，是集高档面料研发、设计、生产及销售为一体的现代化科技型纺织印染企业，技术生产力量雄厚，具备满足各层次多样化客户需求的能力。&lt;br&gt;&lt;br&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; “勇于实践，不断创新，客户满意，信誉第一”是“华瑞公司”不懈的追求。华瑞针织能满足不同客户要求，能确保在客户规定的时间内完成，信誉卓著。以诚信和务实为宗旨，追求高品质，高效率，当您要寻找专业生产泳装内衣面料企业，我们将是您满意的合作伙伴及供应商。&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Boluo Huarui Knitting Industrial Co., Ltd., formerly known as Shantou Jinchen Weaving Co., Ltd., was founded in 1995 and follows the principle of offering wholehearted service and creating value for customers. Our company has been expanding market through excellent product type and reliable product quality, and now it has become a large enterprise that covers an area of over 40,000 square meters. Besides, it will multiple functions according to overall planning. &lt;br&gt;&lt;br&gt;Our company is equipped with advanced German-made Carl warp knitting machine, De-Nol weft knitting machine, computer jacquard machine, Asia Kingdom dye vat, Lixing warp beam cylinder, air flow dyeing machine, Juxin decorating machine, Qingshan rinsing machine from Taiwan, and other famous production devices from Japan and Taiwan. Huarui is a modern enterprise that specializes in the design, research, weaving, dyeing, printing and marketing of sportswear, swimsuit, and fabric for women&#039;s underwear. So far our products have enjoyed a ready sale at home and abroad, and have been exported to Southeast Asia, the US, Europe and other regions. Besides, our products have won the good graces of numerous customers. To further expand new products and make sure the material quality is excellent and environmental-friendly, we have developed a series of products with special functions. Guided by the ISO9001:2008 international quality management system model, our company commits to the product quality assurance and continuous improvement whilst exercising strict three-level quality inspection system, namely unqualified materials shall not be input; nonconforming products shall not be produced;nonconforming products shall not be delivered. Besides, we stick to the quality monitoring system among all the personnel, which integrates process self-inspection and monitoring of quality inspection. Currently, we have obtained the Oeko-Tex Standard 100 environmental certification and our company is a modern technology-based textile printing and dyeing enterprise that integrates the research, design, production and sale of high-grade fabrics. It is highly powerful in technical and production strength and is able to meet the needs of various customers. &lt;br&gt;&lt;br&gt;Bold practice, continuous innovation, customer satisfaction and reputation first are Huarui’s unremitting pursuit. Our textile products can meet the need of different customers and can be finished within the deadline required by customers. Operated under the principle of excellent reputation, good faith and concrete effort, we are in pursuit of high quality and high efficiency. As a professional swimsuit fabric manufacturer, Huarui is bound to be your satisfactory partner and supplier.&lt;br&gt;&lt;/p&gt;', 1, 1, 1578804610),
(8, '为生活提供更舒适、更健康、更美的产品', 'Bold practice, continuous innovation, customer satisfaction and reputation first are Huarui’s unremitting pursuit.', 1, 0, '        “勇于实践，不断创新，客户满意，信誉第一”是“华瑞公司”不懈的追求。华瑞针织能满足不同客户要求，能确保在客户规定的时间内完成，信誉卓著。以诚信和...', 'Bold practice, continuous innovation, customer satisfaction and reputation first are Huarui’s unremitting pursuit. Our t...', '&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; “勇于实践，不断创新，客户满意，信誉第一”是“华瑞公司”不懈的追求。华瑞针织能满足不同客户要求，能确保在客户规定的时间内完成，信誉卓著。以诚信和务实为宗旨，追求高品质，高效率，当您要寻找专业生产泳装内衣面料企业，我们将是您满意的合作伙伴及供应商。&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Bold practice, continuous innovation, customer satisfaction and reputation first are Huarui’s unremitting pursuit. Our textile products can meet the need of different customers and can be finished within the deadline required by customers. Operated under the principle of excellent reputation, good faith and concrete effort, we are in pursuit of high quality and high efficiency. As a professional swimsuit fabric manufacturer, Huarui is bound to be your satisfactory partner and supplier.&lt;br&gt;&lt;/p&gt;', 1, 1, 1578804531);

-- --------------------------------------------------------

--
-- 表的结构 `news_classify`
--

CREATE TABLE `news_classify` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `news_classify`
--

INSERT INTO `news_classify` (`id`, `title`, `name`, `sort`) VALUES
(1, 'Company News', '公司动态', 1),
(2, 'Industry News', '行业资讯', 2),
(4, 'Exhibition', '展会信息', 3);

-- --------------------------------------------------------

--
-- 表的结构 `page`
--

CREATE TABLE `page` (
  `id` int(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `en_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `page`
--

INSERT INTO `page` (`id`, `page`, `text`, `en_text`) VALUES
(1, 'about', '博罗县华瑞针织实业有限公司创办于1995年，前身是汕头市金晨织造有限公司，公司一关以竭诚服务，努力为用户创造价值为宗旨，凭借出色的品种和可靠的产品质量立足市场，至今已发展成一家，具有一定规模的大型企业！公司占地面积40000多平方米，整体规划计划可靠兼容多种功能，现如今更创立了惠州市佳炜印花厂有限公司，在原先丰富的染整基础上不断发展...', 'Boluo Huarui Knitting Industrial Co., Ltd., formerly known as Shantou Jinchen Weaving Co., Ltd., was founded in 1995 and follows the principle of offering wholehearted service and creating value for customers. Our company has been expanding market through excellent product type and reliable product quality, and now it has become a large enterprise that covers an area of over 40,000 square meters... '),
(2, 'intro', '&lt;p align=&quot;center&quot;&gt;&lt;img src=&quot;http://h.com/uploads/page/2020-01-11-e81674c1278c68cb6682e5f49fbf2503.jpg&quot; alt=&quot;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p align=&quot;center&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;　　&lt;b&gt;博罗县华瑞针织实业有限公司&lt;/b&gt;创办于1995年，前身是汕头市金晨织造有限公司，公司一贯以竭诚服务，努力为用户创造价值为宗旨，凭借出色的品种和可靠的产品质量立足市场，至今已发展成一家，具有一定规模的大型企业！公司占地面积40000多平方米，整体规划计划可靠兼容多种功能！现如今更创立了惠州市佳炜印花厂有限公司，在原先丰富的染整基础上继续不断发展。&lt;/p&gt;&lt;p&gt;　　公司拥有先进的德国卡尔耶经编、得乐纬编机、电脑提花、亚矶的染缸、立兴经轴缸、气流缸、巨新印花机、台湾青山水洗机，及日本、台湾等知名生产设备。专业从事运动装、泳装、女性内衣面料，功能型面料等设计、研发、织造，染色，印花，营销于一体的现代化企业。产品畅销国内外，出口东南亚、美国及欧洲等地，深受广大用户青睐。为了进一步开拓新产品，确保原料品质环保优良，开发出各系列的专门功能产品。公司以ISO9001：2008国际质量管理体系管理模式为指导，致力于产品的质量保证和持续改进，同时严格实行“不合格原材料不投入、不合格品不生产、不合格产品不出厂”的三级产品质量检验制度，坚持“工序自检与质检监控相结合”的全员质量监控制度，目前已通过Oeko-Tex\n Standard \n100环保认证，是集高档面料研发、设计、生产及销售为一体的现代化科技型纺织印染企业，技术生产力量雄厚，具备满足各层次多样化客户需求的能力。&lt;/p&gt;&lt;p&gt;　　“勇于实践，不断创新，客户满意，信誉第一”是“华瑞公司”不懈的追求。华瑞针织能满足不同客户要求，能确保在客户规定的时间内完成，信誉卓著。以诚信和务实为宗旨，追求高品质，高效率，当您要寻找专业生产泳装内衣面料企业，我们将是您满意的合作伙伴及供应商。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '&lt;p align=&quot;center&quot;&gt;&lt;img src=&quot;http://h.com/uploads/page/2020-01-11-487c4fb56e7a55dca29670575ad5e11e.jpg&quot; alt=&quot;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p align=&quot;center&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Boluo Huarui Knitting Industrial Co., Ltd., formerly known as Shantou\n Jinchen Weaving Co., Ltd., was founded in 1995 and follows the \nprinciple of offering wholehearted service and creating value for \ncustomers. Our company has been expanding market through excellent \nproduct type and reliable product quality, and now it has become a large\n enterprise that covers an area of over 40,000 square meters. Besides, \nit will multiple functions according to overall planning.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Our \ncompany is equipped with advanced German-made Carl warp knitting \nmachine, De-Nol weft knitting machine, computer jacquard machine, Asia \nKingdom dye vat, Lixing warp beam cylinder, air flow dyeing machine, \nJuxin decorating machine, Qingshan rinsing machine from Taiwan, and \nother famous production devices from Japan and Taiwan. Huarui is a \nmodern enterprise that specializes in the design, research, weaving, \ndyeing, printing and marketing of sportswear, swimsuit, and fabric for \nwomen&#039;s underwear. So far our products have enjoyed a ready sale at home\n and abroad, and have been exported to Southeast Asia, the US, Europe \nand other regions. Besides, our products have won the good graces of \nnumerous customers. To further expand new products and make sure the \nmaterial quality is excellent and environmental-friendly, we have \ndeveloped a series of products with special functions. Guided by the \nISO9001:2008 international quality management system model, our company \ncommits to the product quality assurance and continuous improvement \nwhilst exercising strict three-level quality inspection system, namely \nunqualified materials shall not be input; nonconforming products shall \nnot be produced;nonconforming products shall not be delivered. Besides, \nwe stick to the quality monitoring system among all the personnel, which\n integrates process self-inspection and monitoring of quality \ninspection. Currently, we have obtained the Oeko-Tex Standard 100 \nenvironmental certification and our company is a modern technology-based\n textile printing and dyeing enterprise that integrates the research, \ndesign, production and sale of high-grade fabrics. It is highly powerful\n in technical and production strength and is able to meet the needs of \nvarious customers.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Bold practice, continuous innovation, \ncustomer satisfaction and reputation first are Huarui’s unremitting \npursuit. Our textile products can meet the need of different customers \nand can be finished within the deadline required by customers. Operated \nunder the principle of excellent reputation, good faith and concrete \neffort, we are in pursuit of high quality and high efficiency. As a \nprofessional swimsuit fabric manufacturer, Huarui is bound to be your \nsatisfactory partner and supplier.&lt;/p&gt;'),
(3, 'speech', '&lt;p&gt;　　作为公司的一员，我非常高兴和大家一起度过美好的工作时光。&lt;/p&gt;&lt;p&gt;　　华瑞是一个富有激情和理想的团队，充满着追求创新的进取精神，在中国染整行业的发展道路上，华瑞扮演着极其重要的角色。&lt;/p&gt;&lt;p&gt;　　“用心感悟  持续创新”，公司积极开创染整技术应用的创新，充分拓展企业生存空间。坚持企业的核心理念：追求卓越品质、努力打造完善的快速染整营销网络！公司未来广阔的发展空间是职员最好的施展舞台。&lt;/p&gt;&lt;p&gt;　　公司致力于培养有共同价值观和企业文化的专业团队。吸引了一批懂经营、善管理、有专业知识、专业技术、不断追求卓越的人才，这是公司最大的财富。&lt;/p&gt;&lt;p&gt;　　公司为职员提供可持续发展的机会和空间，努力营造愉快工作、公平竞争的工作氛围，只要你对行业充满兴趣与激情、诚信敬业、乐观上进，你必将得到理想收获，展现你的人生更高价值！&lt;/p&gt;&lt;p&gt;　　团队意识与强烈责任感、敬业精神，是公司稳步前进的力量源泉。以公司共同目标和整体形象为前提，为职员提供广阔的发展空间。为企业、为社会创造更大价值！&lt;/p&gt;&lt;p&gt;　　公司倡导快乐的工作、志趣相投的同事、健康的体魄、开放的心态、乐观向上的精神，这些都是金钱无法替代的价值。我期待你在这和谐、理想而富有激情的环境中尽情施展才华，与公司一起成长。&lt;/p&gt;&lt;p&gt;　　作为公司团队中的一员，你为公司所付出的努力和贡献，我衷心感谢！&lt;/p&gt;&lt;p&gt;　　祝愿你在公司工作愉快！&lt;/p&gt;', '&lt;p&gt;As a member of Huarui, I am very happy to work with you all.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Huarui\n is a team alive with enthusiasm and ideal as well as innovative and \nenterprising spirit. Moreover, Huarui has played a pivotal role in \ndeveloping the dyeing industry of China.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Believing in \nconcentrated inspiration and continuous innovation, our company has been\n actively innovating the application of textile dyeing and finishing and\n expanding the enterprise’s room of development as much as possible.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Our\n company engages in the cultivation of professional team with common \nvalues and corporate culture and has attracted a team of talents that \nare good at business operation and management and has professional \nknowledge, professional technology and constant pursuit. This is the \nbiggest wealth of our company.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Huarui also provides our \nemployees with chances and room for continuous development and strives \nto bring about a working environment for happy work and fair \ncompetition. As long as you are interested in and enthusiastic about the\n industry and are honest, optimistic, self-motivated and devoted to \nwork, you will definitely be rewarded as expected and give play to \nhigher value of your life.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Team spirit, strong sense of \nresponsibility and dedication to work are the source for the steady \nprogress of our company. Targeting at realizing the corporate common \nobjective and overall image, we shall provide our employees with wide \nroom of development.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Our company also upholds happy work, \ncongenial colleagues, healthy state, open mind and optimistic and active\n spirit which are values that cannot be bought by money. I hope you will\n give full play to your talents in this harmonious environment that is \nalive with harmony, ideal and passion.&lt;/p&gt;&lt;br&gt;&lt;p&gt;As a member of Huarui, I would like to extend my heartfelt thanks to your efforts and contributions all along.&lt;/p&gt;&lt;p&gt;Wish you to enjoy your work&lt;/p&gt;'),
(4, 'culture', '&lt;p&gt;　　资料整理中...&lt;/p&gt;', '&lt;p&gt;culture...&lt;/p&gt;'),
(5, 'honor', '&lt;img src=&quot;http://h.com/uploads/page/2020-01-12-b5782f4432b0d21e60b3579cc1060a6e.jpg&quot; alt=&quot;&quot;&gt;&lt;br&gt;', '&lt;p&gt;&lt;img src=&quot;http://h.com/uploads/page/2020-01-12-b5782f4432b0d21e60b3579cc1060a6e.jpg&quot; alt=&quot;&quot;&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `en_title` varchar(255) NOT NULL,
  `classify` tinyint(255) NOT NULL,
  `hot` int(255) NOT NULL,
  `brief` text NOT NULL,
  `en_brief` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `en_text` text NOT NULL,
  `cover` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `push` tinyint(4) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `number`, `title`, `en_title`, `classify`, `hot`, `brief`, `en_brief`, `text`, `en_text`, `cover`, `status`, `push`, `time`) VALUES
(63, 'YC-001', '瑜伽服', 'Yoga clothes', 6, 0, '瑜伽服', 'Yoga clothes', '&lt;p&gt;瑜伽服&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Yoga clothes&lt;br&gt;&lt;/p&gt;', 1, 1, 2, 1578799231),
(64, 'SS-001', '运动衣', 'Sport suit', 6, 0, '运动衣', 'Sport suit', '&lt;p&gt;运动衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Sport suit&lt;br&gt;&lt;/p&gt;', 1, 1, 2, 1578799214),
(65, 'SS-002', '运动衣', 'Sport suit ', 6, 0, '运动衣', 'Sport suit ', '&lt;p&gt;运动衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Sport suit &lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578730445),
(69, 'CS-001', '儿童泳衣', 'Children&#039;s swimwear', 5, 0, '儿童泳衣', 'Children&#039;s swimwear', '&lt;p&gt;儿童泳衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Children&#039;s swimwear&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578730407),
(70, 'MS-001', '男士泳衣 ', 'Men&#039;s swimwear', 5, 0, '男士泳衣 ', 'Men&#039;s swimwear', '&lt;p&gt;男士泳衣 &lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Men&#039;s swimwear&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578730396),
(71, 'WS-001', '女士泳衣', 'Women&#039;s swimwear', 5, 0, '女士泳衣', 'Women&#039;s swimwear', '&lt;p&gt;女士泳衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Women&#039;s swimwear&lt;br&gt;&lt;/p&gt;', 1, 1, 2, 1578730379),
(72, 'TC-001', '保暖衣', 'Thermal cloth', 8, 0, '保暖衣', 'Thermal cloth', '&lt;p&gt;保暖衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Thermal cloth&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578800494),
(73, 'TC-002', '保暖衣', 'Thermal cloth', 8, 0, '保暖衣', 'Thermal cloth', '&lt;p&gt;保暖衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Thermal cloth&lt;br&gt;&lt;/p&gt;', 1, 1, 2, 1578662320),
(74, 'TC-003', '保暖衣', 'Thermal cloth', 8, 0, '保暖衣', 'Thermal cloth', '&lt;p&gt;保暖衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Thermal cloth&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578662355),
(75, 'LU-001', '花边内衣', 'Lace underwear', 4, 0, '花边内衣', 'Lace underwear', '&lt;p&gt;花边内衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Lace underwear&lt;br&gt;&lt;/p&gt;', 1, 1, 2, 1578730337),
(76, 'FU-001', '塑性内衣', 'Forming underwear', 4, 0, '塑性内衣', 'Forming underwear', '&lt;p&gt;塑性内衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Forming underwear&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578662599),
(77, 'JU-001', '提花内衣', 'Jacquard underwear', 4, 0, '提花内衣', 'Jacquard underwear', '&lt;p&gt;提花内衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Jacquard underwear&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578662645),
(78, 'JU-002', '提花内衣', 'Jacquard underwear', 4, 0, '提花内衣', 'Jacquard underwear', '&lt;p&gt;提花内衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Jacquard underwear&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578662683),
(79, 'PMU-001', '透气网孔内裤', 'Permeable mesh underpants', 4, 0, '透气网孔内裤', 'Permeable mesh underpants', '&lt;p&gt;透气网孔内裤&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Permeable mesh underpants&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578662715),
(80, 'MU-001', '网布内衣', 'Mesh underwear', 4, 0, '网布内衣', 'Mesh underwear', '&lt;p&gt;网布内衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Mesh underwear&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578662751),
(81, 'MJU-001', '网布提花内衣', 'Mesh jacquard underwear', 4, 0, '网布提花内衣', 'Mesh jacquard underwear', '&lt;p&gt;网布提花内衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Mesh jacquard underwear&lt;br&gt;&lt;/p&gt;', 1, 1, 1, 1578662794),
(82, 'SSU-001', '无痕光面内衣', 'Seamless smooth underwear', 4, 0, '无痕光面内衣', 'Seamless smooth underwear', '&lt;p&gt;无痕光面内衣&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Seamless smooth underwear&lt;br&gt;&lt;/p&gt;', 1, 1, 2, 1578800480);

-- --------------------------------------------------------

--
-- 表的结构 `product_classify`
--

CREATE TABLE `product_classify` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `product_classify`
--

INSERT INTO `product_classify` (`id`, `title`, `name`, `sort`) VALUES
(4, 'Underwear', '内衣系列', 1),
(5, 'Swimwear', '泳衣系列', 2),
(6, 'Sportswear', '运动系列', 3),
(8, 'Thermal cloth', '保暖衣系列', 4);

-- --------------------------------------------------------

--
-- 表的结构 `site_info`
--

CREATE TABLE `site_info` (
  `id` int(11) NOT NULL,
  `sitename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkman` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `point` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_record` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `front_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bg_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `site_info`
--

INSERT INTO `site_info` (`id`, `sitename`, `keywords`, `description`, `tel`, `fax`, `email`, `linkman`, `phone`, `qq`, `point`, `addr`, `site_record`, `company_info`, `front_url`, `bg_url`) VALUES
(0, '博罗县华瑞针织实业有限公司', '内衣超薄面料,内衣提花面料,内衣网布,睡衣,功能性面料', '专业从事运动装、泳装、女性内衣面料，功能型面料等的设计、研发.织造.染色.印花.营销于一体的现代化企业。', '0752-6988698', '0752-6122128', '476692184@qq.com', '郑炜豪', '13500198222', '476692184', '113.998544,23.177511', '广东省惠州市博罗县园洲镇九潭桦阳环保工业区旁', '粤ICP备12040972号', '441322000003556', 'http://h.com', 'http://admin.h.com'),
(1, 'Boluo Huarui Knitting Industrial Co., Ltd.', 'thermal cloth,underwear,swimwear,sportswear,Jacquard underwear,Mesh underwear,Mesh jacquard underwear,Seamless smooth underwear,Jacquard underwear', 'Boluo Huarui Knitting Industrial Co., Ltd., formerly known as Shantou Jinchen Weaving Co., Ltd., was founded in 1995 and follows the principle of offering wholehearted service and creating value for customers.', '0752-6988698', '0752-6122128', '476692184@qq.com', 'Zheng Weihao', '13500198222', '476692184', '113.998544,23.177511', 'beside Jiutan Huayang Environmental Industrial Area, Yuanzhou Town, Boluo County, Huizhou, Guangdong', '粤ICP备12040972号', '441322000003556', 'http://h.com', 'http://admin.h.com');

-- --------------------------------------------------------

--
-- 表的结构 `slide`
--

CREATE TABLE `slide` (
  `id` tinyint(4) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `slide`
--

INSERT INTO `slide` (`id`, `sort`, `url`) VALUES
(20, 0, ''),
(21, 0, ''),
(22, 0, '');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `news_classify`
--
ALTER TABLE `news_classify`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `product_classify`
--
ALTER TABLE `product_classify`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `factory`
--
ALTER TABLE `factory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `news_classify`
--
ALTER TABLE `news_classify`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `page`
--
ALTER TABLE `page`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- 使用表AUTO_INCREMENT `product_classify`
--
ALTER TABLE `product_classify`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `slide`
--
ALTER TABLE `slide`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
