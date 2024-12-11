# Base de datos de

## Tablas

### Usuarios
| Columna | Tipo | Descripción |
| --- | --- | --- |
| id | int | Identificador único |
| username | varchar(50) | Nombre de usuario |
| password | varchar(50) | Contraseña |
| rol | varchar(50) | Rol del usuario | (0 = alumno, 1 = profesor, 2 = super admin)

### Empresas
| Columna | Tipo | Descripción |
| --- | --- | --- |
| id | int | Identificador único |
| nombre | varchar(50) | Nombre de la empresa |
| nif | varchar(50) | NIF del usuario |
| tutorLaboral | varchar(50) | Tutor laboral |
| telefono | varchar(50) | Telefono de la empresa |
| email | varchar(50) | Email de la empresa |

### Asignaciones
| Columna | Tipo | Descripción |
| --- | --- | --- |
| id | int | Identificador único |
| alumno_id | int | Identificador del usuario |
| empresa_id | int | Identificador de la empresa |
| fecha_inicio | date | Fecha de inicio |
| fecha_fin | date | Fecha de fin |
| tutor_id | int | Identificador del tutor |


## Enunciado

Nos piden una aplicación para hacer seguimiento y definir la asignación de prácticas a alumnado.

Habrá 3 roles de usuario, el usuario normal (alumnado), el profesorado y el super admin.

Los usuarios se registran. Por defecto son alumnado.

El superadmin tiene todos los poderes de profesorado y además puede cambiar el rol de los usuarios (convertir alumnado en profesorado).

El profesorado puede dar de alta empresas. De cada empresa queremos saber nombre, nif, dirección, nombre del tutor laboral, telefono y correo electrónico. También podrá editarlas y eliminarlas.

El profesorado tendrá acceso a una vista con el listado de las empresas dadas de alta, otra con el alumnado registrado y otra de profesorado registrado. Cada uno de los elementos de esos listados enlazará a una vista detalle del elemento.

---> Hasta aquí un 5.

El profesorado puede a su vez asignar un alumno/a a una empresa para que haga las prácticas. De esa asignación queremos saber fecha de comienzo y fecha de fin, ademas de asignar un profesor como tutor docente (que puede ser cualquiera de los profesores).

---> Hasta aquí un 6.

El profesorado podrá editar estas asignaciones, pudiendo modificar tanto la fecha de comienzo, la de fin, la empresa o el alumno asignado. También podrá eliminar la asignación.

---> Hasta aquí un 7.

En la vista principal debe aparecer las asignaciones que tiene. Si es un alumno, la empresa que tiene asignada, cuando empieza y cuando termina. Si es un profesor, el listado de practicas que es tutor docente (mostrando nombre de la empresa, nombre del alumno y fechas de comienzo y fin).

---> Hasta aquí un 8.

El profesorado tendrá acceso mediante un enlace a un listado completo de todas las asignaciones de prácticas, ordenadas por fecha de comienzo, de más reciente a más antigua.

---> Hasta aquí un 9.

En las vistas de listado de asignaciones de prácticas, empresas, alumnado y profesorado, añadir un buscador por nombre.

---> Hasta aquí un 10.