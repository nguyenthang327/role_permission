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
                    </div>


                    <div>
                        <h2>Chức năng product</h2>
                        <a href="#" class="btn {{ in_array('product.index', $permissionOfUser) ? '' : 'disabled' }}">Danh sách</a>
            
                        <a href="#" class="btn {{ in_array('product.create', $permissionOfUser) ? '' : 'disabled' }}">Create</a>

                        <a href="#" class="btn {{ in_array('product.detail', $permissionOfUser) ? '' : 'disabled' }}">detail</a>

                        <a href="#" class="btn {{ in_array('product.detail_base', $permissionOfUser) ? '' : 'disabled' }}">detail base</a>

                        <a href="#" class="btn {{ in_array('product.edit_base', $permissionOfUser) ? '' : 'disabled' }}">edit base</a>

                        <a href="#" class="btn {{ in_array('product.edit_detail', $permissionOfUser) ? '' : 'disabled' }}">edit detail</a>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
