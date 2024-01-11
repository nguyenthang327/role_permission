@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ROLE DETAIL</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @php
                            $oldPermissionID = collect($role->permissions)
                                ->pluck('id')
                                ->toArray();

                        @endphp
                        <form action="{{ route('role.create', ['id' => $role->id]) }}" method="POST">
                            @csrf
                            <div class="tree">
                                <ul>
                                    @foreach ($permissions as $index => $value)
                                        <li>
                                            <input type="checkbox" name="flags[]" id="item{{ $value->code }}"
                                                value="{{ $value->id }}" {{ in_array($value->id, $oldPermissionID) ? 'checked' : '' }}>
                                            <label for="item{{ $value->code }}">{{ $value->name }}</label>
                                            @include('permission-item', [
                                                'permissions' => $value->childPermission,
                                                'oldPermissionID' => $oldPermissionID,
                                            ])
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="submit">Lưu</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
