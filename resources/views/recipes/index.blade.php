<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Recipes
        </h2>
    </x-slot>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success p-1">{{ session('success') }}</div>
                @endif
                    @if(session('error'))
                        <div class="alert alert-danger p-1">{{ session('error') }}</div>
                    @endif

                <a href="{{ route('recipes.create') }}" class="btn btn-primary "> Add New Recipes</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Recipe Image</th>
                            <th>Recipe Name</th>
                            <th>Description</th>
                            <th>Ingredients</th>
                            <th>instructions</th>
                            <th>Category</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                            <tr>
                                <td><img src="{{ asset('storage/'.$recipe->image) }}" alt="image" width="50px" height="50px"></td>
                                <td>{{ $recipe->name }}</td>
                                <td>{{ $recipe->description }}</td>
                                <td>{{ $recipe->ingredients }}</td>
                                <td>{{ $recipe->instructions }}</td>
                                <td><span class="badge bg-success">{{$recipe->category->name}}</span></td>
                                <td>{{ date('m/d/Y H:m:i', strtotime($recipe->created_at)) }}</td>

                                <td>
                                    <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-success">View</a>
                                    <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('recipes.destroy',$recipe) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure ? ')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
                    {{ $recipes->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
