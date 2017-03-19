<ul>
    @foreach ($objectItems as $item)
        <li>
            <a href="/objects/{{ $item->id }}">{{ $item->name }} - <i>({{ $item->type }})</i></a><br/>
            @include('partials.action')
            <p>{{ $item->description }}</p>
        </li>
    @endforeach
</ul>
