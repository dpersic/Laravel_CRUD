@extends('posts.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Dodaj novi post</a>
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
            <th>R.Br</th>
            <th>Naziv</th>
            <th>Opis</th>
            <th width="280px">Mogućnosti</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>
                <form action="{{ route('posts.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Prikaz</a>    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Uredi</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Obriši</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection