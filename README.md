# Sistema de Gestión de Colegios (ND-colegios)

## 1. Introducción al Proyecto

Este proyecto es un sistema de gestión de colegios diseñado para automatizar la administración de clientes (instituciones educativas), que jerárquicamente contienen colegios y usuarios. El objetivo principal es proporcionar una plataforma robusta para registrar y gestionar estas entidades, facilitando la operatividad de los responsables.

  * **Visión:** Desarrollar un sistema escalable y mantenible que automatice de manera eficiente los procesos administrativos de las instituciones educativas, mejorando la gestión de sus colegios y usuarios.

  * **Alcance de la Prueba Técnica:** La solución actual se enfoca en el modelado de la base de datos, la implementación de una API RESTful para la gestión de instituciones (listado y creación), y la preparación para una interfaz de usuario en React.

  * **Tecnologías Utilizadas:**
      * **Backend:** Laravel PHP (última versión), Laravel Sanctum (para autenticación API).
      * **Frontend:** React, Tailwind CSS.
      * **Base de Datos:** MySQL (o compatible, usando MariaDB en desarrollo).
--- 

## 2. Arquitectura y Modelado de Base de Datos

El sistema fue desarrollado como una aplicación monolítica con Laravel, React e Inertia.js. La base de datos refleja la jerarquía solicitada:

* Una institución puede tener varios colegios.
* Cada colegio pertenece a una institución.
* Una institución puede tener varios usuarios.
* Un usuario puede estar asignado a múltiples colegios.
* Un responsable gestiona el registro de instituciones, colegios y usuarios.

