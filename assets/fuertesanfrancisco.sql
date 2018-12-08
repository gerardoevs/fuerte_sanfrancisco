-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2018 a las 03:06:38
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fuertesanfrancisco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fs_imagenes`
--

CREATE TABLE `fs_imagenes` (
  `id_imagenes` int(11) NOT NULL,
  `nombre_imagen` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_noticia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `fs_imagenes`
--

INSERT INTO `fs_imagenes` (`id_imagenes`, `nombre_imagen`, `id_noticia`) VALUES
(1, 'fdpt17112018flcan04.jpg_279327997.jpg', 1),
(2, '18-027a.jpg', 2),
(3, '11inicial.JPG', 3),
(4, 'realmadrid.JPG', 4),
(5, 'modic.jpg', 5),
(6, '15436998888992.jpg', 6),
(7, '15436674553273.jpg', 7),
(8, '15436906589345.jpg', 8),
(9, '15436859122030.jpg', 9),
(10, '15436674553273.jpg', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fs_noticias`
--

CREATE TABLE `fs_noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion_corta` varchar(255) COLLATE utf8_bin NOT NULL,
  `articulo` mediumtext COLLATE utf8_bin NOT NULL,
  `fechaPublicacion` datetime NOT NULL,
  `fs_estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `fs_noticias`
--

INSERT INTO `fs_noticias` (`id_noticia`, `titulo_noticia`, `descripcion_corta`, `articulo`, `fechaPublicacion`, `fs_estado`) VALUES
(1, 'Eligen reina de fiestas patronales de San Miguel ', 'Será coronada hoy en la noche en el estadio Charlaix, junto a la virreina de los migueleños.', '<p style=\"outline: none; margin-right: 0px; margin-left: 0px; font-family: \"Fira Sans\", sans-serif; margin-bottom: 25px !important; font-size: 18px !important; line-height: 32px !important;\">Una visita al Asilo San Antonio, en la ciudad de San Miguel, fue el último evento público de las candidatas a reina del 60.º gran carnaval, pues hoy se realiza el evento de elección y coronación de la nueva soberana migueleña, en un evento especial que se llevará a cabo en el estadio Miguel Félix Charlaix, a partir de las 7 de la noche.</p><p style=\"outline: none; margin-right: 0px; margin-left: 0px; font-family: \"Fira Sans\", sans-serif; margin-bottom: 25px !important; font-size: 18px !important; line-height: 32px !important;\">Francisco Cortés, preparador del concurso de reina del carnaval de San Miguel, explicó ayer que para la gala de la elección, se tiene preparado un espectáculo, en el cual se hará un homenaje especial por los 60 años de fundación de la fiesta más famosa del país.</p><p style=\"outline: none; margin-right: 0px; margin-left: 0px; font-family: \"Fira Sans\", sans-serif; margin-bottom: 25px !important; font-size: 18px !important; line-height: 32px !important;\">Cortés agregó que al igual que en años anteriores, se elegirá a la reina del 60.º carnaval y a la virreina, ambas chicas obtendrán premios y además tendrán la oportunidad de representar al país en concursos de belleza internacionales.</p><p style=\"outline: none; margin-right: 0px; margin-left: 0px; font-family: \"Fira Sans\", sans-serif; margin-bottom: 25px !important; font-size: 18px !important; line-height: 32px !important;\">Para ellas y los ancianos del Asilo San Antonio, ayer la mañana estuvo llena de música y diversión, pues las señoritas llegaron temprano a visitar a los adultos mayores y compartieron con ellos un desayuno.</p><p style=\"outline: none; margin-right: 0px; margin-left: 0px; font-family: \"Fira Sans\", sans-serif; margin-bottom: 25px !important; font-size: 18px !important; line-height: 32px !important;\">Posteriormente hubo varios puntos musicales y se realizó la entrega de un donativo de parte del Comité de Fiestas Patronales. La ayuda servirá para paliar algunas de las necesidades que enfrenta este hogar de ancianos, donde hay 70 internos.</p><p style=\"outline: none; margin-right: 0px; margin-left: 0px; font-family: \"Fira Sans\", sans-serif; margin-bottom: 25px !important; font-size: 18px !important; line-height: 32px !important;\">Una de las ancianas que más disfrutaron la visita de las candidatas fue Rubenia Medina, de 85 años, quien acompañó el baile de las candidatas con palmas y sonrisas. También coreó canciones que interpretó un mariachi.</p><p style=\"outline: none; margin-right: 0px; margin-left: 0px; font-family: \"Fira Sans\", sans-serif; margin-bottom: 25px !important; font-size: 18px !important; line-height: 32px !important;\"><br></p>', '2018-11-29 03:09:36', 1),
(2, 'Eligen reina de fiestas patronales de San Miguel ', 'asdasdasdasda', '<p>asdadaasd</p>', '2018-11-29 03:20:36', 1),
(3, 'Once inicial del Castilla frente al Salmantino', 'El Real Madrid Castilla ya tiene once inicial para el partido de la 13ª jornada de Liga, que disputará esta tarde en el Helmántico ante el Salamantino (17:00 horas; Realmadrid TV).', '<p><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\"><span style=\"font-weight: bolder;\"><span style=\"font-weight: bolder;\">Once</span>&nbsp;<span style=\"font-weight: bolder;\">inicial</span>&nbsp;<span style=\"font-weight: bolder;\">del</span>&nbsp;<span style=\"font-weight: bolder;\">Castilla</span></span></span></p><p><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\">1. Luca;<br style=\"margin: 0px; padding: 0px;\">2. López;<br style=\"margin: 0px; padding: 0px;\">3. Fran García;<br style=\"margin: 0px; padding: 0px;\">4. De la Fuente;<br style=\"margin: 0px; padding: 0px;\">5. Manu Hernando;<br style=\"margin: 0px; padding: 0px;\">6. Jaume;<br style=\"margin: 0px; padding: 0px;\">7. De Frutos;<br style=\"margin: 0px; padding: 0px;\">8. Fidalgo;<br style=\"margin: 0px; padding: 0px;\">9. Cristo;<br style=\"margin: 0px; padding: 0px;\">10. Seoane;<br style=\"margin: 0px; padding: 0px;\">11. Feuillassier.</span></p>', '2018-11-29 03:55:39', 1),
(4, 'Programación Realmadrid TV: hoy, una nueva entrega de ‘Historia que tú hiciste’', 'El canal emitirá a las 12:15 horas la conquista de la cuarta Supercopa de Europa ante el Manchester United.', '<p><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\">Realmadrid TV</span><span style=\"color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\">&nbsp;ofrecerá hoy lunes una nueva entrega de&nbsp;</span><em style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\">Historia que tú hiciste</em><span style=\"color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\">, el espacio que evoca partidos históricos del club. A las 12:15 h, ofrecerá la cuarta&nbsp;</span><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\">Supercopa de Europa&nbsp;</span><span style=\"color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\">conquista por el</span><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\">&nbsp;Real Madrid</span><span style=\"color: rgb(102, 102, 102); font-family: Emojis, Arial, Helvetica, sans-serif; font-size: 14px;\">, en un partido que tuvo lugar el 8 de agosto de 2017 y en el que los blancos derrotaron al Manchester United en el estadio Nacional Filipo II de Skopie (Macedonia).</span><br></p>', '2018-11-29 04:00:03', 1),
(5, 'Modric posible ganador del balon de oro', 'asdad', '<p><span style=\"font-size: 36px;\">A</span>demas de no se que&nbsp; y bla bla bla...&nbsp;</p>', '2018-12-01 07:38:17', 1),
(6, 'Uno a uno del Real Madrid: Llorente, Reguilón, Valverde... ¡cómo están los niños de Solari!', 'Victoria importante del Real Madrid en el estadio Santiago Bernabéu.', '<p><span class=\"capital-letter\" style=\"margin: 0px 5px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 58px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: robotoBold, Arial, helvetica; float: left; line-height: 49.3px; color: rgb(34, 34, 34);\">V</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">ictoria importante del Real Madrid en el estadio Santiago Bernabéu ante un Valencia que fue de menos a más. Participa y valora&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: PTbold, Georgia; color: rgb(34, 34, 34);\">la actuación de los jugadores del equipo de Solari</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">. Verde si te ha gustado su partido, rojo si no.</span><br></p>', '2018-12-01 07:23:54', 1),
(7, 'La increíble premonición de un hincha de River sobre la final', 'La Copa Libertadores no deja de sorprender.', '<p><span class=\"capital-letter\" style=\"margin: 0px 5px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 58px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: robotoBold, Arial, helvetica; float: left; line-height: 49.3px; color: rgb(34, 34, 34);\">L</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">a final de la&nbsp;</span><a href=\"http://ar.marca.com/claro/futbol/copa-libertadores.html?intcmp=MENUMIGA&amp;s_kw=copa-libertadores\" target=\"_blank\" style=\"margin: 0px; padding: 0px; font-size: 18px; vertical-align: baseline; background: rgb(255, 255, 255); color: rgb(0, 114, 216); font-family: PTregular, Georgia;\">Copa Libertadores</a><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;no deja de sorprender. Ahora&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: PTbold, Georgia; color: rgb(34, 34, 34);\">se ha hecho viral el tuit</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;que un&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: PTbold, Georgia; color: rgb(34, 34, 34);\">hincha de River</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;escribió el 3 de noviembre&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: PTbold, Georgia; color: rgb(34, 34, 34);\">pronosticando que la final se jugaba en el Santiago Bernabéu&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">y que&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: PTbold, Georgia; color: rgb(34, 34, 34);\">el conjunto Millonario ganaba a Boca</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;con un gol de&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: PTbold, Georgia; color: rgb(34, 34, 34);\">Pity Martínez.</span></p><p><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: PTbold, Georgia; color: rgb(34, 34, 34);\"><br></span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">Según relató en su cuenta de Twitter,&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-size: 18px; background: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: PTbold, Georgia;\">Tobías soñó que Gonzalo Martínez hacía un gol para el Millonario en alguno de los dos partidos frente al conjunto xeneize,</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">con la particularidad de que el mismo no ocurría ni en</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-size: 18px; background: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: PTbold, Georgia;\">La Bombonera</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">ni en</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-size: 18px; background: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: PTbold, Georgia;\">El Monumental</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">, sino que fue en el</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;</span><span style=\"color: rgb(34, 34, 34); font-size: 18px; background: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: PTbold, Georgia;\">Santiago Bernabéu.</span></p><p><span style=\"color: rgb(34, 34, 34); font-size: 18px; background: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: PTbold, Georgia;\"><br></span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">Aunque no deja de ser un sueño, el joven de la ciudad de Río Cuarto, en Córdoba, ha acertado con la cancha. El partido se va a disputar</span><span style=\"color: rgb(34, 34, 34); font-family: PTregular, Georgia; font-size: 18px;\">&nbsp;</span><a href=\"http://ar.marca.com/claro/futbol/copa-libertadores/final/2018/11/29/5c001f23468aeb63028b45ff.html\" target=\"_blank\" style=\"font-family: PTregular, Georgia; font-size: 18px; background: rgb(255, 255, 255); margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 114, 216);\">el domingo 9 de diciembre a las 16.30 horas en el estadio del Real Madrid.</a><span style=\"color: rgb(34, 34, 34); font-size: 18px; background: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: PTbold, Georgia;\">&nbsp;¿Se cumplirá toda la premonición de Tobías?</span></p><p><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: PTbold, Georgia; color: rgb(34, 34, 34);\"></span><br></p>', '2018-12-01 07:32:45', 1),
(8, 'Cristiano llega a la decena de goles en una nueva victoria de la Juventus', 'La Juventus sumó su quinta victoria consecutiva al ganar 0-3 a la Fiorentina en Florencia.', '<p><font color=\"#222222\" face=\"PTbold, Georgia\"><span style=\"font-size: 18px;\">La Juventus sumó su quinta victoria consecutiva al ganar 0-3 a la Fiorentina en Florencia. Los tantos fueron obra de Bentancur, Chiellini y de Cristiano Ronaldo de penalti. El portugués llegó a los 10 tantos ligueros en 14 partidos, algo que no se veía en la Vecchia Signora desde que lo hiciera John Charles en la 1957-58.Fue valiente la Fiorentina, pero esta Juve va a un ritmo superior al resto de sus rivales. Es tan superior que en un partido donde Szczesny tuvo que actuar en varias ocasiones acabó con la portería a cero y goleando a su rival.</span></font></p><p><br></p><hr id=\"null\"><p><br></p><p><img src=\"http://localhost/fuerte.sf//imgUploads/portadas/15436906589345.jpg\" alt=\"\" style=\"display: block; margin-left: auto; margin-right: auto;\"></p><p><br></p><p><font color=\"#222222\" face=\"PTbold, Georgia\"></font></p><hr id=\"null\"><blockquote><font color=\"#222222\" face=\"PTbold, Georgia\"><em>Con esta victoria, los de Allegri aventajan en 11 puntos al Nápoles, segundo, y 12 al Inter, tercero. Ambos conjuntos juegan mañana y están obligados a ganar si quieren seguir en la pelea por una Serie A que, eso sí, no parece que vaya a tener un campeón sorpresa.</em></font></blockquote>', '2018-12-01 11:37:01', 1),
(9, 'Otro milagro de Chicharito en Europa que no cambiará nada', 'El mexicano responde a la confianza de Pellegrini con un doblete con el West Ham', '<p><span class=\"capital-letter\" style=\"margin: 0px 5px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 58px; vertical-align: baseline; background: transparent; font-family: robotoBold, Arial, helvetica; float: left; line-height: 49.3px;\">N</span><span style=\"font-family: Georgia, serif;\">o debería de considerarse un milagro que&nbsp;Chicharito&nbsp;marque goles. El mexicano lo ha hecho toda su vida. Lo que sí es un suceso extraordinario es que el delantero siempre reaparezca cuando menos se le espera. Eso es lo sorprendente. Una envidiable paciencia para esperar su momento y una enorme capacidad de trabajo.&nbsp;Las claves de su éxito.</span></p><p><span style=\"font-family: Georgia, serif;\">Chicharito volvió a ser titular contra el Newcastle, la tercera vez que iniciaba de las 14 jornadas disputadas en la Premier. El mexicano lleva tiempo trabajando para volver al cien por cien después de un virus que le dejó K.O. durante algunas semanas. El atacante fue&nbsp;<a href=\"https://www.marca.com/claro-mx/futbol/mexicanos-mundo/2018/12/01/5c02b95346163f07628b4584.html\" target=\"_blank\" style=\"margin: 0px; padding: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(0, 114, 216);\">decisivo con un doblete</a>&nbsp;-el último había sido el 19 de agosto de 2017-. Hizo el 0-1 y el 0-2 en St. James\' Park en una victoria que sirve para sacar al West Ham del atolladero.</span></p><p><br></p><p><iframe width=\"400\" height=\"345\" src=\"//www.youtube.com/embed/dJmETqJ2zPs\" frameborder=\"0\" allowfullscreen=\"\"></iframe></p><p><span style=\"font-family: Georgia, serif;\">A estas alturas nadie debería dudar de Javier Hernández.&nbsp;71&nbsp;goles en Inglaterra (entre Manchester United y West Ham),&nbsp;48&nbsp;goles en Premier,&nbsp;119&nbsp;goles en Europa... Y&nbsp;50&nbsp;con la selección mexicana para ser el máximo goleador histórico. ¿Quién podría osar a criticarle? Pues unos cuantos mexicanos, por ejemplo. </span></p><blockquote><span style=\"font-family: Georgia, serif;\">Chicharito nunca alcanzará en su país una corriente favorable de admiración y elogios a su impresionante trayectoria.&nbsp;Su enésima demostración en Europa no cambiará nada.</span></blockquote><p><span style=\"font-family: Georgia, serif;\">Hace unos días reconocía en una&nbsp;<a href=\"https://www.marca.com/claro-mx/futbol/mexicanos-mundo/2018/11/29/5bfec486e2704e255f8b45ac.html\" target=\"_blank\" style=\"margin: 0px; padding: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(0, 114, 216);\">entrevista en exclusiva con MARCA Claro</a>&nbsp;que no cerraba las puertas a una salida del&nbsp;West Ham. Una nueva prueba de su ambición y de una lucha constante por ganarse un lugar para seguir marcando goles sea donde sea. Porque eso es lo que siempre ha sabido hacer el mexicano. Y lo ha hecho en Europa.&nbsp;En las mejores Ligas y en los mejores equipos. Eso sí es un milagro, porque a día de hoy parece difícil ver a muchos futbolistas mexicanos alcanzar los éxitos de Chicharito.</span></p>', '2018-12-01 11:42:46', 1),
(10, 'Gol de Lucas Vázquez (2-0) en el Real Madrid 2-0 Valencia', 'Espectacular cabalgada de Carvajal por banda derecha, su centro lo recoge Benzema, que detiene el tiempo en el área, encuentra a Lucas y remata a la red.', '<p><br></p><p><span style=\"font-size: 96px;\">L</span>kdnalkdnalksnd</p><p><span style=\"font-size: 96px;\"><img src=\"https://scontent.fsal1-1.fna.fbcdn.net/v/t1.0-9/46772840_529946410805873_3925587107677995008_n.jpg?_nc_cat=110&amp;_nc_ht=scontent.fsal1-1.fna&amp;oh=6f1b2f0a5671b4e7d942b381b676c0be&amp;oe=5C6A5392\" alt=\"\" style=\"vertical-align: middle; display: block; margin-left: auto; margin-right: auto;\"></span></p><p><iframe src=\"https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2F307073983093118%2Fphotos%2Fa.308010202999496%2F529946390805875%2F%3Ftype%3D3&amp;width=500\" width=\"1172px\" height=\"332px\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\" allow=\"encrypted-media\"></iframe></p><p><br></p><p><iframe src=\"https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F307073983093118%2Fvideos%2F524805758022675%2F&amp;show_text=0&amp;width=560\" width=\"1175px\" height=\"659px\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\"></iframe></p><p><br></p><p><br></p><p><span style=\"background-color: rgb(204, 204, 204);\">noticias</span></p>', '2018-12-02 12:05:27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fs_portadas`
--

