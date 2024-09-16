<li>
    <a href="index.html">{{ $catalogue->name }}</a>
    @if ($catalogue->children->isNotEmpty())
        <ul class="sub-menu">
            @foreach ($catalogue->children as $children)
                <li>
                    <a href="index.html">{{ $children->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</li>
