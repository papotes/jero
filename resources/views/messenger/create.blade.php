@extends('adminlte::page')

@section('content')
    <h1>Crear mensaje</h1>
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Tema</label>
                <input type="text" class="form-control" name="subject" placeholder="Título del mensaje"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Mensaje</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>

            <div class="form-group">
                <label class="control-label">Incluir usuarios</label>
            </div>

            @if($users->count() > 0)
                <div class="checkbox">
                    @foreach($users as $user)
                        <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                            value="{{ $user->id }}">{!!$user->name!!}</label>
                    @endforeach
                </div>
            @endif
    
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Enviar</button>
            </div>
        </div>
    </form>
@stop
