-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 01:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanak`
--

CREATE TABLE `clanak` (
  `id` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(255) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `clanak`
--

INSERT INTO `clanak` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(5, '2024-06-12 22:13:18', '30 Goth Brands To Check Out', 'From well known to smaller brands!', '      No list of goth brands is complete without Killstar. They\'re a behemoth in the scene, though a bit on the pricey side and leaning towards fast fashion. However, they do create beautiful things for you and your home.\r\n\r\n1. Killstar\r\n2. Ask & Embla\r\n3. Tommy Vowles\r\n4. Dr Martens\r\n5. Disturbia\r\n6. Regal Rose\r\n7. Black Milk Clothing\r\n8. Underground\r\n9. Mary Wyatt London\r\n10. Dreadful Pigeon\r\n11. Punk Rave\r\n12. Rogue & Wolf\r\n13. TUK Footwear\r\n14. Restyle\r\n15. Mysticum Luna\r\n16. Church of Sanctus\r\n17. Blood Milk Jewels\r\n18. Foxblood\r\n19. Blackcraft Cult\r\n20. Bloody Mary Metal\r\n21. Lip Service\r\n22. Widow Clothing\r\n23. Loungefly\r\n24. Frost\r\n25. Noctex\r\n26. OTHER\r\n27. Alchemy England\r\n28. New Rock\r\n29. Bound UK\r\n30. Kreepsville 666      ', 'lip-service-ezgif.com-webp-to-jpg-converter.jpg', 'odjeca', 0),
(12, '2024-06-13 20:51:12', 'Victorian women\'s fashion', ' Crinolines, corsets, tourniquets and complex underwear', 'Victorian women\'s fashion was defined by complex undergarments that shaped desired silhouettes. In the early Victorian era (1837-1849), wide bell-shaped skirts and deep necklines were supported by long corsets and heavy petticoats. These corsets, reinforced with materials like whalebone, often had hidden straps beneath low necklines.\r\n\r\nIn the 1850s and 1860s, innovations like the cage crinoline allowed skirts to become even wider without the weight of multiple petticoats. This steel-hooped structure was crucial for the era\'s voluminous skirts, offering a lighter and more flexible alternative despite fire risks. Corsets evolved with front fastenings for easier dressing and steam-molding techniques for a better fit.\r\n\r\nThe 1870s and 1880s saw a shift to bustles, which dramatically projected skirts backward, requiring supports like \"waterfall\" bustles for decorative, draped skirts. Bustles were more restrictive than crinolines, limiting movement and making sitting difficult. By the end of the Victorian era (1890-1901), simpler A-line skirts and small pads replaced bustles, reflecting a trend towards more practical and comfortable women\'s fashion.\r\n\r\nSimultaneously, corsets became more varied with options like ribbon corsets and Aertex materials promoting health and flexibility, influenced by the dress reform movement. This period marked a significant shift as some women began to abandon rigid corsets, paving the way for less structured underwear in the 20th century.', 'image-asset.jpeg', 'odjeca', 0),
(13, '2024-06-13 20:59:59', 'How to Be A Gothic Lolita', 'Gothic Lolita fashion blends dark colors, bell-shaped dresses, detailed blouses, and embellished footwear for a cute yet edgy look.', 'Gothic Lolita blends cute and dark aesthetics, originating from Japan. This guide helps you achieve the perfect Gothic Lolita look.\r\n\r\nFavor dark colors like black, deep reds, purples, and blues. Use white and cream as accents.\r\n\r\nStart with petticoats and tights. Wear bell-shaped dresses, petticoats, and bloomers. Corsets can enhance the silhouette.\r\n\r\nChoose tailored blouses with pintucks and embellishments. Skirts should be knee-length with bustles or ruffles. Coordinate jumper skirts with blouses.\r\n\r\nOpt for opaque stockings or thigh-high socks in dark colors. Wear black boots, mary janes, or strappy shoes with embellishments.\r\n\r\nUse silver jewelry, tiny top hats, headbands, and parasols. Alice bows add to the aesthetic.\r\n\r\nGothic Lolita makeup ranges from natural with smoky eyes to dramatic styles.\r\n\r\nEmbrace these elements to create a stunning Gothic Lolita ensemble.', 'gothic_lolita.jpg', 'odjeca', 0),
(14, '2024-06-13 21:05:06', 'How to Style Vintage Pieces ', 'Emphasize vintage pieces paired with timeless staples like blouses and denim. Use neutrals to accentuate standout items such as blazers and bags.', 'Scoring the perfect vintage piece is thrilling, but styling it with your existing wardrobe can be tricky. Make your vintage item the focal point and build your outfit around it. Invest in timeless staples like a white blouse, straight-leg denim, and a brown belt. Pair vintage dresses with raffia accessories for a market-found look. Iconic items like a YSL blazer and Dior Lady Bag elevate any outfit. A flowy white dress with 70s sunglasses adds a bohemian touch. Use coordinating accessories for standout party pieces, letting them shine alongside finds like Dior pants and a Chanel jacket.', 'vintage-1595623922.jpg', 'odjeca', 0),
(15, '2024-06-13 21:11:24', 'The Resurgence of Vinyl', ' Discover why vinyl records are making a comeback, as collectors seek a richer, more authentic music experience and embrace the nostalgia of physical albums.', ' In recent years, vinyl records have experienced a remarkable comeback among music enthusiasts. Collectors are drawn to the tangible quality and nostalgic appeal of vinyl, which offers a rich, authentic sound that digital formats often lack. The resurgence is fueled by a desire for a more immersive music experience and the aesthetic value of album artwork. Vinyl\'s tactile nature and the ritual of playing records have become a cherished ritual for many, contributing to its enduring popularity in an increasingly digital age. ', 'WhatsApp Image 2024-06-13 at 21.11.05.jpeg', 'glazba', 0),
(16, '2024-06-13 21:18:19', 'Metal Subgenres Demystified', '  Explore metal subgenres, from aggressive thrash to heavy, doom-laden soundscapes, delving into their unique characteristics and cultural impact.', '   Metal music boasts a diverse landscape of subgenres, each with its own distinctive sound and characteristics. Thrash metal, known for its aggressive tempo and heavy guitar riffs, emerged in the 1980s with bands like Metallica leading the charge. Doom metal, on the other hand, is characterized by its slow, heavy sound and themes of despair and darkness, pioneered by bands like Black Sabbath. Other notable subgenres include death metal, known for its growling vocals and brutal rhythms, and power metal, featuring epic themes and soaring vocals. Understanding these subgenres offers insight into metal\'s evolution and the varied preferences of its passionate fanbase.   ', '18fff020e0184f6a38cb4b66476872b48e899980-ezgif.com-webp-to-jpg-converter.jpg', 'glazba', 0),
(17, '2024-06-13 21:20:24', 'Shoegaze Aesthetic', 'Shoegaze\'s music inspires fashion and art, combining dreamy aesthetics with introspective themes and nostalgic elements.', 'Shoegaze music, known for its dreamy and ethereal sounds, has deeply influenced not only the music scene but also fashion and art. Melancholic guitar sounds and layered vocals of the genre awaken introspection, which is reflected in the fashion choices of its fans. Think oversized sweaters, flowy dresses and vintage accessories that reflect the genre\'s mix of nostalgia and modernity. Art inspired by shoegaze music often explores abstract and atmospheric themes, capturing the genre\'s introspective mood through visual expression. From album covers to catwalks, the shoegaze aesthetic continues to inspire creatives around the world, fusing music, fashion and art into a wondrous cultural phenomenon.', 'a061b734-01c2-40dd-aa8b-2726651a39f8.sized-1000x1000.jpg', 'glazba', 0),
(18, '2024-06-13 21:21:43', 'Preservation of Jazz History', 'Explore how vinyl records preserve the evolution of jazz, offering a real connection to iconic artists and cultural significance through authentic sound and album art.', 'Vinyl records play a key role in preserving the history of jazz, capturing the nuances and evolution of the genre\'s iconic artists and styles. These records provide a real connection to the rich heritage of jazz, offering an authentic sound and featuring original album covers that reflect the cultural atmosphere of the period. From bebop to free jazz, vinyl records document key moments in jazz history, ensuring that future generations can appreciate and study its profound impact on music and society.', 'Louis_Armstrong_restored.jpg', 'glazba', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `prezime` varchar(255) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(255) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina_dozvole` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina_dozvole`) VALUES
(6, 'gobbach', 'mamama', 'gobbo', '$2y$10$YrzxkOtQnGo8PxmPAi7XU.4Yb1gk8svPfvStElj0h1EQbcVR6NhOa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanak`
--
ALTER TABLE `clanak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanak`
--
ALTER TABLE `clanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
