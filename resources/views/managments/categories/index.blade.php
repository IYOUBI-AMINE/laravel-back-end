@extends('layouts.app')

@section("content")
        
    <div class="container">
        <a href="{{ route('home') }}" class="btn btn-secondary">
            <i class="fas fa-home"></i> Home
        </a><hr>
        <div class="row justify-content-center">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.sidebar')
                            </div>
                                <!-- Button to go back to the home page -->
                               
                            <div class="col-md-8">
                                
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    
                                    <h3 class="text-secondary">
                                        <i class="fas fa-th-list"></i> Catégories
                                    </h3>
                                    <a href="{{ route("categories.create") }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Titre</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    {{ $category->id }}
                                                </td>
                                                <td>
                                                    {{ $category->title }}
                                                </td>
                                                <td class="d-flex flex-row justify-content-center align-items-center">
                                                    <a href="{{ route("categories.edit",$category->slug) }}" class="btn btn-warning mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="{{ $category->id }}" action="{{ route("categories.destroy",$category->slug) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="
                                                                event.preventDefault();
                                                                if(confirm('Voulez vous supprimer la catégorie {{ $category->title }} ?'))
                                                                document.getElementById({{ $category->id }}).submit()
                                                            "
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
