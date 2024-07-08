SELECT * FROM tblemp JOIN tblfichas ON tblfichas.codigos100 = tblemp.s100 where s100='14449261';
SELECT dni,nombre,paterno,materno,s100,fsu,fechasistema,fechaentrega,estado FROM tblemp JOIN tblfichas ON tblfichas.codigos100 = tblemp.s100 where s100='14449261';
SELECT tblemp.dni,tblemp.nombre,tblemp.paterno,tblemp.materno,tblemp.s100, tblemp.fsu,tblemp.fechasistema,tblfichas.estado FROM tblemp JOIN tblfichas ON tblfichas.codigos100 = tblemp.s100 where s100 LIKE'14449261';



//* CANTIDAD TOTAL DE REGISTROS DJ100 + DJFSU */

SELECT 
    (SELECT COUNT(*) FROM tbldjs100) AS cantidad_DJS100,
    (SELECT COUNT(*) FROM tblemp) AS cantidad_DJFSU,
    (SELECT COUNT(*) FROM tbldjs100) + (SELECT COUNT(*) FROM tblemp) AS total;

SELECT COUNT(*) AS cantidad_DJS100 FROM tbldjs100;
SELECT COUNT(*) AS cantidad_DJFSU FROM tblemp;
SELECT COUNT(*) AS cantidad_bajas FROM tbleincon;