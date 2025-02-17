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


# TASK SCHEDULING AND QUEUES 
    https://laravel.com/docs/11.x/mail#main-content
    .Introducing to task scheduling
    .Setting up schuduled taks (Task  Schedular)
    .Using queues for handling time-consuming tasks
    .Dispatching jobs and processing queues .

        . Generating Markdown Mailables
            php artisan make:mail NewRecipeShared --markdown=mail.recipes.new-recipe

        Send email using  Mailable  - Take so long to send email to user
        Send email using  queues  
            php artisan queue:work





                
