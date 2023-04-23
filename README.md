# GestProy - Sistema de Gestión de Proyectos de Investigación del INICA

GestProy es una aplicación web desarrollada en PHP para la gestión de proyectos de investigación del INICA (Instituto Nacional de Investigaciones Científicas y Aplicadas). La aplicación utiliza una base de datos MySQL para almacenar y gestionar la información de los proyectos y se basa en las plantillas Metronic que utilizan Bootstrap 3 para la interfaz de usuario.

## Requerimientos del sistema

- Servidor web (Apache o Nginx)
- PHP 7.0 o superior
- Base de datos MySQL
- Composer

## Instalación

- Descargar o clonar el repositorio en el directorio raíz del servidor web.
- Ejecutar composer install en el directorio raíz del proyecto.
- Importar el archivo database.sql en la base de datos MySQL.
- Configurar las variables de entorno en el archivo .env con las credenciales de la base de datos.

```DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=gestproy
DB_USERNAME=root
DB_PASSWORD=
```

Acceder a la aplicación a través del navegador web.

## Funcionalidades

Registro y gestión de proyectos de investigación.
Asignación de investigadores y recursos a los proyectos.
Seguimiento del avance y estado de los proyectos.
Generación de informes y estadísticas de los proyectos.

## Tecnologías utilizadas

- PHP 7.0
- MySQL
- Bootstrap 3
- Metronic

## Contribuciones

Si deseas contribuir al proyecto, por favor sigue las siguientes pautas:

Realiza un fork del proyecto.
Crea una rama con tu nueva funcionalidad o corrección.
Realiza los cambios necesarios y asegúrate de que los tests siguen pasando.
Envía una pull request con tus cambios para que sean revisados.

## Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo LICENSE para más detalles.
