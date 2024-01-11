<ul>
    @foreach ($permissions as $index => $value)
        <li>
            <input type="checkbox" name="flags[]" id="item{{ $value->id }}" value="{{ $value->id }}"
                {{ in_array($value->id, $oldPermissionID) ? 'checked' : '' }}>
            <label for="item{{ $value->id }}">{{ $value->name }}</label>
            @include('permission-item', [
                'permissions' => $value->childPermission,
                'oldPermissionID' => $oldPermissionID,
            ])
        </li>
    @endforeach
</ul>
