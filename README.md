<h1>  # WEB-II-Trabajo-Practico - Tienda de Celulares 📱 </h1>

<br>

<h2>Integrantes</h2>

Numero de grupo : 160

Federico Gerardo Massolo  

<h2> Importante </h2>
 
mi compañero me informo que dejo la cursada

DNI : 41675964

Javier Ignacion Rivarola  

DNI : 37667283

<h2>Introduccion</h2>

Este proyecto es una base de datos para un e-commerce de venta de celulares. Las funcionalidades más destacables son:
<ul>
<li>Base de datos de productos: Almacena y gestiona información detallada sobre los celulares, incluyendo características como marca, modelo, precio, etc.</li>

<li>Registro y login: Permite a los usuarios crear cuentas y acceder a las mismas (los usuarios registrados podran realizar compras mas adelante).</li>

<li>Carrito y compras: Facilita la selección de productos y el proceso de compra, registrando los pedidos en la base de datos.(Falta Implementar, por ahora no se pidio en el proyecto)</li>

 <h2>Diagrama de la base de datos y el flujo de la pagina</h2>

![image](https://github.com/user-attachments/assets/0dca1b5f-9523-4208-a08f-65812b9ef3f8)

<h2>Datos a tener en cuenta</h2>

<ul> 
 <li>**Herramientas de Administrador**: Las herramientas se encuentran en la página Administrador, que solo se muestra una vez que el usuario ha iniciado sesión.</li> 
 
 <li>**Session Start**: Diferente a lo que nos impartieron en la clase, la sesión se inicia por primera vez cuando el usuario entra a la página, creando un rol que es el de "invitado". Tuve que realizarlo así para que no hubiera conflictos en el componente nav por falta de datos de sesión.</li> 
 
 <li>**Componente nav**: El nav fue puesto fuera del switch, ya que estará presente en la mayoría de las páginas, excepto en login y register, ya que esas páginas tienen redirecciones propias.</li> <li>**Función de compra**: Por ahora, esa función todavía no está vigente, aunque la tabla y relación están creadas, como se puede apreciar en el diagrama. No es requerida, por lo que tengo entendido, para esta etapa del proyecto. Aun así, si un usuario intenta comprar y no está logueado, será redireccionado a la página de login para registrarse o iniciar sesión si lo requiere.</li> 
 
 <li>**Register**: El registro es funcional; si bien no tiene un mensaje de error, cumple la función de comparar y confirmar la contraseña para luego ser encriptada. Si se intenta registrarse con un email o nombre de usuario ya registrado, lanzará un error y no podrá registrarse, ya que son datos únicos.</li> 
</ul>
