# Quotes App

This is the quotes app test

## Table of contents

- [Installation](#installation)
- [Setting up the environment](#setting-up-the-environment)
- [Getting Started](#getting-started)
- [Usage](#usage)
- [Tests](#tests)

## Installation

Clone the repo to your desired location (Server/Local). Once all of the code is copied, go into the folder and run `composer install`. This will install all dependancies needed.

## Setting up the environment

Inside the Laravel based application, there is a `.env.example` file. Make a copy of this file in the exact same location and name the file `.env`.

There are only a couple of things needed to be updated in this new `.env` file. 

1. Run `php artisan key:generate` to create a new application key
2. Update the variable `API_TOKEN` to a string of your choosing.

## Getting started

For ease, I have created a frontend to easily use this App. Upon initial page load, it will call the API and show 5 quotes. There is a cache solution in place to keep the same 5 quotes if the page is reloaded. However, clicking the 'Generate' button will clear the cache and respond with a new set of quotes.

To access this page, just go to the main URL you have setup for this project.

Blade, Tailwind and JS was used for this.

## Usage

There is a seperate API enpoint created in this App that can be used to get the raw data. When calling this API, you will need to pass an `Authorization` header with the value you defined under the `API_TOKEN` withing your `.env` file earlier.

The enpoint will accept only one boolean parameter called `fresh`. This parmater is used to tell the system to generate a new set of quotes instead of using the cached ones. If this parameter is not present in the body or it's value is set to `false`, then the API will return the cached values.

URL: `/api/quotes`

Type: `GET`

Body:

```json
{
    "fresh": true // optional
}
```

Example Response (200):
 ```json
{
	"success": true,
	"message": "Quotes retrieved successfully",
	"data": [
		"We used to diss Michael Jackson the media made us call him crazy ... then they killed him",
		"Shut the fuck up I will fucking laser you with alien fucking eyes and explode your fucking head",
		"I'm giving all Good music artists back the 50% share I have of their masters",
		"If I don't scream, if I don't say something then no one's going to say anything.",
		"I watch Bladerunner on repeat"
	]
}
```

As this endpoint fires multiple API calls to another third party servive, there can be errors. If this type of error occurs then the following message will be returned.

Example Error Response (500):
 ```json
{
	"success": false,
	"message": "Error message goes here",
}
```

## Tests

There a couple of tests around this code. Run `php artisan test` from within the terminal to run these tests.