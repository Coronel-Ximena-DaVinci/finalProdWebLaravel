## Instalación

- Clonar el repositorio
- Copiar .env.example, renombrar copia a .env, y configurar en el mismo los parámetros de entorno
- Ejecutar los siguientes comandos:
```
composer install
php artisan key:generate
npm install
npm run dev
php artisan storage:link # Si no se ven las imagenes, faltó correr este
php artisan migrate --seed
```
