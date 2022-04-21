echo "----------------------------------------------------";
echo "Création de la base de données, ainsi que des tables";
echo "----------------------------------------------------";
echo "";

echo "Importation de la base de données & des tables";
sudo mariadb -e "source /var/www/main/src/php/configuration/sql/Database.import.sql";

echo "Importation de la table Access";
sudo mariadb -e "source /var/www/main/src/php/configuration/sql/imports/Access.import.sql";

echo "Importation de la table Front";
sudo mariadb -e "source /var/www/main/src/php/configuration/sql/imports/Front.import.sql";

echo "Importation de la table Articles";
sudo mariadb -e "source /var/www/main/src/php/configuration/sql/imports/Articles.import.sql";

echo "Importation de la table Familles";
sudo mariadb -e "source /var/www/main/src/php/configuration/sql/imports/Familles.import.sql";

echo "Importation de la table Alertes";
sudo mariadb -e "source /var/www/main/src/php/configuration/sql/imports/Alertes.import.sql";

echo "";
echo "--------------------";
echo "Importation terminée";
echo "--------------------";
