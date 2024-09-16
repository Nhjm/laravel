    @php
        $cap = str_repeat(' - ', $level);
    @endphp

    <option @selected(($selected ?? null) == $catalogue->id) value="{{ $catalogue->id }}">{{ $cap }}{{ $catalogue->name }}</option>

    @foreach ($catalogue->children as $children)
        @include('admin.components.option', [
            'catalogue' => $children,
            'level' => $level + 1,
        ])
    @endforeach
