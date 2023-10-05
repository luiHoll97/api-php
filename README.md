<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Instruct-ERIC php-api Test

This is my first exposure to PHP & Laravel in a small API-based project. Coming from PERN stack with Typescript, there was a lot of trial and error involved, especially with underexpected errors due to occasionally forgetting to add semi colons!

## Task Overview

- [x] Endpoint GET for all services
- [x] Endpoint GET for services filtered by countryCode (not case sensitive)
- [x] Endpoint POST to either update or add a new service, linked to `Ref`
- [ ] Docker Successful Setup
- [x] Cli Commands for all Endpoints
- [ ] Include OpenAISpecification

### Failures

- Docker Successful Setup
- Include OpenAISpecification

  ### Docker

  My Docker set up seemed to have a few problems so I can't say the setup was successful. I referred to the official documentation initially for my virtual desktop (Linux) to download the desktop client but ran into issues in the terminal. I was able to set up containers but not to successfully run my application.

  My next point of call was to pull my project onto my Mac locally and try launching Docker Desktop there (which has an easier download). I thought this would help me visualise my problems. I had no luck so moved on!

  ### OpenAISpecification

  I simply ran out of time with my project and initially had not researched much into this as it wasn't part of minimum functionality. I have no other comment!

## Instructions for use

### Initial Setup

- `git clone` the repo onto your local machine and install dependecies using `composer install`
- start the application using `php artisan serve`

  The application will be running on `localhost:8000`

### GET & POST via Postman (or equivalent)

**All Services**

Send a GET request to: `https://localhost:8000/api/services`

**Services by Country**

Send a GET request to: `https://localhost:8000/api/services/{countryCode}`

- `{countryCode}` will be a request param in the url, simply add gb/fr etc

**Post New or Update Service**

Send a POST request to: `https://localhost:8000/api/services`

- Add JSON to the body of the request
    - eg `{ "Ref" : "expRef", "Centre" : "exmpleCentre", "Service" : "exmpleService", "Country" : "gb"}`
    - The JSON object will be read and will either add a new service if the `Ref` does not match any existing already, or         overwrite existing data if it does

## CLI Tools

There is a ./apiclient.php in the working directory of the project that specifies the CLI process. Once the project is         running in your terminal, this is how you query the project:

**All Services**

Run `./apiclient.php get http://localhost:8000/api/services`

**Services By Country**

Run `./apiclient.php get http://localhost:8000/api/services/{countryCode}`

**Post New or Update Service**

Run `./apiclient.php post http://localhost:8000/api/services "exampleRef" "exampleCentre" "exampleService" "de"`

 - As with before, the `exampleRef` will be taken as a `Ref` value and compare against existing data.
     

## Reflections

As frustrating as learning new languages can be, this was really enjoyable. The documentation and support for PHP/Laravel is astounding and teething problems I expereienced were solved a lot quicker than normal. I didn't know much about PHP, but some of the stuff it can do is magical, especially the inclusion of PHP CLI commands. I will defintely look further into it in the future. Thanks for reading my project.

Equally, I would love the opportunity to complete this task using node.js (with Ts)!





      
                








  
