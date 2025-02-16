@extends('layouts.app-layout')

@section('content')
    <div class="container">
        <div class="card mt-2">
            <div class="card-header">
                <h1>Edit Recipe</h1>
                <a href="{{  route('recipes.index') }}" class="btn btn-primary"> Back</a>
            </div>

            <div class="card-body">
                <form action="{{ route('recipes.update', $recipe) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ $recipe->name }}" placeholder="Enter Name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea
                            class="form-control"
                            id="description"
                            name="description"
                            rows="3">{{ $recipe->description }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="instructions" class="form-label">Instructions</label>
                        <textarea
                            class="form-control"
                            id="instructions"
                            name="instructions"
                            rows="3">{{ $recipe->instructions }}</textarea>
                        @error('instructions')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Ingredients</label>
                        <textarea
                            class="form-control"
                            id="ingredients"
                            name="ingredients"
                            rows="3">{{ $recipe->ingredients }}</textarea>
                        @error('ingredients')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