CREATE TABLE `fs_portadas` (
  `id` int(11) NOT NULL,
  `id_noticia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `fs_portadas`
--

INSERT INTO `fs_portadas` (`id`, `id_noticia`) VALUES
(7, 6),
(8, 7),
(9, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fs_usuarios`
--

CREATE TABLE `fs_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(512) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `fs_usuarios`
--

INSERT INTO `fs_usuarios` (`id`, `usuario`, `password`, `tipo`) VALUES
(1, 'admin', 'd1c889cc95b2477fdfe6bc155335563191ce232979e78555b56eeb446a1339a70f39ff43a0b328f03e757d00b045baec23b62de26e509e74bb894bcb7e92e3ffKU7FnnF5LY+u858jqYXvO8CY+TY4eIm5pzLmDZPx6JM=', 'ADMIN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fs_imagenes`
--
ALTER TABLE `fs_imagenes`
  ADD PRIMARY KEY (`id_imagenes`);

--
-- Indices de la tabla `fs_noticias`
--
ALTER TABLE `fs_noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `fs_portadas`
--
ALTER TABLE `fs_portadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fs_usuarios`
--
ALTER TABLE `fs_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fs_imagenes`
--
ALTER TABLE `fs_imagenes`
  MODIFY `id_imagenes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `fs_noticias`
--
ALTER TABLE `fs_noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `fs_portadas`
--
ALTER TABLE `fs_portadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `fs_usuarios`
--
ALTER TABLE `fs_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
