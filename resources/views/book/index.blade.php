@extends('book.master')

@section('title')
    <title>Book Lists</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
            <h2 class="text-center mt-4">
        <b>Book Listing Page</b>
    </h2>
        @if (session()->has('success'))
        <div class="col-3 offset-9">
            <div class="alert alert-sm alert-success alert-dismissible fade show text-center" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
        @endif
    </div>


    <div class="">
        <a href="{{ route('book.create') }}" class="btn btn-primary float-end my-3">Create Book</a>
        <table id="books-table" class="">
            <thead>
                <tr>
    
                    <th>Idx</th>
                    <th>Book Name</th>
                    <th>Content Owner</th>
                    <th>Publisher</th>
                    <th>Created Time</th>
                    <th>Option</th>
        
                    
                    <!-- Add more headers as needed -->
                </tr>
            </thead>
        
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->book_uniq_idx }}</td>
                        <td>{{ $book->bookname }}</td>
                        <td>{{ $book->contentOwner->name }}</td>
                        <td>{{ $book->publisher->name }}</td>
                        <td>{{ $book->created_timetick }}</td>
                        <th>
                            <a href="{{ route('book.edit', $book->idx) }}" class="btn btn-sm btn-secondary ">Edit</a>
    
                            <form action="{{ route('book.destroy', $book->idx) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


@section('script')
<script>
let table = new DataTable('#books-table');
</script>
@endsection