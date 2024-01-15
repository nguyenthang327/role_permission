@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$title ?? ''}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>
                        @dump($permissionOfUser)
                        <h2>Chức năng Department</h2>
                        <a href="#" class="btn {{ in_array('department.index', $permissionOfUser) ? '' : 'disabled' }}">Index</a>
                        <a href="#" class="btn {{ in_array('department.create', $permissionOfUser) ? '' : 'disabled' }}">Create</a>
                        <a href="#" class="btn {{ in_array('department.detail', $permissionOfUser) ? '' : 'disabled' }}">detail</a>
                        <a href="#" class="btn {{ in_array('department.edit', $permissionOfUser) ? '' : 'disabled' }}">edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
