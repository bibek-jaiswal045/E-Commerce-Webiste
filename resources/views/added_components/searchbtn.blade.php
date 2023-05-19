    <form method="GET" action="{{route('homepage' )}}">
        <input type="text" name="search" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search your product" value="{{request('search')}}">
    </form>