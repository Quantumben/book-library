@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome Back Admin') }}</div>

                    {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as an Admin!') }}

                </div> --}}




                </div>



                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Book Name</th>
                            <th scope="col">Author Name</th>
                            <th scope="col">File</th>
                            <th scope="col">Add New Book</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $Book)
                        <tr>

                                <th scope="row">{{$Book->id}}</th>
                                <td>{{ $Book->name }}</td>
                                <td>{{ $Book->author }}</td>
                                <td>{{ $Book->file }}</td>
                                {{-- <td>  <a href="{{route('add-books')}}" class="btn btn-primary" </a>Add New Book</a> </td> --}}
                                <td> <a href="{{route('add-books')}}" class="btn btn-primary" >Add Book</a></td>
                                <td> <a href="{{route('add-books')}}" class="btn btn-primary" >Edit Book</a></td>

                                 {{-- <form method="post">
                                    {{ method_field('delete')}}
                                    @csrf

                                    <td> <a href="delete-book/{{$Book->id}}" class="btn btn-danger"> Delete </a></td>
                                 </form> --}}

                                 <form action="{{route('delete-book',$Book->id)}}" method="post">
                                    @csrf
                                    {{method_field('delete')}}
                                  <td>  <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button> </td>
                                    </form>
                                </tr>
                        @endforeach


                    </tbody>
                </table>



            </div>
        </div>
    </div>
@endsection
