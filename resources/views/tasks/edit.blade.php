@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar tarea</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <form action=""{{route('update', ['id' => $task->id])}}"" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label>Título *</label>
                            <input type="text" name="title" class="form-control" required value="{{old('title', $task->title)}}">
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group">
                            <label>Contenido *</label>
                            <textarea name="body" id="body" rows="6" class="form-control" required>{{old('body', $task->body)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Contenido embedido</label>
                            <textarea name="iframe" id="iframe" class="form-control">{{old('iframe', $task->iframe)}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
