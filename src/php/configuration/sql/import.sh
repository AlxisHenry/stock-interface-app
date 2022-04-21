echo "--------------------------------------------";
echo "Création des tables, importation des données";
echo "--------------------------------------------";

echo "";
echo "----------------------------------------------------";
echo "Création de la base de données, ainsi que des tables";
echo "----------------------------------------------------";
sudo mariadb -e "source /var/www/timken/src/php/configuration/sql/timken_test.sql";

echo "";
echo "----------------------";
echo "Insertion des articles";
echo "----------------------";
sudo mariadb -e "source /var/www/timken/src/php/configuration/sql/imports/articles.sql";

echo "";
echo "----------------------";
echo "Insertion des familles";
echo "----------------------";
sudo mariadb -e "source /var/www/timken/src/php/configuration/sql/imports/famille.sql";

echo "";
echo "--------------------";
echo "Importation terminée";
echo "--------------------";
