# userApi
Laravel build with user api endpoints

## Installation Instructions

- Clone the repository:
` git clone https://github.com/gevannmullins/userApi.git `
- Create a database and enter the credentials into the .env file.
- Ensure that all the composer packages are installed by running ` composer install `.
- Run the database migration script running ` php artisan migrate `.
- To start up the server, run ` php artisan serve ` from your terminal.

## Testing the API

- From PostMan, enter ` http://localhost:8000/api/register ` and 
ensure that the request type is set to ` POST `.

