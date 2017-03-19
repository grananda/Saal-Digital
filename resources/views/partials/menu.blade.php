<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <form class="form-inline" method="POST" action="/objects/search">
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group ">
                <input type="text" class="form-control" id="param" name="param">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
        <a href="/">All the objects</a> /
        <a href="/objects/create">Add new object</a>
    </div>
</div>
