<small>
    <a href="/objects/{{ $item->id }}/edit">edit object</a> |
    <a href="#" onclick="event.preventDefault();
            document.getElementById('delete-form-{{ $item->id }}').submit();">delete object</a>
    <form id="delete-form-{{ $item->id }}" action="/objects/{{ $item->id }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
    </form>
</small>
