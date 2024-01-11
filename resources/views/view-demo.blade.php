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
                        @if(in_array('department.create', $permissionOfUser))
                            <a href="#">Create</a>
                        @endif

                        @if(in_array('department.detail', $permissionOfUser))
                            <a href="#">detail</a>
                        @endif

                        @if(in_array('department.edit', $permissionOfUser))
                            <a href="#">edit</a>
                        @endif
                    </div>


                    <div>
                        <h2>Chức năng product</h2>
                        @if(in_array('product.create', $permissionOfUser))
                            <a href="#">Create</a>
                        @endif

                        @if(in_array('product.detail', $permissionOfUser))
                            <a href="#">detail</a>
                        @endif

                        @if(in_array('product.detail_base', $permissionOfUser))
                            <a href="#">detail base</a>
                        @endif

                        @if(in_array('product.edit_base', $permissionOfUser))
                            <a href="#">edit base</a>
                        @endif

                        @if(in_array('product.edit_detail', $permissionOfUser))
                            <a href="#">edit detail</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
