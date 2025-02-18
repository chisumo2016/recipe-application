    php artisan optimize
        . Add Route group  in resources
        .Add relationship  one to Many
            Category ----> Recipes
        Authentication and Authoriization
        Introduction to Laravel built-in authentication system
        Register , login , and logout functionality using starter kits
        
            composer require laravel/breeze --dev
            php artisan breeze:install
                v
            php artisan migrate
            npm install
            npm run dev
                
        
    We  should use the layout from breeze  instead  of  existing one.
       Category and Recipes to use breeze Layout
            @extends('layouts.app-layout')

                @section('content')
                    CODE
                @endsection


            To

        <x-app-layout>
        </x-app-layout>


        BUT ALL THE STYLE WILL LOST FRM BOOTSRAP AS WE'RE USING TAILWINDCSS
            - Solution is to add the boostrap on layout of tailwind
            https://preline.co/


        Middleware for protecting routes
            php artisan make:middleware  AdminMiddleware
            php artisan make:middleware  UserMiddleware

            php artisan make:migration add_role_column_to_users_table

                Some issue on middleware 
        Authorization: For role-based access control


        ADD MULT AUTHENTICATION DASHBOARD 
            - For user
            - For admin 

        When the user is logged in will redirected to user dashboard  same as admin .
            
                app/Http/Controllers/Auth/AuthenticatedSessionController.php
                resources/views/user/dashboard.blade.php

        Implement the Likes 
            php artisan make:model Like -mc
# INTRODUCTION TO LARAVEL
    . what is Laravel ? Overview and purpose
    . Key features of Laravel 11
    . Understand the MVC (Model-View-Controller) architecture
    . Installing Laravel 11
        . Using Composer
        . Setting up a local development environment 
        . Installing Git

# SETTING UP YOUR FIRST LARAVEL 11 PROJECT
    . Creating a new Laravel 11 project
    . Laravel 11  directory structure overview
    . Connfigiring environment variables(.env  file)
    . Setting up the database connection
    . Running te built-in Laravel server

# ROUTING IN  LARAVEL
    . Basic of laravel routing (web.php, api.php)
    . Undersstanding route methods (GET , POST , PUT , DELETE)
    . Defining basic  routes (returning  strings , views, JSON responses) .
    . Route parameters
    . Route groups and middleware

# CONTROLLERS
    . What are controllers and why we use them 
    . Creating a controller via Artisan command
    . Defining controller methods and routing to them
    . Resource controllers  (CRUD operations)

# BLADE TEMPLATING ENGINE
    . Introduction to Blade
    . Creating layouts and using @yield , @section , @include
    . Conditionals statements  @if @unless @isset
    . Blade Loops  @foreach  , @for  , @while
    . Displaying data {{ }} and escapping output
    . Helpers  functions

# MODELS AND ELOQUENT ORM
    . Introduction to Eloquent and database models
    . Creating models and migrations .
    . Understanding relationships
        . One-to-One
        . One-to-Many
        . Many-to-Many
    . Using  Eloquent to query the database .
        . Retriving records (all , find , first)
        . Inserting , updating , deleting records
    . Eloquent accessors and mutators
    . Eager Loading

# MIGRATIONS AND DATABASES  SETUP
    . Introduction to migrations
    . Creating and  running migrations via ARTISAN
    . Defining schema (columns , indexes , foreign keys)
    . Seeding the database with initial data
    . Using factories for generating fake data .
    . 

# AUTHENTICATION AND AUTHORIZATION
    . Introduction to Laravel's built-in authentication system
    . Register , login  and logout functionality using  stater kit
    . Middleware for protecting routes
    . Authorization for role-based access control 

# FORM  HANDLING AND VALIDATION
    . Handling form request in Laravel
    .  CSRF pprotection in forms
    . Validating form input
    . Displaying validation errors in Blade  views

# MIDDLEWARE IN  LARAVEL
    . What is middleware andd it purpose
    . Creating  custom middleware 
    . Applying middleware ro routes
 

# TASK SCHEDULING AND QUEUES 
    https://laravel.com/docs/11.x/mail#main-content
    . Introducing to task scheduling
    . Setting up schuduled taks (Task Schedular)
    . Using queues for handling time-consuming tasks
    . Dispatching jobs and processing queues .

        . Generating Markdown Mailables
            php artisan make:mail NewRecipeShared --markdown=mail.recipes.new-recipe

        Send email using  Mailable  - Take so long to send email to user
        Send email using  queues  
            php artisan queue:work

# FILE STORAGE
    . File strorage configuration (local, public etc)
        FILESYSTEM_DISK=local
        config/filesystems.php

    1:  LOCAL STORAGE
            storage/app/private
            Increase security of acccessing images 
            Recommended way  to do it .

                'local' => [
                    'driver' => 'local',
                    'root' => storage_path('app/private'),
                    'serve' => true,
                    'throw' => false,
                    'report' => false,
                ],

    2: PUBLIC STORAGE
            storage/app/public
                'public' => [
                        'driver' => 'local',
                        'root' => storage_path('app/public'),
                        'url' => env('APP_URL').'/storage',
                        'visibility' => 'public',
                        'throw' => false,
                        'report' => false,
                    ],
            To activate  the symbolic link
                php artisan storage:link

    . Uploading files to the local filesystem
         $image_path= $request->file('image')->store('images', 'public');
    . Retrieving files
        php artisan config:clear
        php artisan optimize
             1 :<td><img src="{{ Storage::url($recipe->image) }}" alt="image"></td>
             2 :<td><img src="{{ Storage::url($recipe->image) }}" alt="image"></td>
    .File downloading
    .File deleting etc

# API DEVELOPMENT WITH LARAVEL 11
    . Settingg up routes for API (api..php)
    . Building API's with resource controllers
    . JSON responses and status codes
    . API authentiation:
            Sanctum for SPA authentication

# DEPLOYMENT 
    . Preparing a Laravel
    . Configuration .env  for production
    . Deployment Laravel on shared hhosting
    . Preparing a Laravel

    NAME : intro-apps





                
