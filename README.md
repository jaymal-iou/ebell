### Set up Instructions ####

#### Requirements ####
- Docker
- Docker Compose

#### Installation ####
1. Unzip the folder.
2. Open the folder in your terminal and from the root of the application run the following command to install the dependencies:
``` ./vendor/bin/sail up -d ```
3. To run the tests you can  either run the following command :
``` ./vendor/bin/sail phpunit```
4. or go into the container by doing :
``` ./vendor/bin/sail root-shell```
and then run the following command to run the tests:
``` vendor/bin/phpunit ```


### API Endpoints ###
No endpoints were created for this application. 
It's just composed of :
- service classes inside the `app/Services` folder 
- factories inside the `app/Factories` folder
- models inside the `app/Models` folder
- and the unit tests for those services in the `tests/Unit` folder.

Thanks
