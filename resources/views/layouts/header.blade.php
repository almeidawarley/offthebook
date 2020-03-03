<div class = "navbar-fixed">
    <nav class = "cyan darken-3 white-text">
        <div class = "nav-wrapper">
            <a hreF = "{{route('homepage')}}" class = "brand-logo center"><i class = "medium material-icons">library_music</i> {{ config('app.name') }}</a>
            <a href = "#!" data-target = "mobile-demo" class = "sidenav-trigger"><i class = "material-icons">menu</i></a>
            <ul class = "right hide-on-med-and-down">
                <li><a href = "{{route('songs.index')}}">Songs</a></li>
                <li><a href = "{{route('chords.index')}}">Chords</a></li>
                <li><a href = "{{route('tags.index')}}">Tags</a></li>
                <li><a></a></li>
            </ul>
        </div>
    </nav>                
</div>
<div class = "sidenav"  id = "mobile-demo">
    <p class = "center">Índices</p>
    <ul class = "center-align">
        <li><a href = "{{route('songs.index')}}">Songs</a></li>
        <li><a href = "{{route('chords.index')}}">Chords</a></li>
        <li><a href = "{{route('tags.index')}}">Tags</a></li>
    </ul>
</div>