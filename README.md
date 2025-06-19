## COMANDOS INCIALES
npm i
composer i
php artisan migrate
php artisan storage:link
php artisan serve
npm run dev


- acceder a api "http://localhost:8000/api/login" y entregar 
{
  "email": "superadmin@example.com",
  "password": "12345678"
}
con esto obtendremos el TOKEN el cual pasaremos como bearer TOKEN para acceder a get y post de /api/institutions
## Informacion
- asumimos como cliente a institucion
- me tome la libertad de integrar seeder para region provincia comuna creado por mi
- tablas adicionales school_user , states , country-region-province-comune
- "Actualmente utilice el campo created_by como minimo viable para registrar el usuario que crea una institución. En un escenario real, esta solución podría escalar fácilmente mediante un sistema de roles (por ejemplo, con la librería Spatie Laravel Permission) para definir permisos más finos sobre usuarios, responsables, docentes, etc."