Las relaciones se implementan mediante claves foráneas y tablas intermedias, asegurando integridad y eficiencia en las consultas.

  ### 2.1. Diagrama Entidad-Relación (ERD)

  A continuación, se presenta el diagrama de la base de datos que ilustra las entidades principales y sus relaciones:

  ![Diagrama ERD de la Base de Datos](storage/app/private/ModeloBD.png)

  También puedes visualizar el diagrama interactivo aquí:(https://dbdiagram.io/d/6855a202f039ec6d363034db)
  
  ### 2.2. Entidades Clave y Relaciones Adicionales

  Además de las entidades principales (`institutions`, `schools`, `users`), se han incluido tablas para la normalización de datos geográficos y de estado, así como tablas pivote para gestionar relaciones N:M:

  * `countries`, `regions`, `communes`: Para la gestión jerárquica de la ubicación geográfica (País -> Región -> Comuna).
  * `states`: Para definir estados administrativos aplicables tanto a instituciones como a colegios.
  * `school_users`: Tabla pivote para manejar la relación muchos a muchos entre usuarios y colegios.

---
## 3. Instalación y Ejecución del Proyecto

Sigue los pasos a continuación para configurar y ejecutar el proyecto en tu entorno local.

  ### 3.1. Requisitos Previos

  Asegúrate de tener instalados los siguientes componentes:

  * **PHP:** Versión 8.2 o superior (compatible con Laravel).
  * **Composer:** Gestor de dependencias de PHP.
  * **Node.js y npm/yarn:** Entorno de ejecución de JavaScript y gestor de paquetes.
  * **Git:** Sistema de control de versiones.
  * **Servidor de Base de Datos:** MySQL o MariaDB.

  ### 3.2. Pasos para el Backend (Laravel)
    ## LINK REPO "https://github.com/DazeMind/ND-colegios.git" publico

  1.  **Clonar el Repositorio:**
      ```bash
      git clone https://github.com/DazeMind/ND-colegios.git
      cd ND-colegios
      ```
  2.  **Instalar Dependencias de Composer:**
      ```bash
      composer install
      ```
  3.  **Configurar Variables de Entorno:**
      * Crea una copia del archivo `.env.example` y renómbrala a `.env`:
          ```bash
          cp .env.example .env
          ```
      * Abre el archivo `.env` y configura los parámetros de tu base de datos idealmente utiliza el nombre nd_colegio para tu DB_DATABASE (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
      * Genera la clave de aplicación:
          ```bash
          php artisan key:generate
          ```
  4.  **Ejecutar Migraciones de Base de Datos:**
      ```bash
      php artisan migrate
      ```
  5.  **Poblar la Base de Datos (Seeders):**
      * Se han incluido seeders para poblar las tablas de `countries`, `regions`, `communes`, `states`, `institutions`, `schools`, y `users`.
      * Ejecuta el comando para poblar la base de datos:
          ```bash
          php artisan db:seed
          ```
      * **Nota:** Se incluyen al menos 10 instituciones, 3 colegios y 3 usuarios por defecto.
      * **Credenciales de Acceso por Defecto:**
          * **Correo:** `superadmin@example.com`
          * **Contraseña:** `12345678`

  6.  **Crear Enlace Simbólico para Almacenamiento (si aplica):**
      ```bash
      php artisan storage:link
      ```
  7.  **Iniciar el Servidor de Desarrollo de Laravel:**
      ```bash
      php artisan serve
      ```
      * El backend estará disponible en `http://localhost:8000` o `http://127.0.0.1:8000`.

  ### 3.3. Pasos para el Frontend (React)
    El frontend se encuentra en el mismo repositorio y utiliza Vite para el desarrollo.

    1.  **Navegar al Directorio del Frontend:**
        ```bash
        cd [ruta_a_tu_carpeta_frontend_si_no_es_la_raíz_del_repo]
        # Por ejemplo: cd frontend o si está en la raíz junto al backend, no es necesario este paso.
        ```
    2.  **Instalar Dependencias de Node:**
        ```bash
        npm install # o yarn install
        ```
    3.  **Compilar y Ejecutar el Servidor de Desarrollo de Frontend:**
        ```bash
        npm run dev # o yarn dev
        ```
        * El frontend estará disponible en `http://localhost:5173` (o el puerto que te indique Vite/npm).

---

## 4. Documentación de la API REST

La API se ha construido siguiendo principios RESTful y utiliza Laravel Sanctum para la autenticación basada en tokens. La URL base para todos los endpoints de la API es `http://localhost:8000/api` (o `http://nd-colegios.codazework.com/api` en producción LAMP).

  ### 4.1. Autenticación

  Todos los endpoints que gestionan recursos (listar, crear instituciones) están protegidos y requieren autenticación mediante **Bearer Token** (Laravel Sanctum).

  #### **4.1.1. Obtener un Token de Acceso**

  Para acceder a los recursos protegidos, primero debes autenticarte para obtener un token de acceso.

  * **Endpoint:** `/login`
  * **Método HTTP:** `POST`
  * **Tipo de Contenido:** `application/json`

  ##### **Parámetros de Solicitud (Request Body):**

  | Campo      | Tipo     | Obligatorio | Descripción                  |
  | :--------- | :------- | :---------- | :--------------------------- |
  | `email`    | `string` | Sí          | Correo electrónico del usuario. |
  | `password` | `string` | Sí          | Contraseña del usuario.      |

  ##### **Ejemplo de Solicitud (Request):**

  ```http
  POST http://localhost:8000/api/login
  Content-Type: application/json
 "
  {
      "email": "superadmin@example.com",
      "password": "12345678"
  }
  "
  ##### ** ejemplo de respuesta **
  ``
    {
        "token": "1|AbCDE123...TuTOKEN",
        "user": {
            "id": 1,
            "name": "Admin",
            "email": "superadmin@example.com"
        }
    }
    `
    **4.1.2. Endpoints disponibles**

    ✅ GET /api/institutions

    Listado de instituciones (requiere Bearer Token).

    ✅ POST /api/institutions

    Crea una nueva institución (requiere Bearer Token).

    {
        "name": "Grupo Aurora",
        "rut": "12345678-9",
        "phone": "987654321",
        "region_id": 5,
        "commune_id": 35,
        "address": "Av. Siempre Viva 123",
        "start_date": "2020-12-12"
    }

## Informacion ADICIONAL



Se utiliza el campo created_by en institutions para registrar el responsable.

Los estados se manejan visualmente con colores y condicionales simples; se puede escalar incorporando un campo color en la tabla states.

Tablas adicionales: school_user, states, countries, regions, communes.


- para este caso asumimos como cliente a institucion. 
- Los usuarios se vinculan a colegios, y desde allí se infiere la institución. ya que no se especifica en el flujo si un usuario puede estar vinculado a una institucion SIN estar vinculado a un colegio, en un caso real evaluaria las posibles soluciones y consultaria para lograr una solucion segun lo solicitado por el "cliente"
Por este mismo motivo no se creó una tabla institution_user, pero puede agregarse si se requiere. en caso de necesitar crear usuarios relacionados a una institucion sin un colegio de por medio seria necesario una tabla institution_users.
- Se utiliza el campo created_by en institutions,usuarios y colegios para registrar el responsable. ya que no se define si responsable es una tabla aparte o usuarios con privilegios por lo que en este caso asignaremos la id del usuario que lo ha creado "Actualmente utilice el campo   created_by como minimo viable para registrar el usuario que crea una institución. En un escenario real, esta solución podría escalar fácilmente mediante un sistema de roles (por ejemplo, con la librería Spatie Laravel Permission) para definir permisos más finos sobre usuarios, responsables, docentes, etc.".
- en el diseño de vistas entregado y en la logica del flujo no se especifica si al crear una instucion el siguiente paso obligatorio es crear un colegio susesivo de un usuario, por lo que he decidido agregar el campo instituto id para relacionar un colegio creado a su institucion .
- En este caso, se manejan tres estados, cada uno representado por un color específico para facilitar su identificación visual. Dado que estos estados solo se utilizan en una vista puntual y son limitados (tres en total), opté por implementar una lógica condicional simple (if) directamente en el style o className para cambiar el color dinámicamente.
Sin embargo, si en el futuro se requiere escalar el sistema para manejar más estados o reutilizar esta lógica en múltiples vistas, una mejora recomendable sería incorporar un campo color directamente en la tabla states. Esto permitiría una asignación dinámica de estilos desde base de datos, haciendo el sistema más flexible y mantenible.





