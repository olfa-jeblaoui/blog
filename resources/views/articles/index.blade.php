@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br> <br>
            <div class="pull-left">
                <h2> CRUD article</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Creer nouveau article.</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($articles as $article)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->body }}</td>
            <td>
                <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                    @csrf
   
                    <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $articles->links() !!}
      
@endsection