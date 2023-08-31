CREATE TABLE `contratosd` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `proveedor` varchar(150) DEFAULT NULL,
  `cuenta` int(30) DEFAULT NULL,
  `regimen` varchar(100) DEFAULT NULL,
  `inicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE VIEW `vista_pedidos` AS select `pedidos`.`id` AS `id`,`pedidos`.`nopedido` AS `nopedido`,`pedidos`.`tipo` AS `tipo`,`pedidos`.`clave` AS `clave`,`pedidos`.`cantidad` AS `cantidad`,`pedidos`.`eta` AS `eta`,`pedidos`.`monto` AS `monto`,`pedidos`.`noalta` AS `noalta`,`pedidos`.`monto2` AS `monto2` from `pedidos`;