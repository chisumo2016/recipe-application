    php artisan optimize
        . Add Route group  in resources
        .Add relationship  one to Many
            Category ----> Recipes
        Authentication and Authoriization
        Introduction to Laravel built-in authentication system
        Register , login , and logout functionality using starter kits
        Middleware for protectiing routes
        Authorization: For role-based access control
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
