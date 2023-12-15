# Utilisez une image PHP Apache
FROM php:apache
# Copiez le contenu de l'application PHP dans le répertoire de travail du conteneur (/var/www/html/ est le répertoire par défaut d'Apache)
COPY . /var/www/html/
# Installez les dépendances de PDO pour MySQL
RUN docker-php-ext-install pdo pdo_mysql
