
# Fast Growing Trees - Hiring Project

###### Backend

* Uses standard Laravel, and leverages the `kalnoy/nestedset` composer package to handle categories.
* Leverages a fully functional API for all interaction with the front-end, including token based authentication. 
* When available, all files were created using the `artisan` command and reside in the default Laravel locations.
* All database tables were created using migrations, and live in the `/migrations` directory. 
* A database seeder was created leveraging the `fzaninotto/faker` composer package to provide fake data. You can run the seeder using the command `php artisan db:seed --class=EntriesTableSeeder`
* All services are registered in the Laravel container, and are properly injected as dependencies when used in the application. 
* This application is 100% testable, but unit tests have not yet been added due to time constraints. 
* I have created the `RequestUuid` global middleware found in `app/Http/Middleware`. This attaches a unique ID to each request, which is accessible from anywhere in the application. This is helpful when reporting errors or tracking a request through it's lifecycle. 
* I have created custom exceptions which leverage the `$request->uuid` to correlate exceptions with a request. 

 
###### Front End  

* Uses Vue.js and VueRouter to handle all front end functionality. 
* The admin page and blog page are separate application entries to leverage the Laravel authentication layer to it's full extent.
* Each section of the front end are stand-alone SPAs leveraging the Larvel API to hydrate data. This API also provides pagination when applicable, as well as environment aware debug stack traces when errors occur.
* All front-end files reside in the `/resources` directory, with all javascript and Vue code living in `resources/js` and it's sub-folders.
* I opted to use the `@ckeditor/ckeditor5-build-classic` and `@ckeditor/ckeditor5-vue` packages for the rich text editor. This was chosed for it's seamless integration into Vue, but has *not* been vetted for security issues and should not be considered production ready. 

##### TODO:
* Due to time constraints, I was unable to do much in the way of front end design. I am still actively developing the front end, which can be seen in the `feature/front-end-updates` branch within this repo.
* The SPAs are leveraging the event/listener architectual paragigm to transfer data between components. This decision was made to allow the seamless integration of web-sockets in the future. 
