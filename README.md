# Sistema de Gestión de Colegios (ND-colegios)

## 1. Introducción al Proyecto

Este proyecto es un sistema de gestión de colegios diseñado para automatizar la administración de clientes (instituciones educativas), que jerárquicamente contienen colegios y usuarios. El objetivo principal es proporcionar una plataforma para registrar y gestionar estas entidades, facilitando la operatividad de los responsables.

- **Visión:** Desarrollar un sistema escalable y mantenible que automatice de manera eficiente los procesos administrativos de las instituciones educativas, mejorando la gestión de sus colegios y usuarios.

- **Alcance de la Prueba Técnica:** La solución actual se enfoca en el modelado de la base de datos, la implementación de una API RESTful para la gestión de instituciones (listado y creación), y la preparación para una interfaz de usuario en React.

- **Tecnologías Utilizadas:**

  - **Backend:** Laravel PHP (última versión), Laravel Sanctum (para autenticación API).
  - **Frontend:** React, Tailwind CSS.
  - **Base de Datos:** MySQL (o compatible, usando MariaDB en desarrollo).

---

## 🚀 Prueba rápida

1. Visita `https://ndcolegios.codazework.com`
2. Inicia sesión con:
   - Correo: `superadmin@example.com`
   - Contraseña: `12345678`
