# WEB-II-Trabajo-Práctico - Tienda de Celulares #Reentrega 📱

## Integrantes

**Número de grupo**: 160

**Federico Gerardo Massolo**  
**DNI**: 41675964

## Importante

Lamentablemente no pude implementar todos los puntos obligatorios de la reentrega. Intenté implementar los middleware de todas las formas posibles, pero me fue imposible. Si llega a ser un motivo para desaprobar la reentrega, lo entiendo y agradecería si aún así se llegara a ver mi proyecto para recibir un feedback.

## Diagrama de la base de datos

![image](https://github.com/user-attachments/assets/49ac147e-033f-4aac-89dc-04d2571929d6)

## Datos a tener en cuenta

- **MVC**: El MVC fue refactorizado para definir claramente los roles de cada modelo y controlador de cada tabla, así como las vistas fueron agrupadas según qué controlador estén usando. Ejemplo: vista de home en `product_view`.
  
- **Tabla de rutas más clara**: Fue implementada una tabla que contiene los endpoints, controlador, método y una breve descripción de cada una de las rutas separadas por su modelo para mayor claridad.
  
- **Control de errores**: Fue implementada una vista que ocurre cuando se produce un error en alguna solicitud, mostrando un breve texto sobre el error y su status.
  
- **Nueva relación de producto con la tabla categoría**: Ahora la marca de producto va a estar asociada a un valor en una tabla de categoría.

