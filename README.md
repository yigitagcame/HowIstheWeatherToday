
# How Is the Weather

 

How Is the Weather is an cli tool to check weather by city name

  
## Install
- Install composer globally (https://getcomposer.org/)
- And run following command
```
composer install
```
## Configuration
- Rename .env.example file to .env at root of the project
- Edit .env file and set required values.

## Run
To check weather in any city, you may run "php weather --city={cityName}" in project root folder. Example is below
```
php weather --city=Riga
```
**Example result**

*overcast clouds, 2 degree Celcius*


## Test
```
php vendor/bin/phpunit
```