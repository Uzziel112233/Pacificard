# Usa una imagen oficial de PHP con Apache
FROM php:8.1-apache

# Copia todo el contenido de tu proyecto al contenedor en el directorio de Apache
COPY . /var/www/html/

# Habilita el módulo mod_rewrite para permitir URLs amigables si es necesario
RUN a2enmod rewrite

# Expone el puerto 80, que es donde Apache escuchará
EXPOSE 80

# Comando para iniciar Apache cuando se levante el contenedor
CMD ["apache2-foreground"]