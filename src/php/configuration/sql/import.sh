echo "--------------------------------------------";
echo "Création des tables, importation des données";
echo "--------------------------------------------";

sudo mariadb -e "source /var/www/timken/src/php/configuration/sql/timken_test.sql";
sudo mariadb -e "source /var/www/timken/src/php/configuration/sql/imports/articles.sql";
sudo mariadb -e "source /var/www/timken/src/php/configuration/sql/imports/famille.sql";
