use fidrive;

CREATE TABLE `usuariorol`(
  `idusuario` int(11) NOT NULL,
  `idrol` int(11) NOT NULL
  
) ENGINE= InnoDB DEFAULT CHARSET=latin1;

create table `rol`(
`idrol` int (11) NOT NULL,
`rodescripcion` varchar(50) NOT NULL
) ENGINE= InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `usuariorol`
ADD CONSTRAINT PK_Person PRIMARY KEY (`idusuario`,`idrol`);

ALTER TABLE `rol`
ADD PRIMARY KEY (`idrol`);

ALTER TABLE `usuariorol`
ADD CONSTRAINT `usuariorol_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`);
  


