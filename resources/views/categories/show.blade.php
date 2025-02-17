<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $category->name}}
        </h2>
    </x-slot>

    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h1>{{ $category->name }}</h1>
                <a href="{{  route('recipes.index') }}" class="btn btn-primary"> Back</a>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong>{{ $category->name }}</p>
                <p><strong>Description:</strong>{{ $category->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
