@extends('book.master')


@section('content')


<div class="mt-4 w-50 mx-auto px-4 py-3 border shadow-sm">
    <h4 class="text-center">Edit Book</h4>
    <form action="{{ route('book.update', $book->idx) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Book Name :</label>
            <input type="text" placeholder="Enter Book Name" name="name" value="{{ $book->bookname }}" class="form-control">
        </div>

        <div class="form-group my-3">
            <label for="">Content Owner :</label>
            <select name="co_id" class="form-control">
                <option value="">Select Content Owner</option>
                @foreach ($content_owners as $co)
                    <option value="{{ $co->idx }}" @if ($co->idx == $book->co_id) 
                        selected
                    @endif>{{ $co->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group my-3">
            <label for="">Publisher :</label>
            <select name="publisher_id" class="form-control">
                <option value="">Select Publisher</option>
                @foreach ($publishers as $publisher)
                <option value="{{ $publisher->idx }}" @if ($publisher->idx == $book->publisher->idx)
                    selected
                @endif>{{ $publisher->name }}</option>
                    
                @endforeach
            </select>
        </div>



        <div class="form-group my-3">
            <label for="">Cover Photo :</label> <br>

            <input type="file" name="cover_photo" class="form-control">
            <img src="{{ asset('storage/' . $book->cover_photo) }}" class="img-fluid w-25 my-3" alt="">

        </div>
        
        

        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>


@endsection