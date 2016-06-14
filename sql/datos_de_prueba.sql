use sistema;

insert into rol
values('le','lector'),
('co','contenidista');


insert into usuario
values(null,'ncardozo19@gmail.com','nico','1234','le');

insert into estado
values(1,'activo'),
(0,'inactivo');

insert into publicacion
values(1,'revista genius'),
(2,'revista Fierros');

insert into seccion
values('aut',2,'autos'),
('mot',2,'motos'),
('pts',1,'topless'),
('zrr',1,'zorras');

insert into articulo
values(null,'nuevas motos','motos todo terreno','esto es un texto de prueba','mot','pb=!1m14!1m8!1m3!1d13124.463111942572!2d-58.5372425!3d-34.6770273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x120f9d4493ecddd6!2sRoque+Simone+3965%2C+Tablada%2C+Buenos+Aires%2C+Argentina!5e0!3m2!1ses!2sar!4v1463873320951" width="600" height="450" frameborder="0" style="border:0'),
(null,'La zorra de la semana','como cada semana les traemos la zorra de la semana','texto de prueba pajero','zrr','pb=!1m14!1m8!1m3!1d13124.463111942572!2d-58.5372425!3d-34.6770273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x120f9d4493ecddd6!2sRoque+Simone+3965%2C+Tablada%2C+Buenos+Aires%2C+Argentina!5e0!3m2!1ses!2sar!4v1463873320951" width="600" height="450" frameborder="0" style="border:0');

select *
from articulo;