# Documentation

- Install sail in your machine https://laravel.com/docs/10.x/installation#docker-installation-using-sail this is a prerequisite
- copy .env.example to a new file .env
- create an empty file in database folder, database.sqlite
- From your cmd line run the following commands from the root of the project:
    - ./vendor/bin/sail build
    - ./vendor/bin/sail npm install
    - ./vendor/bin/sail artisan migrate
    - ./vendor/bin/sail artisan db:seed
- From other cmd line window run: ./vendor/bin/sail npm run dev
- From other cmd line window run: ./vendor/bin/sail up
- Default users will show in users tables with their email and passwords [['john@example.com','02012024@@'], ['julius@example.com','02012023@@'], ['olijide@example.com','02012022@@']] or combinations of those name.
- users also will contain records for favorite quotes in user_favorite_quotes table