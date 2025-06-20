## COMANDOS INCIALES
npm i
composer i
php artisan migrate
php artisan storage:link
php artisan serve
npm run dev

## LINK REPO "https://github.com/DazeMind/ND-colegios.git" publico


- acceder a api "http://localhost:8000/api/login" y entregar 
{
  "email": "superadmin@example.com",
  "password": "12345678"
}
con esto obtendremos el TOKEN el cual pasaremos como bearer TOKEN para acceder a get y post de /api/institutions
## Informacion
- asumimos como cliente a institucion
- no se define si responsable es una tabla aparte o usuarios con privilegios por lo que en este caso asignaremos la id del usuario que lo ha creado "Actualmente utilice el campo   created_by como minimo viable para registrar el usuario que crea una institución. En un escenario real, esta solución podría escalar fácilmente mediante un sistema de roles (por ejemplo, con la librería Spatie Laravel Permission) para definir permisos más finos sobre usuarios, responsables, docentes, etc."
- en el diseño de vistas entregado y en la logica del flujo no se especifica si al crear una instucion el siguiente paso obligatorio es crear un colegio susesivo de un usuario, por  que he decidido agregar el campo instituto id para relacionar un colegio creado a su institucion  

- me tome la libertad de integrar seeder para region provincia comuna creado por mi
- tablas adicionales school_user , states , country-region-province-comune
- 
