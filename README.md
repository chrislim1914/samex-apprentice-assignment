# samex-apprentice-assignment

For this task, you're going to create a simple web signup form that will accept input from the user and send it to an API endpoint.


Your form should have the following fields: First Name, Last Name, Email Address, Phone Number. The first name and email address fields will be required on your form.


* When a user completes the form, the following actions should be taken.
    ```
    The email address should be validated when the user clicks Submit. Meaning that the text entered should be in the right format for an email address.
    After the email address has been validated, the data should be stripped and cleaned to eliminate any possibilities of SQL injections or invalid characters before the data gets posted.
    Your script should create a unique hexadecimal ID for the user that's based on their email address.
    The unique ID, and all form values should then be posted to the API endpoint.
    ```

## Note:

    Use webhook.site to obtain an open API endpoint that you can use for this task.
    Your script should be written in object-oriented PHP. With classes and methods.
    You may use vanilla JavaScript, jQuery or any other library you're familiar with for the front-end form validation.

## Getting Started
### Prerequisites

What things you need to install the software and how to install them

PHP7.1 or greater
```
https://www.php.net/downloads.php
```

NodeJS
```
https://nodejs.org/en/
```
### Setup
navigate into root folder
congifure the backend
backend/app/config/config.php
run php -S localhost:8081 -t public
run the front-end
cd front/
npm install
npm run start

## Authors

* *GITHUB Christopher Lim* -[chrislim1914](https://github.com/chrislim1914)
* *GITLAB Christopher Lim* -[chrislim1914](https://gitlab.com/chrislim1914)
