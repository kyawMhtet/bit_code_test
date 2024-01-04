@extends('book.master')

@section('title')
    <title>Book Lists</title>
@endsection

@section('content')

<div class="container-fluid mt-4">
    <h2 class="text-center">
        <b>Book Listing Page</b>
    </h2>

    <div class="mt-4">
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