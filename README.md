# Dorumentation

- need php 8.2
- need to install php8.2-sqlite extension
    - my need to restart apache2 our nginx service
- need to run php artisan:migrate
- Confirm new tables and database created in database folder
- To set default users run php artisan db:seed 
    - users will show in users tables with their email and passwords [['john','02012024@@'], ['julius','02012023@@'], ['olijide','02012022@@']] or combinations of those name.
    - be aware command can be rerun and different users will be created
    - users also will contain records for favorite quotes in user_favorite_quotes table
- 