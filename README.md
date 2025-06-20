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
- asumimos como cliente a institucion. 

- no se define si responsable es una tabla aparte o usuarios con privilegios por lo que en este caso asignaremos la id del usuario que lo ha creado "Actualmente utilice el campo   created_by como minimo viable para registrar el usuario que crea una institución. En un escenario real, esta solución podría escalar fácilmente mediante un sistema de roles (por ejemplo, con la librería Spatie Laravel Permission) para definir permisos más finos sobre usuarios, responsables, docentes, etc."

- en el diseño de vistas entregado y en la logica del flujo no se especifica si al crear una instucion el siguiente paso obligatorio es crear un colegio susesivo de un usuario, por  que he decidido agregar el campo instituto id para relacionar un colegio creado a su institucion  

- En este caso, se manejan tres estados, cada uno representado por un color específico para facilitar su identificación visual. Dado que estos estados solo se utilizan en una vista puntual y son limitados (tres en total), opté por implementar una lógica condicional simple (if) directamente en el style o className para cambiar el color dinámicamente.
Sin embargo, si en el futuro se requiere escalar el sistema para manejar más estados o reutilizar esta lógica en múltiples vistas, una mejora recomendable sería incorporar un campo color directamente en la tabla states. Esto permitiría una asignación dinámica de estilos desde base de datos, haciendo el sistema más flexible y mantenible.

- me tome la libertad de integrar seeder para region provincia comuna creados por mi

- tablas adicionales school_user , states , country-region-province-comune
- 
