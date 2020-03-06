<div class="container">
    <div class="row">
        <div class="col l8 s12">
            <h5 class="white-text"> {{ config('app.name') }} </h5>
            <p>
                The open-source digital songbook that meets your needs.
            </p>
            <p>
                Use it in your band, your church, or simply for yourself.
            </p>
        </div>
        <div class="col l2 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
                <li><a class="white-text" href="{{route('songs.index')}}">Songs</a></li>
                <li><a class="white-text" href="{{route('tags.index')}}">Tags</a></li>
                <li><a class="white-text" href="{{route('listings.index')}}">Listings</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="footer-copyright">
    <div class="container center-align">
        Developed by <a class="grey-text" href="https://github.com/almeidawarley">Warley Almeida</a>.
    </div>
</div>
