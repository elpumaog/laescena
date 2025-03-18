# LaEscena
LaEscena es un blog sobre la escena de piratería de consolas y emuladores. Lo he creado usando HTML, CSS, PHP y MySQL, como reto que forma parte de mi aprendizaje.

## Inicializar
Si quieres descargar este proyecto y probarlo tu mismo debes seguir varios pasos:

### 1. Herramientas
Lo primero que tienes que hacer es instalar un servidor local como XAMPP y un editor de código como VSCode.

### 2. Base de Datos
Debes crear una base de datos con las siguientes tablas:
```
CREATE TABLE users (
  id PRIMARY KEY INT NOT NULL,
  name VARCHAR NOT NULL,
  email VARCHAR NOT NULL,
  password VARCHAR NOT NULL
);
```


```
CREATE TABLE admin (
  id PRIMARY KEY INT NOT NULL,
  name VARCHAR NOT NULL,
  email VARCHAR NOT NULL,
  password VARCHAR NOT NULL
);
```


```
CREATE TABLE posts (
  id PRIMARY KEY INT NOT NULL,
  admin_id INT NOT NULL,
  title VARCHAR NOT NULL,
  content TEXT NOT NULL,
  tag VARCHAR NOT NULL,
  date TIMESTAMP CURRENT_TIMESTAMP,
  img_url VARCHAR NOT NULL
);
```


```
CREATE TABLE comments (
  id PRIMARY KEY INT NOT NULL,
  post_id INT NOT NULL,
  user_name VARCHAR NOT NULL,
  comment TEXT NOT NULL,
  date TIMESTAMP CURRENT_TIMESTAMP ,
);
```

### 3. config.php
Una vez creada la base de datos, debemos configurar la conexion `config/config.php`. Dentro del archivo simplemente modificamos las siguientes variables:
```
$servername = "localhost";  // Servidor local
$username = "root";  // Usuario por defecto de XAMPP
$password = "";  // Por defecto, XAMPP no tiene contraseña en el phpmyadmin
$db = "";  // El nombre de la base de datos
```

### 4. Configuracion de administrador
Para crear una cuenta de administrador, deberas crearla desde phpmyadmin en la tabla admin. Una vez creada, para acceder al panel de administrador simplemente accedemos al ```/admin/``` 
e iniciamos sesión con los datos que hemos ingresado en la tabla admin.

## Feedback
Con todo esto listo, espero que lo probéis y me deis vuestro feedback de cosas que podría mejorar, obviamente no es perfecto y probablemente tenga miles de lagunas, pero me
ha servido como práctica de mi aprendizaje.
