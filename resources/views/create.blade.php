@extends('templates.template')

@section('content')
    <h1 class="text-center">
        @if (isset($book)) Editar @else Cadastrar @endif
    </h1>
    <div class="col-8 m-auto">
        @if (isset($errors) && count($errors) > 0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach ($errors->all() as $erro)
                    {{ $erro }}
                    <br>
                @endforeach
            </div>
        @endif
        @if (isset($book))
            <form name="formEdit" id="formEdit" method="post" action="{{ url("/books/$book->id") }}">
            @method('PUT')
        @else
          <form name="formCad" id="formCad" method="post" action="{{ url('/books') }}">
        @endif
        @csrf
        <input type="text" name="title" id="title" placeholder="Título do Livro" value="{{$book->title ?? ''}}" class="form-control" required><br>
        <select name="id_user" id="id_user" class="form-control mb-4" required>
            <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? 'Autor'}}</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <input type="text" name="pages" id="pages" placeholder="Páginas do Livro" value="{{$book->pages ?? ''}}" class="form-control" required><br>
        <input type="text" name="price" id="price" placeholder="Preço do Livro" value="{{$book->price ?? ''}}" class="form-control" required><br>
        <input class="btn btn-primary" type="submit" value="@if (isset($book)) Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection
