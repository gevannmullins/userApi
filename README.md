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

- Register User: From PostMan, enter ` http://localhost:8000/api/register ` and 
ensure that the request type is set to ` POST `.
In the body section, select the ` RAW ` button and select ` JSON(application/json) ` from the dropdown.
In the body content ensure that your data format looks something like this:
`
{
  "name": "Walter White", 
  "email": "wake@someemaildomain.net",
  "password": "testpassword",
  "password_confirmation": "testpassword"
}
`.
Click the send button to register a new user. 
FYI, user email needs to be unique and passwords have to be identical for this to work.
- Login User: From Postman, enter ` http://localhost:8000/api/login ` and ensure that the request type is set
to ` POST `.
In the body section, select the ` x-www-form-urlencoded ` button and add the following key=>value option:
`
email   ->   'email address',
password  ->  'password'
`.
Click the send button to get your response.
- User Information: From PostMan, enter ` localhost:8000/api/user?token={your-token-here} `. This will return the user's information.
I have to admit that this section gave me more issues than I thought it would. If for some reason this section does not work, 
I created another endpoint that I could use to get the user's details. I know this is not a requirement but I had to come up with an alternative.
User's details can also be found using the user's ID by entering the url ` localhost:8000/api/user/{user-id} `. 
The result is the same as the above endpoint and only serves as an alternative.
