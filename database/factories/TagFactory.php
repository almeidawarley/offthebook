<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $genre_list = ['Blues','Classic Rock','Country','Dance','Disco','Funk','Grunge','Hip-Hop','Jazz','Metal','New Age','Oldies','Other','Pop','R&B','Rap','Reggae','Rock','Techno','Industrial','Alternative','Ska','Death Metal','Pranks','Soundtrack','Euro-Techno','Ambient','Trip-Hop','Vocal','Jazz+Funk','Fusion','Trance','Classical','Instrumental','Acid','House','Game','Sound Clip','Gospel','Noise','Alt. Rock','Bass','Soul','Punk','Space','Meditative','Instrumental Pop','Instrumental Rock','Ethnic','Gothic','Darkwave','Techno-Industrial','Electronic','Pop-Folk','Eurodance','Dream','Southern Rock','Comedy','Cult','Gangsta Rap','Top 40','Christian Rap','Pop/Funk','Jungle','Native American','Cabaret','New Wave','Psychedelic','Rave','Showtunes','Trailer','Lo-Fi','Tribal','Acid Punk','Acid Jazz','Polka','Retro','Musical','Rock & Roll','Hard Rock','Folk','Folk-Rock','National Folk','Swing','Fast-Fusion','Bebop','Latin','Revival','Celtic','Bluegrass','Avantgarde','Gothic Rock','Progressive Rock','Psychedelic Rock','Symphonic Rock','Slow Rock','Big Band','Chorus','Easy Listening','Acoustic','Humour','Speech','Chanson','Opera','Chamber Music','Sonata','Symphony','Booty Bass','Primus','Porn Groove','Satire','Slow Jam','Club','Tango','Samba','Folklore','Ballad','Power Ballad','Rhythmic Soul','Freestyle','Duet','Punk Rock','Drum Solo','A Cappella','Euro-House','Dance Hall','Goa','Drum & Bass','Club-House','Hardcore','Terror','Indie','BritPop','Afro-Punk','Polsk Punk','Beat','Christian Gangsta Rap','Heavy Metal','Black Metal','Crossover','Contemporary Christian','Christian Rock','Merengue','Salsa','Thrash Metal','Anime','JPop','Synthpop','Abstract','Art Rock','Baroque','Bhangra','Big Beat','Breakbeat','Chillout','Downtempo','Dub','EBM','Eclectic','Electro','Electroclash','Emo','Experimental','Garage','Global','IDM','Illbient','Industro-Goth','Jam Band','Krautrock','Leftfield','Lounge','Math Rock','New Romantic','Nu-Breakz','Post-Punk','Post-Rock','Psytrance','Shoegaze','Space Rock','Trop Rock','World Music','Neoclassical','Audiobook','Audio Theatre','Neue Deutsche Welle','Podcast','Indie Rock','G-Funk','Dubstep','Garage Rock','Psybient'];
    return [
        'name' => $faker->randomElement($genre_list),
        'description' => $faker->text(40)
    ];
});