3. Puedes usar Swagger para probar la API: [Documentación en SwaggerHub](https://app.swaggerhub.com/apis-docs/codaze/NDColegios/1.0.0)

---

## 2. Arquitectura y Modelado de Base de Datos

El sistema fue desarrollado como una aplicación monolítica con Laravel, React e Inertia.js. La base de datos refleja la jerarquía solicitada:

- Una institución puede tener varios colegios.
- Cada colegio pertenece a una institución.
- Una institución puede tener varios usuarios.
- Un usuario puede estar asignado a múltiples colegios.
- Un responsable gestiona el registro de instituciones, colegios y usuarios.

Las relaciones se implementan mediante claves foráneas y tablas intermedias, asegurando integridad y eficiencia en las consultas.

### 2.1. Diagrama Entidad-Relación (ERD)

También puedes visualizar el diagrama aquí: [https://dbdiagram.io/d/6855a202f039ec6d363034db](https://dbdiagram.io/d/6855a202f039ec6d363034db)

### 2.2. Entidades Clave y Relaciones Adicionales

Además de las entidades principales (`institutions`, `schools`, `users`), se han incluido tablas para la normalización de datos geográficos y de estado, así como tablas pivote para gestionar relaciones N\:M:

- `countries`, `regions`, `communes`: Para la gestión jerárquica de la ubicación geográfica (País -> Región -> Comuna).
- `states`: Para definir estados administrativos aplicables tanto a instituciones como a colegios.
- `school_users`: Tabla pivote para manejar la relación muchos a muchos entre usuarios y colegios.

---

## 3. Instalación y Ejecución del Proyecto

Sigue los pasos a continuación para configurar y ejecutar el proyecto en tu entorno local.

### 3.1. Requisitos Previos

Asegúrate de tener instalados los siguientes componentes:

- **PHP:** Versión 8.2 o superior (compatible con Laravel).
- **Composer:** Gestor de dependencias de PHP.
- **Node.js y npm/yarn:** Entorno de ejecución de JavaScript y gestor de paquetes.
- **Git:** Sistema de control de versiones.
- **Servidor de Base de Datos:** MySQL o MariaDB.

### 3.2. Pasos para el Backend (Laravel)

#### LINK REPO: [https://github.com/DazeMind/ND-colegios.git](https://github.com/DazeMind/ND-colegios.git)

1. **Clonar el Repositorio:**

```bash
git clone https://github.com/DazeMind/ND-colegios.git
cd ND-colegios
```

2. **Instalar Dependencias de Composer:**

```bash
composer install
```

3. **Configurar Variables de Entorno:**

```bash
cp .env.example .env
```

Configura los parámetros de conexión a base de datos.

```bash
php artisan key:generate
```

4. **Ejecutar Migraciones y Poblar la Base de Datos :**

```bash
php artisan migrate:fresh --seed
```
5. **Iniciar Servidor Laravel:**

```bash
php artisan serve
```

### 3.3. Pasos para el Frontend (React con Vite)
    ejecuta los siguientes comandos en la raiz del proyecto
1. **Instalar Dependencias de Node:**

```bash
npm install
```

2. **Iniciar Servidor de Desarrollo:**

```bash
npm run dev
```

---

## 4. Documentación de la API REST

También puedes acceder a la documentación y probar la API desde SwaggerHub: [https://app.swaggerhub.com/apis-docs/codaze/NDColegios/1.0.0](https://app.swaggerhub.com/apis-docs/codaze/NDColegios/1.0.0)

La API se ha construido siguiendo principios RESTful y utiliza Laravel Sanctum para la autenticación basada en tokens. La URL base para todos los endpoints de la API es:

```text
http://localhost:8000/api
```

(o `https://ndcolegios.codazework.com/api` en producción).

### 4.1. Autenticación

#### 4.1.1. Iniciar Sesión (Login)

- **Endpoint:** `POST /login`
- **Request Body:**

```json
{
  "email": "superadmin@example.com",
  "password": "12345678"
}
```

- **Respuesta Ejemplo:**

```json
{
  "token": "1|AbCDE123...TuTOKEN",
  "user": {
    "id": 1,
    "name": "Admin",
    "email": "superadmin@example.com"
  }
}
```

#### 4.1.2. Cerrar Sesión (Logout)

- **Endpoint:** `POST /logout`
- **Requiere Bearer Token**
- **Descripción:** Invalida el token actual del usuario autenticado.

### 4.2. Endpoints Disponibles

#### ✅ `GET /api/institutions`

- Lista todas las instituciones (requiere Bearer Token).

#### ✅ `POST /api/institutions`

- Crea una nueva institución (requiere Bearer Token).

```json
{
  "name": "Grupo Aurora",
  "rut": "12345678-9",
  "phone": "987654321",
  "region_id": 5,
  "commune_id": 35,
  "address": "Av. Siempre Viva 123",
  "start_date": "2020-12-12"
}
```

- El campo `created_by` representa al usuario que registró la institución. Este usuario se asocia mediante la relación `creator`. En un sistema extendido, se podría evolucionar hacia un sistema de permisos basado en roles como "responsable" o "creador".

### 4.3. Endpoints sugeridos para completar flujo

Aunque no eran obligatorios para esta prueba, se sugieren los siguientes endpoints para completar el ciclo de gestión:

- `GET /api/schools`: Listar colegios.
- `POST /api/schools`: Crear colegio.
- `GET /api/users`: Listar usuarios.
- `POST /api/users`: Crear usuario.

---

## 5. Información Adicional

- El cliente en este caso es la institución.
- Los usuarios se vinculan a colegios, y desde allí se infiere la institución.
- No se creó una tabla `institution_user`, pero puede agregarse si se requiere.
- Se utiliza el campo `created_by` en `institutions`, `users` y `schools` para registrar el responsable.
- Los estados se manejan visualmente con colores de forma dinamica; se incorporo un campo `color` en la tabla `states`, almacenando (ejemplo : "red","yellow","green"), de ser necesario se puede asignar colores en Hexadecimal y otro formato.
- Tablas adicionales: `school_user`, `states`, `countries`, `regions`, `communes`.
- Actualmente no se implementó un sistema de roles formal; en un entorno real se recomienda usar paquetes como Spatie Laravel Permission.
- Se priorizó un flujo simple y funcional, apto para pruebas técnicas y escalable a futuro.

- en el flujo original la crecion de institucion->colegio->usuario parecia estar encadenada lo que significaba que no se podía acceder a la vista de resumen hasta haber creado los tres elementos.
Esto limitaba la flexibilidad y no permitía crear instituciones, colegios o usuarios de forma independiente.
La solución que implemente mejora significativamente el flujo al permitir la creación individual de cada elemento. Ahora se puede crear una institución sin necesidad de crear un colegio o usuario al mismo tiempo, y viceversa. Además, has facilitado el acceso al resumen general desde la tabla de instituciones, lo que hace que la navegación sea mucho más intuitiva.


---

## 6. Mejoras Continuas
A continuación, se enumeran algunas mejoras y cambios posibles que pueden implementarse en futuras versiones del sistema:

Agregar gráficas simples con Chart.js o Recharts para visualizar crecimiento, registros por fecha, distribución regional, etc.
- **Mejoras en al Dashboard como resumen total de instituciones, total de colegios, total de usuarios, visualizar cantidad de usuarios por colegios, etc
- **Aunque en esta prueba técnica solo se solicitaban funciones de creación y listado, en un entorno real se deberia incorporar update, delete y show segun se requiera
- **Sistema de Roles y Permisos:** Implementar una solución como `Spatie Laravel Permission` para gestionar diferentes perfiles de usuario (responsables, administradores, docentes, etc.).
- **Gestión de Colegios y Usuarios:** Añadir endpoints REST para CRUD completo de colegios y usuarios, incluyendo su vinculación directa con instituciones.
- **Validaciones Avanzadas:** Incorporar validaciones personalizadas y mensajes de error más detallados, tanto en frontend como backend.
- **Carga Masiva:** Permitir importar instituciones o colegios desde archivos CSV o Excel.
- **Notificaciones:** Añadir notificaciones por correo o en tiempo real al crear nuevas entidades.
- **Pruebas Automatizadas:** Incluir pruebas unitarias y de integración utilizando PHPUnit y herramientas para React.

