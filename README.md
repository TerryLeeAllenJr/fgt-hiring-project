
Fast Growing Trees - Hiring Project 

Please note, I was unable to spend as much time as I wanted making the front end look the way I wanted. 
I will be updating this throughout the day today, and plan to continue working on this as a side project for the forseeable future (under a differengt GIT repo.)

##### Notes:

###### Backend

* Uses standard Laravel, and leverages the `kalnoy/nestedset` composer package to handle categories.
* Leverages a fully functional API for all interaction with the front-end, including token based authentication. 
* When applicable, all files were created using the `artisan` command and reside in the default Laravel locations.
* All database tables were created via migrations, and live in the `/migrations` directory. 
* I created a database seeder using `artisan` and the `fzaninotto/faker` composer package. You can run the seeder using the command `php artisan db:seed --class=EntriesTableSeeder`
* All services are registered in the Laravel container, and are properly dependency injected. This application is 100% testable, and I will beging adding unit tests shortly. 
* I have created the `RequestUuid` global middleware found in `app/Http/Middleware`. This code attaches a unique ID to each request, which is accessable from anywhere in the application and is helpful when reporting errors or tracking a request through it's lifecycle. 
* I have created custom exceptions which leverage the `$request->uuid` to correlate exceptions with a request. 

 
###### Front End  

* Uses Vue.js and VueRouter to handle all front end functionality. 
* The admin page and blog page are separate Laravel routes to leverage the Laravel authentication package.
* Each section of the front end are stand-alone SPAs leveraging the Laravel API to hydrate data. 
* All front-end files reside in the `/resources` directory, with all javascript and Vue code living in `resources/js` and it's sub-folders.
* I opted to use the `@ckeditor/ckeditor5-build-classic` and `@ckeditor/ckeditor5-vue` packages for the rich text editor. This was chosed for it's seamless integration into Vue, but has *not* been vetted for security issues and should not be considered production ready. 

##### TODO:
* At the moment the application is almost 100% raw `bootstrap` code. I unfortunatly had a ton of work pop up for my current position, and have not had time to complete my vision for the front-end.
* Memcached was setup as a depencency for this application, but has not been implemented.  
