@extends('layouts.app-layout')

@section('content')
    <div class="container">
        <div class="card mt-2">
            <div class="card-header">
                <h1>Create Recipe</h1>
                <a href="{{  route('recipes.index') }}" class="btn btn-primary"> Back</a>
            </div>

            <div class="card-body">
                <form action="{{ route('recipes.store') }}" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder="Enter Name">
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
                        rows="3"></textarea>
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
                        rows="3"></textarea>
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
                        rows="3"></textarea>
                    @error('ingredients')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                    <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
