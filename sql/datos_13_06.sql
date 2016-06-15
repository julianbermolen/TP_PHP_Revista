use sistema;

insert into rol
values(null,'lector'),
(null,'contenidista');


insert into usuario
values(null,'ncardozo19@gmail.com','nico','1234',1);

insert into estado
values(1,'activo'),
(0,'inactivo');

insert into publicacion
values(1,'Publicaci&oacute;n 1','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 1'),
(2,'Publicaci&oacute;n 2','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 2'),
(3,'Publicaci&oacute;n 3','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 3'),
(4,'Publicaci&oacute;n 4','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 4'),
(5,'Publicaci&oacute;n 5','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 5'),
(6,'Publicaci&oacute;n 6','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 6'),
(7,'Publicaci&oacute;n 7','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 7'),
(8,'Publicaci&oacute;n 8','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 8'),
(9,'Publicaci&oacute;n 9','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 9'),
(10,'Publicaci&oacute;n 10','R','imagenes/portada_rolling_stone.jpg','Esta es la descrici&oacute;n de la publicaci&oacute;n 10');



insert into seccion
values(null,2,'sección 2A'),
(null,2,'sección 2B'),
(null,1,'sección 1A'),
(null,1,'sección 1B'),
(null,3,'sección 3A'),
(null,4,'sección 4A'),
(null,5,'sección 5A'),
(null,6,'sección 6A'),
(null,7,'sección 7A'),
(null,7,'sección 7B'),
(null,8,'sección 8A'),
(null,9,'sección 9A'),
(null,10,'sección 10A'),
(null,10,'sección 10B'),
(null,10,'sección 10C');


insert into articulo
values(null,'nuevas motos','motos todo terreno','esto es un texto de prueba',1,'pb=!1m14!1m8!1m3!1d13124.463111942572!2d-58.5372425!3d-34.6770273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x120f9d4493ecddd6!2sRoque+Simone+3965%2C+Tablada%2C+Buenos+Aires%2C+Argentina!5e0!3m2!1ses!2sar!4v1463873320951" width="600" height="450" frameborder="0" style="border:0'),
(null,'La zorra de la semana','como cada semana les traemos la zorra de la semana','texto de prueba pajero',2,'pb=!1m14!1m8!1m3!1d13124.463111942572!2d-58.5372425!3d-34.6770273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x120f9d4493ecddd6!2sRoque+Simone+3965%2C+Tablada%2C+Buenos+Aires%2C+Argentina!5e0!3m2!1ses!2sar!4v1463873320951" width="600" height="450" frameborder="0" style="border:0');

select *
from articulo;