-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2019 a las 23:43:22
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
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albaran`
--

CREATE TABLE `albaran` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `albaran`
--

INSERT INTO `albaran` (`id`, `id_producto`, `cantidad`, `fecha`, `id_usuario`) VALUES
(0, 14, 0, '2019-05-22 18:21:45', 5),
(0, 8, 0, '2019-05-22 18:26:14', 5),
(0, 18, 10, '2019-05-22 21:13:18', 5),
(0, 17, 23, '2019-05-25 12:58:30', 4),
(0, 18, 25, '2019-05-25 13:04:06', 5),
(0, 26, 5, '2019-05-29 18:05:34', 5),
(0, 23, 25, '2019-06-01 09:43:00', 5),
(0, 27, 5, '2019-06-01 09:43:16', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `icono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `icono`) VALUES
(1, 'Smartphones', 'moviles.png'),
(2, 'Televisiones', 'tv.jpg'),
(3, 'Portatiles', 'lap.jpg'),
(4, 'Auriculares', 'aur.jpg'),
(5, 'Consolas', 'xbox.jpg'),
(6, 'Altavoces', 'beats.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `contenido` varchar(250) NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `contenido`, `fecha_publicacion`, `id_producto`, `id_usuario`) VALUES
(1, 'muy contento con el producto', '2019-05-12 00:00:00', 4, 1),
(2, 'WRTEWRTWERTWE', '2019-05-14 21:16:49', 0, 5),
(3, 'ertwertwertwert', '2019-05-14 21:29:51', 5, 10),
(4, 'hola', '2019-05-14 21:30:26', 5, 9),
(5, 'que giuapo', '2019-05-14 21:31:37', 9, 5),
(6, 'reocmiendo este telefono', '2019-05-14 22:51:16', 7, 4),
(12, 'sdfsadfasdfsad', '2019-05-15 18:54:21', 10, 4),
(13, 'el mejor portatil en cuanto a hardware pero el precio es desorbitado', '2019-05-18 18:17:11', 15, 5),
(14, 'Un terminal legendario, el mejor de su Ã©poca, a pesar su escasa memoria ram fue un terminal que marco un antes y un despuÃ©s en la genreracion de los smartphones.', '2019-05-25 12:48:26', 16, 5),
(15, 'Un portatil muy bueno, pero el precio es desorbitado. no lo recomiendo.', '2019-05-25 18:22:33', 11, 5),
(16, 'Un terminal muy bueno, buena calidad aunque la pantalla tiene un efecto burnin', '2019-05-31 17:16:42', 10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `foto`, `precio`, `fecha_publicacion`, `idUsuario`, `contenido`, `id_categoria`) VALUES
(10, 'samsung galaxy s9', 'descarga.jpg', 900, '2019-05-11 18:44:18', 4, '', 1),
(11, 'asus gamer', 'ASUS-ROG-GM501GS-XS74_1200x1200_19.png', 5000, '2019-05-11 18:57:51', 4, '', 3),
(15, 'ASUS ROG G703GX-E5001T', '71bKcVIaZXL._SL1500_.jpg', 3999, '2019-05-18 18:15:45', 6, '17.3\"(43,94cm) LED Retroiluminado / 144Hz / Borde Estrecho / 300nits / FHD (1920x1080/16:9)/ Antirreflejos / NTSC:72% / SRGB:100% / Adobe:75.36% / IPS\r\nNVIDIA GeForce RTX 2080 8GB GDDR6 VRAM\r\nIntel Co', 3),
(17, 'Sony KD55XF7004BAEP - Smart TV', '81c2rFfKAjL._SL1500_.jpg', 634, '2019-05-22 23:09:23', 6, 'Pantalla Full HD con una diagonal de 55\"\r\nCuenta con 4K X-Reality Pro que hacen las imÃ¡genes mÃ¡s nÃ­tidas y se perfeccionan en tiempo real\r\nAlto rango dinÃ¡mico 4K', 2),
(21, 'Auriculares Gaming PS4,Cascos ', '51IY4QmVWaL.jpg', 19, '2019-05-27 21:07:35', 6, 'ã€Auriculares Gaming de Alta Calidadã€‘Mic Stereo Bass LED Light para gaming,Las luces LED estÃ¡n diseÃ±ados evidentes en los orejeros y el micrÃ³fono, destacando la atmÃ³sfera del juego. Tiene un cable trenzado de 2,1 metros. Botones incoporados al cable para poder manejar el volumen y el encendido y apagado del micro.(USB solo soporta la luz de LED)\r\nã€Requisito del Sistemaã€‘Cascos gaming estÃ¡n compatible con Xbox One PS4 Nintendo Switch Windows 7 / 8 / 10 / PC / iPad y mÃ³viles o sistema operativo de Linux todo dispositivo con jack 3,5mm. Headset y entrada de micrÃ³fono(Auriculares agrega una lÃ­nea de conversiÃ³n).\r\nã€Comodidad con Buen DiseÃ±oã€‘Las orejeras de estÃ¡n hechas de cuero suave ,almohadillas para los oÃ­dos sÃºper suaves,que se pueden usar durante mucho tiempo. La diadema adaptable con acolchamiento suave permite que estÃ© durante horas con ellos puestos y no sentirse agobiado.', 4),
(22, 'TaoTronics Cascos Auriculares ', '51Yb0eeb8HL._SL1000_.jpg', 59, '2019-05-27 21:09:09', 6, 'MÃºsica Encendida ï¼† Mundo Apagado: La mejora en la cancelaciÃ³n activa de ruido elimina los sonidos de las calles y las conversaciones molestas para una inmersiÃ³n total en su mÃºsica.\r\nðŸ”¥ Bluetooth 5.0 Estable: Transmite mÃºsica de forma ininterrumpida mientras que el micrÃ³fono integrado cVc 6.0 garantiza una conversaciÃ³n clara y nÃ­tida libre de ruido ambiental\r\nðŸ”¥ Comodidad de Primera Clase: Una diadema ajustable de alta fidelidad, copas de oreja giratorias de 90Â° y almohadillas de proteÃ­na suave. Pliegue y guarde en el estuche para llevarlo a donde quiera\r\nðŸ”¥ HÃ­per Velocidad De Carga: Con sÃ³lo 5 minutos de carga usted obtiene 2 horas de uso; 30 horas de reproducciÃ³n con una carga completa\r\nðŸ”¥ Sonido de Alta Fidelidad ï¼† Bajos Cautivadores: Los controladores de amplia apertura de 40 mm brindan un sonido fascinante con un bajo golpeador', 4),
(23, 'Mpow H5 Auriculares Bluetooth ', '71dsgiETk8L._SL1500_.jpg', 45, '2019-05-27 21:09:53', 6, 'TECNOLOGÃA DE CANCELACIÃ“N DE RUIDO ACTIVOï¼šLo Ãºltimo en tecnologÃ­a acÃºstica en Mpow auriculares de cancelaciÃ³n activa de ruido para reducir el ruido del trÃ¡fico de la ciudad de forma efectiva, el zumbido en una cabina de aviÃ³n o el alboroto en una oficina ocupada. Su tecnologÃ­a se basa en analizar continuamente el ruido del entorno y reaccionar ante Ã©l, bloqueÃ¡ndolo mediante la creaciÃ³n de ondas inversas, anulando asÃ­ el sonido y el ruido exterior. NOTA: El ruido no se puede eliminar por completo\r\nHi-Fi SONIDOï¼šLa tecnologÃ­a Mpow cascos bluetooth diadema ANC funciona conjunto con el dispositivo de 40 mm (el dispositivo de auricular proporciona un sonido de alta calidad) y un CSR de alta calidad que ofrece una audio potente y constante, para que pueda disfrutar de una experiencia realmente inmersiva.\r\nMICRÃ“FONO INCORPORADOï¼šEstos auriculares inalÃ¡mbricos diadema puede permitirle responder a las llamadas telefÃ³nicas con sonido claro. Los botones le brindan un control ', 4),
(24, 'TD Systems K50DLH8US - Televis', '61TDN2n094L._SL1200_.jpg', 299, '2019-05-27 21:11:13', 6, 'Televisores Led 50 Pulgadas. ResoluciÃ³n 3840 x 2160 pÃ­xeles (Ultra HD 4K), HDR eficiencia energÃ©tica A, sonido Dolby Digital Plus, Smart TV.\r\nConexiones: 3x HDMI, 2x USB, 1x VGA, salida de audio digital, puerto de interfaz comÃºn CI+, salida de auriculares, entrada de componentes, entrada de vÃ­deo compuesto, puerto LAN ethernet RJ45, Wifi, Bluetooth.\r\nSintonizador digital DVB-T2 (terrestre), DVB-C (cable), apto para todos los paÃ­ses de la UniÃ³n Europea. Sintonizador de segunda generaciÃ³n.', 2),
(25, 'TD Systems K32DLM7H - Televiso', '61cR60PwQbL._SL1080_.jpg', 139, '2019-05-27 21:13:10', 6, 'ResoluciÃ³n 1366 x 768 pÃ­xeles (HD), eficiencia energÃ©tica A+, sonido Dolby Digital Plus, grabador y reproductor multimedia USB\r\n3x HDMI, 2x USB, 1x VGA, salida de audio digital, puerto de interfaz comÃºn CI+, salida de auriculares, entrada de vÃ­deo compuesto, entrada por componentes\r\nSintonizador analÃ³gico, sintonizador digital DVB-T2 (terrestre), DVB-C2 (cable), apto para todos los paÃ­ses de la UniÃ³n Europea\r\nMando a distancia con pilas incluidas', 2),
(26, 'LG 55UK6750PLD - Smart TV de 5', '81SvOGOiksL._SL1500_.jpg', 499, '2019-05-27 21:13:44', 6, 'Televisor de 139 cm (55 pulgadas), UHD 4K IPS con resoluciÃ³n de 3840x2160\r\nSmartTV WebOS 4.0 con sistema de inteligencia Artificial ThinQ con reconocimiento y control natural por voz; mando Magic Control no incluido necesario para IA\r\nGran calidad de imagen con el procesador Quad Core de 10 bits y pantalla LED 4K IPS\r\nSonido Ultra Surround con 20 W de potencia, 2.0 ch y sistema Clear Voice III\r\nConexiones: DVB-T2/C/S2, 4 HDMI, 2 USB, 1 salida Ã³ptica, entrada LAN, USB grabador', 2),
(27, 'Samsung 55NU7405 - Smart TV de', '91j1tEXpz9L._SL1500_.jpg', 599, '2019-05-27 21:14:26', 6, 'ResoluciÃ³n 4K UHD, contraste superior y colores aÃºn mÃ¡s vivosgracias a cuatro veces la resoluciÃ³n del Full HD avalada por laorganizaciÃ³n oficial Digital Europe\r\nCalidad de imagen con HDR 10+ [HLG], Mega Contrast, Dynamic Crystal Color, UHD Dimiming y Contrast Enhancer\r\nSmart TV con WiFi integrado, Universal Guide, apps en exclusiva como beIN Connect 4K, multitud de contenidos en 4K UHD y HDR con TV Plus y las mejores series con HBO EspaÃ±a\r\nOne Remote Control, un Ãºnico mando para controlar todos tus dispositivos con S Voice para interactuar con tu televisor con voz\r\nResoluciÃ³n 3840 x 2160, procesador Quad Core, USB grabador, 3HDMI, 2 USB, Ethernet (LAN) y salida Ã³ptica de audio digital y de satÃ©lite\r\nDiseÃ±o slim, espectacular desde cualquier Ã¡ngulo\r\nSmartThings convertirÃ¡ tu televisor en el centro de tu hogar, controlando todos tus dispositivos y electrodomÃ©sticos inteligentes', 2),
(28, 'Xiaomi Redmi Note 7 ', '61LiKwLWbqL._SL1016_.jpg', 182, '2019-06-02 23:25:22', 6, '16 cm (6.3\") 4 GB 64 GB Ranura hÃ­brida Dual SIM 4G Azul 4000 mAh - Smartphone (16 cm (6.3\"), 4 GB, 64 GB, 48 MP, Android 9.0, Azul)', 1),
(29, 'Xiaomi MI A2', '61mG8UT79zL._SL1000_.jpg', 147, '2019-06-02 23:26:32', 6, 'Diagonal de la pantalla: 5.99\"\r\nResoluciÃ³n de la pantalla: 2160 x 1080\r\nPantalla tÃ¡ctil: Y\r\nRam interna: 4gb\r\nCapacidad de almacenamiento interno: 64 gb', 1),
(30, 'Motorola Moto G7 ', '71C8wZg2tvL._SL1500_.jpg', 199, '2019-06-02 23:27:28', 6, 'La cÃ¡mara dual de 12MP captura imÃ¡genes en alta resoluciÃ³n\r\nLa pantalla 6.2\" Full HD+ Max Vision con marcos reducidos proporciona una visualizaciÃ³n envolvente\r\nBaterÃ­a de larga duraciÃ³n y carga ultrarrÃ¡pida TurboPower\r\nEl procesador octa-core Qualcomm Snapdragon proporciona un rendimiento rÃ¡pido\r\nCon la cÃ¡mara delantera de 8MP conseguirÃ¡s selfies Ã³ptimos\r\nEl zoom de alta resoluciÃ³n aporta nitidez y detalles a tus fotos hechas con zoom\r\nLas cinemagrafÃ­as te permiten dar vida a tus fotos', 1),
(31, 'Nintendo Switch', '51TJ3ERPBwL._SL1024_.jpg', 314, '2019-06-02 23:29:59', 5, 'Puedes descargarte gratis el juego Fortnite desde la Nintendo eShop\r\nNintendo Switch combina la potencia de una consola domÃ©stica y la movilidad de las consolas portÃ¡tiles: los jugadores podrÃ¡n continuar la partida donde quieran\r\nEn casa, la consola descansa sobre una base conectada a la televisiÃ³n, lo que permitirÃ¡ jugar con amigos y familia. Al retirar la consola de la base, se iniciarÃ¡ el modo portÃ¡til en una pantalla de alta definiciÃ³n\r\nLa posibilidad de separar los mandos Joy-Con abre mÃºltiples posibilidades de juego\r\nCompatible con tarjeta de memoria micro SD', 5),
(32, 'Nintendo Switch ', '51TJ3ERPBwL._SL1024_.jpg', 314, '2019-06-02 23:31:00', 6, 'Puedes descargarte gratis el juego Fortnite desde la Nintendo eShop\r\nNintendo Switch combina la potencia de una consola domÃ©stica y la movilidad de las consolas portÃ¡tiles: los jugadores podrÃ¡n continuar la partida donde quieran\r\nEn casa, la consola descansa sobre una base conectada a la televisiÃ³n, lo que permitirÃ¡ jugar con amigos y familia. Al retirar la consola de la base, se iniciarÃ¡ el modo portÃ¡til en una pantalla de alta definiciÃ³n\r\nLa posibilidad de separar los mandos Joy-Con abre mÃºltiples posibilidades de juego\r\nCompatible con tarjeta de memoria micro SD', 5),
(33, 'Playstation 4 (PS4)', '81kWdfvs9lL._SL1500_.jpg', 329, '2019-06-02 23:31:57', 6, 'Disco duro con capacidad de 500 GB\r\nDisfruta de colores increÃ­blemente vivos y brillantes con los asombrosos grÃ¡ficos HDR\r\nUn 30 % mÃ¡s delgada y un 16 % mÃ¡s ligera que el modelo de PS4 original\r\nIncluye dos mandos Dualshock 4 V2\r\nConsola con nuevo chasis F', 5),
(34, 'Xbox One S All Digital ', '71szzqwsGGL._SL1500_.jpg', 221, '2019-06-02 23:32:36', 6, 'Almacenamiento en la nube; tus juegos, partidas guardadas y copias de seguridad estÃ¡n seguros en la nube\r\nJuegos preinstalados; preinstala nuevos juegos digitales para que puedas jugar en el momento en que se lanzan\r\nStreaming en 4K: retransmite vÃ­deo 4K Ultra HD en Netflix, Amazon y mucho mÃ¡s\r\nIncluye: 1 mes de Xbox Live Gold, 1 mando Blanco, Forza Horizon 3 (juego digital), Minecraft (juego digital), Sea of Thieves (juego digital)\r\nDisco duro con capacidad de 1 TB', 5),
(35, 'ZoeeTree S1 ', '71znpZV+1zL._SL1500_.jpg', 13, '2019-06-02 23:34:01', 6, 'Sonido NÃ­tido de Alta Calidad: Medios y altos definidos con nuestros dos controladores acÃºsticos de precisiÃ³n que ofrecen un excelente sonido estÃ©reo y graves mejorados desde nuestro diseÃ±o patentado de radiador pasivo de bajos. Altavoz portÃ¡til con controlador dual integrado de 2 x 40mm con sonido nÃ­tido y graves fuertes sin distorsiÃ³n incluso con el volumen mÃ¡s alto\r\nVolumen MÃ¡s Alto y MÃ¡s Grave: El pequeÃ±o altavoz podrÃ­a proporcionar un 30% de volumen mÃ¡s alto y unos graves mÃ¡s ricos que otros competidores. Los potentes altavoces HD 3W + 3W nÃ­tidos con graves profundos para uso exterior e interior: Sonido envolvente, perfecto para el hogar, colegios mayores, cocina, baÃ±o, coche, fiestas; servicios de mÃºsica en streaming o radio por Internet como Pandora y Spotify\r\nTecnologÃ­a Bluetooth 4.2: Conecta por BLUETOOTH en segundos a: iPhone, iPad, iPod, Mac, Smartphones, Tablets, Windows 7,8,10. Para reproducir desde Chromebooks, TVs y dispositivos sin Bluetooth, usa el c', 6),
(36, 'Vtin Punker ', '71l3spoTUnL._SL1280_.jpg', 33, '2019-06-02 23:34:37', 6, 'Sonido estÃ©reo: dual-drivers 10w ofrece sonido claro y melodioso, gran alcance; le ofrece excelente experiencia de escuchar mÃºsica\r\nFuerte bass: altavoz bluetooth portatil le ofrece sonido bajo fuerte con rediador pasivo y dos drivers de subwoofer; tono claro, tiple bueno, bajo fuerte para todas canciones\r\nTiempo de trabajo de 30 horas: con 4400mah pila litia incorporada, se puede trabaja 25 horas en volumen de 70%; micrÃ³fono incorporado ruido-eliminado se le hace manos libre\r\nA pueba de salpicaduras & impacto: impermeable nivel de ipx5, resitente a impacto; diseÃ±ado portatÃ­l para llevarse dondequiera\r\nTransmisiÃ³n bluetooth y aux: fÃ¡cil conecta a otros dispositivos, como mp3; tablets.soporta conexiÃ³n aux-in cable de audio, incluso si no hay dispositivos bluetooth, tambiÃ©n se puede disfrutar de la mÃºsica hermosa; garantÃ­a de 24 meses y servicios professionales post-venta dentro de 24 horas', 6),
(37, 'JBL Flip 4', '61bwTIJQWXL._SL1500_.jpg', 85, '2019-06-02 23:35:16', 6, 'Conecta de forma inalÃ¡mbrica hasta dos smartphones o tabletas al altavoz para que suenen con un Ã³ptimo sonido estÃ©reo\r\nLa tecnologÃ­a jbl connect+ permite conectar entre sÃ­ de forma inalÃ¡mbrica mÃ¡s de 100 altavoces compatibles con dicha tecnologÃ­a para amplificar la experiencia auditiva\r\nFunciona con una baterÃ­a recargable de iones de litio de 3000 mah, para que disfrutes de hasta 12 horas de reproducciÃ³n continua (varÃ­a pornivel de volumen y contenido de audio)\r\nResponde llamadas desde el altavoz con tan solo tocar un botÃ³n y con una nitidez Ã³ptima, gracias al manos libres con cancelaciÃ³n de ruido y de eco\r\nDeja de preocuparte por si llueve o te salpica algÃºn lÃ­quido: flip 4 es un altavoz portÃ¡til sumergible\r\nVersiÃ³n de bluetooth: 4.2. Soporte: a2dp v1.3, avrcp v1.6, hfp v1.6, hsp v1.2', 6),
(38, 'Altavoz Bluetooth PortÃ¡til', '61CVVamPI8L._SL1100_.jpg', 30, '2019-06-02 23:35:50', 6, 'ã€Fuerte Sonido EstÃ©reoã€‘: El altavoz bluetooth inalÃ¡mbrico de 12 vatios y controlador doble trae altos cristalinos, medios nÃ­tidos y bajos ricos. Altavoces de sonido envolvente de 360 Â° perfectos para interiores y exteriores: familia, yoga, automÃ³vil, fiesta, camping, senderismo, ciclismo.\r\nã€Bajo incomparableã€‘: El innovador diseÃ±o de diafragma doble estÃ¡ diseÃ±ado para mejorar aÃºn mÃ¡s los bajos de este altavoz portÃ¡til inalÃ¡mbrico Bluetooth. Moosen se esfuerza por crear una experiencia auditiva impresionante para cada cliente.\r\nã€Ultra Convenienteã€‘: El diseÃ±o curvo hace que este altavoz bluetooth portÃ¡til sea Ãºnico. Ya sea que lo tengas en tu mano o en una mochila, te hace sentir cÃ³modo y conveniente. SerÃ­a un maravilloso regalo festivo para tus seres queridos.\r\nã€Largo Tiempo de Juegoã€‘: La tecnologÃ­a de baterÃ­a lÃ­der garantiza el uso continuo de este altavoz portÃ¡til durante hasta 12 horas. PodrÃ¡s disfrutar de tus canciones favoritas cuando lo desees ', 6),
(39, 'Apple iPhone XR (de 64GB) - Ne', '519KIlHA2wL._SL1024_.jpg', 699, '2019-06-02 23:36:51', 6, 'Resistencia al agua y al polvo IP67 (hasta 1 metro de profundidad durante un mÃ¡ximo de 30 minutos)\r\nCÃ¡mara de 12 Mpx con estabilizaciÃ³n Ã³ptica de imagen y cÃ¡mara frontal TrueDepth de 7 Mpx: modo Retrato, IluminaciÃ³n de Retratos, Control de Profundidad y HDR Inteligente\r\nFace ID para autenticarse de forma segura y usar Apple Pay\r\nChip A12 Bionic con Neural Engine de Ãºltima generaciÃ³n\r\nCarga inalÃ¡mbrica (funciona con cargadores Qi)\r\niOS 12 con Memoji, Tiempo de Uso, Atajos de Siri y FaceTime de grupo', 1),
(40, 'Apple iPhone XS (de 64GB) - Gr', '512F7mwDVyL._SL1024_.jpg', 1100, '2019-06-02 23:37:26', 6, 'Resistencia al agua y el polvo IP68 (hasta 2 metros de profundidad durante un mÃ¡ximo de 30 minutos)\r\nCÃ¡mara dual de 12 Mpx con doble estabilizaciÃ³n Ã³ptica de imagen y cÃ¡mara frontal TrueDepth de 7 Mpx: modo Retrato, IluminaciÃ³n de Retratos, Control de Profundidad y HDR Inteligente\r\nFace ID para autenticarse de forma segura y usar Apple Pay\r\nChip A12 Bionic con Neural Engine de Ãºltima generaciÃ³n\r\nCarga inalÃ¡mbrica (funciona con cargadores Qi)\r\niOS 12 con Memoji, Tiempo de Uso, Atajos de Siri y FaceTime de grupo', 1),
(41, 'Apple MacBook Pro - Ordenador ', '61GJPL1hCpL._SL1500_.jpg', 1524, '2019-06-02 23:38:27', 6, 'Procesador Intel Core i5 de doble nÃºcleo de sÃ©ptima generaciÃ³n\r\nPantalla Retina brillante\r\nGrÃ¡ficos Intel Iris Plus Graphics 640\r\nAlmacenamiento SSD ultrarrÃ¡pido\r\nDos puertos Thunderbolt 3 (USB-C)\r\nHasta 10 horas de autonomÃ­a\r\nTrackpad Force Touch', 3),
(42, 'Apple MacBook Pro - Ordenador ', '61hG5bKTiQL._SL1500_.jpg', 2500, '2019-06-02 23:39:01', 6, 'Procesador Intel Core i7 de seis nÃºcleos de octava generaciÃ³n\r\nPantalla Retina brillante con tecnologÃ­a True Tone\r\nTouch Bar y Touch ID\r\nGrÃ¡ficos Radeon Pro 555X o 560X con 4 GB de memoria de vÃ­deo\r\nAlmacenamiento SSD ultrarrÃ¡pido\r\nGrÃ¡ficos Intel UHD Graphics 630\r\nCuatro puertos Thunderbolt 3 (USB-C)', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `pago` enum('Credito','Debito','Bitcoin','Paypal') NOT NULL,
  `ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `usuario`, `contrasena`, `email`, `direccion`, `pago`, `ciudad`) VALUES
(1, 'daniel', 'lulciuc', 'razz', 'c6ed319ce99df33f3f7998f23935fcb4477d54ad', 'razvan-lulciuc@gmail.com', 'Avenida de Madrid N15 2B', 'Credito', 'Zaragoza'),
(5, 'daniel', 'lulciuc', 'daniel', '0f3fde0103dd44077c040215a2fabd09a097aecc', 'razvan-lulciuc@hotmail.es', 'Calle Santander N5 1Izq', 'Credito', 'Huesca'),
(6, 'daniel', 'lulciuc', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'daniel98@gmail.com', '', 'Credito', 'Mordor'),
(7, 'juan', 'sdfsad', 'juan', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', '', '', 'Credito', 'Bilbao');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
