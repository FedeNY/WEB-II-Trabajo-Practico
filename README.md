<h1>  # WEB-II-Trabajo-Practico - Tienda de Celulares 📱 </h1>

<br>

<h2>Integrantes</h2>

Numero de grupo : 160

Federico Gerardo Massolo  

DNI : 41675964

<h2> Importante </h2>
 
mi compañero me informo que dejo la cursada


Javier Ignacion Rivarola  

DNI : 37667283

<h2>Introduccion</h2>

Este proyecto es una base de datos para un e-commerce de venta de celulares. Las funcionalidades más destacables son:
     <ul>
        <li><strong>Base de datos de productos</strong>: Almacena y gestiona información detallada sobre los celulares, incluyendo características como marca, modelo, precio, etc.</li>
        <hr>
        <li><strong>Registro y login</strong>: Permite a los usuarios crear cuentas y acceder a las mismas (los usuarios registrados podrán realizar compras más adelante).</li>
        <hr>
        <li><strong>Carrito y compras</strong>: Facilita la selección de productos y el proceso de compra, registrando los pedidos en la base de datos. (Falta implementar, por ahora no se pidió en el proyecto).</li>
    </ul>

 <h2>Diagrama de la base de datos</h2>

![image](https://github.com/user-attachments/assets/0dca1b5f-9523-4208-a08f-65812b9ef3f8)

<h2>Datos a tener en cuenta</h2>

<ul> 
 <li><strong>Herramientas de Administrador</strong>: Las herramientas se encuentran en la página Administrador, que solo se muestra una vez que el usuario ha iniciado sesión.</li> 
 <hr>
 <li><strong>Session Start</strong>: Diferente a lo que nos impartieron en la clase, la sesión se inicia por primera vez cuando el usuario entra a la página, creando un rol que es el de "invitado". Tuve que realizarlo así para que no hubiera conflictos en el componente nav por falta de datos de sesión.</li> 
 <hr>
 <li><strong>Componente nav</strong>: El nav fue puesto fuera del switch, ya que estará presente en la mayoría de las páginas, excepto en login y register, ya que esas páginas tienen redirecciones propias.</li> 
 <hr>
 <li><strong>Función de compra</strong>: Por ahora, esa función todavía no está vigente, aunque la tabla y relación están creadas, como se puede apreciar en el diagrama. No es requerida, por lo que tengo entendido, para esta etapa del proyecto. Aun así, si un usuario intenta comprar y no está logueado, será redireccionado a la página de login para registrarse o iniciar sesión si lo requiere.</li> 
 <hr>
 <li><strong>Register </strong>: El registro es funcional; si bien no tiene un mensaje de error, cumple la función de comparar y confirmar la contraseña para luego ser encriptada. Si se intenta registrarse con un email o nombre de usuario ya registrado, lanzará un error y no podrá registrarse, ya que son datos únicos.</li> 
</ul>
