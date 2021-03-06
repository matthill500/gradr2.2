@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          College: {{ $college->name }}
        </div>
        <div class="card-body">
        <table class="table table-hover">
          <tbody>

            <tr>
              <td>Name</td>
              <td>{{ $college->name }}</td>
            </tr>
            <tr>
              <td>Phone</td>
              <td>{{ $college->address }}</td>
            </tr>

          </tbody>
        </table>

        <a href="{{ route('admin.colleges.index') }}" class="btn btn-default">Back</a>
        <a href="{{ route('admin.colleges.edit', $college->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action ="{{ route('admin.colleges.destroy', $college->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection
