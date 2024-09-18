# WEB-II-Trabajo-Practico

<h2>Introduccion</h2>

Este proyecto es una base de datos para un e-commerce de venta de celulares. Las funcionalidades más destacables son:

Base de datos de productos: Almacena y gestiona información detallada sobre los celulares, incluyendo características como marca, modelo, precio, etc.

Registro y login: Permite a los usuarios crear cuentas y acceder a funciones personalizadas.

Carrito y compras: Facilita la selección de productos y el proceso de compra, registrando los pedidos en la base de datos.

Historial de compra: Los usuarios pueden consultar su historial de pedidos, incluyendo detalles de cada transacción.

 <h2>Diagrama de la base de datos y el flujo de la pagina</h2>


<img src="https://github.com/user-attachments/assets/178b5323-8527-440d-af13-ee85a5ac16c9" alt="Diagrama de Base de Datos" width="800"/>


<h3>1. Obtención de productos y Login o Registro</h3> Al iniciar la página web, el usuario obtiene los productos de la base de datos y tiene la posibilidad de registrarse o iniciar sesión, dependiendo de si posee una cuenta o no.

<h3>2. Cargar al carrito</h3> Mientras explora, puede obtener (solo si está registrado) los productos que desea comprar en un "carrito".
Desde ahí, puede controlar cuánto es el total y la cantidad de un mismo producto que lleva.

Al finalizar su compra, el carrito se vacía y se envía su solicitud a la base de datos (todavía no sabemos bien si el carrito se guardará por cualquier inconveniente del usuario en el local storage).

<h3>3. Orden de pedido</h3> Al realizarse la compra, se envía información de los productos a la tabla "Orden de pedidos", que relaciona el pedido con el "ID de usuario" de la tabla "Usuario" para obtener los datos necesarios para completar la operación, así como también la fecha y el total a pagar del "carrito".

<h3>4. Detalles del pedido / Historial de compras</h3> En paralelo a la "Orden del pedido", desde la compra se envía cada producto individualmente, marcando la cantidad del mismo y su precio individual.
Se relaciona con la tabla "Productos" con el "ID del producto" comprado para obtener los datos para realizar la "Orden del pedido".

No se relaciona el precio en la base de datos del producto para que, en caso de que el precio sea actualizado, no afecte a las compras anteriores.

Se relaciona con el "ID de pedido" para poder agrupar los productos comprados bajo ese ID, accediendo desde la tabla "Orden del pedido" al usuario que realizó la compra.
