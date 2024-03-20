--Todos los vuelos que salen de Manizales

 SELECT origen,destino, aerolinea 
 FROM vuelos
 WHERE origen = "manizales";

-- Todos los vuelos que llegan a bogota
 SELECT origen,destino, aerolinea
 FROM vuelos
 WHERE destino = "bogota";

 -- que aerolineas me llevan de manizales a cartagena
 SELECT aerolinea
 FROM vuelos
 WHERE origen = "manizales" AND destino = "cartagena";

--Todos los vuelos que salen de Manizales con alias de columnas
 SELECT origen as desde,destino as hasta, aerolinea as operador 
 FROM vuelos
 WHERE origen = "manizales";

 -- los vuelos que llegan a cartagena provenientes de Manizales y Medellin
SELECT origen as desde, destino as hasta, aerolinea as operador
FROM vuelos
WHERE destino = "cartagena" AND origen = "manizales"
UNION
SELECT origen as desde, destino as hasta, aerolinea as operador
FROM vuelos
WHERE destino = "cartagena" AND origen = "medellin";


