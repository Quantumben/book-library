@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome Back Admin') }}</div>

                    <form action="{{route('add-books')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="Book Title" class="col-sm-2 col-form-label">Book Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Name of Author" class="col-sm-2 col-form-label">Name of Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="author">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="Select File" class="col-sm-2 col-form-label">Select File</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Submit File</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    @endsection
