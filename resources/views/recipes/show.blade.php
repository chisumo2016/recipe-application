<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->name }}
        </h2>
    </x-slot>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <a href="{{  route('recipes.index') }}" class="btn btn-primary"> Back</a>
            </div>
            <div class="card-body">
                <p><img src="{{ asset('storage/'.$recipe->image) }}" alt="image" width="350px" height="350px" class="rounded-md mb-5"></p>
                <p><strong>Description:</strong>{{ $recipe->description }}</p>
                <p><strong>Instruction:</strong>{{ $recipe->instructions }}</p>
                <p><strong>Ingredients:</strong>{{ $recipe->ingredients }}</p>
                <p><strong>Category:</strong> <span class="badge bg-success">{{$recipe->category->name}}</span></p>
            </div>
        </div>
    </div>
</x-app-layout>
