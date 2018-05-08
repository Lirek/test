<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('tags')->insert([
        	['tags_name' => 'Bolero','type_tags' => 'Musica'],
        	['tags_name'=> 'Bossa nova','type_tags' => 'Musica'],
        	['tags_name'=> 'Break-beat','type_tags' => 'Musica'],
        	['tags_name'=> 'Calypso','type_tags' => 'Musica'],
        	['tags_name'=> 'Cancion de protesta','type_tags' => 'Musica'],
        	['tags_name'=> 'Candombia','type_tags' => 'Musica'],
        	['tags_name'=> 'Cool-Jazz','type_tags' => 'Musica'],
        	['tags_name'=> 'Country','type_tags' => 'Musica'],
        	['tags_name'=> 'Cumbia','type_tags' => 'Musica'],
        	['tags_name'=> 'Dance','type_tags' => 'Musica'],
        	['tags_name'=> 'Dancehall','type_tags' => 'Musica'],
        	['tags_name'=> 'Deep house','type_tags' => 'Musica'],
        	['tags_name'=> 'Disco','type_tags' => 'Musica'],
        	['tags_name'=> 'Electroacustica','type_tags' => 'Musica'],
        	['tags_name'=> 'Etno-rock','type_tags' => 'Musica'],
        	['tags_name'=> 'Eurobeat','type_tags' => 'Musica'],
        	['tags_name'=> 'Flamenco','type_tags' => 'Musica'],
        	['tags_name'=> 'Folk','type_tags' => 'Musica'],
			['tags_name'=> 'Free-Jazz','type_tags' => 'Musica'],
        	['tags_name'=> 'Gabber','type_tags' => 'Musica'],
        	['tags_name'=> 'Garage','type_tags' => 'Musica'],
        	['tags_name'=> 'Grunge','type_tags' => 'Musica'],
        	['tags_name'=> 'Hip-Hop','type_tags' => 'Musica'],
        	['tags_name'=> 'House','type_tags' => 'Musica'],
        	['tags_name'=> 'Jazz','type_tags' => 'Musica'],
        	['tags_name'=> 'Mambo','type_tags' => 'Musica'],
        	['tags_name'=> 'Merengue tipico','type_tags' => 'Musica'],
        	['tags_name'=> 'Merengue urbano','type_tags' => 'Musica'],
        	['tags_name'=> 'Musica concreta','type_tags' => 'Musica'],
        	['tags_name'=> 'Musica electrónica','type_tags' => 'Musica'],
        	['tags_name'=> 'Musica minimalista','type_tags' => 'Musica'],
        	['tags_name'=> 'New age','type_tags' => 'Musica'],
        	['tags_name'=> 'Nueva onda','type_tags' => 'Musica'],
        	['tags_name'=> 'Ópera','type_tags' => 'Musica'],
        	['tags_name'=> 'Pop','type_tags' => 'Musica'],
        	['tags_name'=> 'Punk','type_tags' => 'Musica'],
        	['tags_name'=> 'Ragtime','type_tags' => 'Musica'],
        	['tags_name'=> 'Ranchero','type_tags' => 'Musica'],
        	['tags_name'=> 'Rap','type_tags' => 'Musica'],
        	['tags_name'=> 'Reggae','type_tags' => 'Musica'],
        	['tags_name'=> 'Reggaeton','type_tags' => 'Musica'],
        	['tags_name'=> 'Rhythm and Blues (R&B)','type_tags' => 'Musica'],
        	['tags_name'=> 'Rock','type_tags' => 'Musica'],
        	['tags_name'=> 'Rock Alternativo','type_tags' => 'Musica'],
        	['tags_name'=> 'Rock and Roll','type_tags' => 'Musica'],
        	['tags_name'=> 'Rock Mestizo','type_tags' => 'Musica'],
        	['tags_name'=> 'Rock Progresivo','type_tags' => 'Musica'],
        	['tags_name'=> 'Rock sinfonico','type_tags' => 'Musica'],
        	['tags_name'=> 'Salsa','type_tags' => 'Musica'],
        	['tags_name'=> 'Salsa choque','type_tags' => 'Musica'],
        	['tags_name'=> 'Samba','type_tags' => 'Musica'],
        	['tags_name'=> 'Sicodelica','type_tags' => 'Musica'],
        	['tags_name'=> 'Ska','type_tags' => 'Musica'],
        	['tags_name'=> 'Soul','type_tags' => 'Musica'],
        	['tags_name'=> 'Swing','type_tags' => 'Musica'],
        	['tags_name'=> 'Tango','type_tags' => 'Musica'],
        	['tags_name'=> 'Tecno','type_tags' => 'Musica'],
        	['tags_name'=> 'Trance','type_tags' => 'Musica'],
        	['tags_name'=> 'Trancecore','type_tags' => 'Musica'],
        	['tags_name'=> 'Trash metal','type_tags' => 'Musica'],
        	['tags_name'=> 'Trip-hop','type_tags' => 'Musica'],
        	['tags_name'=> 'Trova','type_tags' => 'Musica'],
        	['tags_name'=> 'Underground','type_tags' => 'Musica'],
        	['tags_name'=> 'Vallenato','type_tags' => 'Musica'],
        	['tags_name'=> 'Woogie','type_tags' => 'Musica'],
        	['tags_name'=> 'World music','type_tags' => 'Musica'],
        	['tags_name'=> 'Ye-yé','type_tags' => 'Musica'],
        	['tags_name'=> 'Zarzuela','type_tags' => 'Musica'],

        	['tags_name'=> 'Acción','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Animado','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Aventura','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Catástrofe','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Comedia','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Drama','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Erótico','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Fantasía','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Ficción','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Misterio','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Musical','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Religioso','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Romántico','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Suspenso','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Terror','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Infantil','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Juvenil','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Adulto','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Familiar','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Mudo','type_tags' => 'Peliculas'],
        	['tags_name'=> '2D','type_tags' => 'Peliculas'],
        	['tags_name'=> '3D','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Biográfico','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Documental','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Histórico','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Cortometraje','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Largometraje','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Cine de autor','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Cine independiente','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Cine experimental','type_tags' => 'Peliculas'],
        	['tags_name'=> 'Crimen','type_tags' => 'Peliculas'],

            ['tags_name'=> 'Adultos‎','type_tags' => 'Revistas'],
            ['tags_name'=> 'Automóvil‎isticas','type_tags' => 'Revistas'],
            ['tags_name'=> 'Ciencias','type_tags' => 'Revistas'],
            ['tags_name'=> 'Economia','type_tags' => 'Revistas'],
            ['tags_name'=> 'Culturales','type_tags' => 'Revistas'],
            ['tags_name'=> 'Deportivas','type_tags' => 'Revistas'],
            ['tags_name'=> 'Entretenimiento','type_tags' => 'Revistas'],
            ['tags_name'=> 'Femeninas','type_tags' => 'Revistas'],
            ['tags_name'=> 'Fotografia','type_tags' => 'Revistas'],
            ['tags_name'=> 'Gastronomia','type_tags' => 'Revistas'],
            ['tags_name'=> 'Humor','type_tags' => 'Revistas'],
            ['tags_name'=> 'Informatica','type_tags' => 'Revistas'],
            ['tags_name'=> 'Romanticas','type_tags' => 'Revistas'],
            ['tags_name'=> 'Interes General','type_tags' => 'Revistas'],
            ['tags_name'=> 'LGBT‎','type_tags' => 'Revistas'],
            ['tags_name'=> 'Moda','type_tags' => 'Revistas'],
            ['tags_name'=> 'Musica','type_tags' => 'Revistas'],
            ['tags_name'=> 'Infantiles','type_tags' => 'Revistas'],
            ['tags_name'=> 'Politica','type_tags' => 'Revistas'],
            ['tags_name'=> 'Pseudociencia','type_tags' => 'Revistas'],
            ['tags_name'=> 'Religion','type_tags' => 'Revistas'],
            ['tags_name'=> 'Informativa','type_tags' => 'Revistas'],
            ['tags_name'=> 'Otros','type_tags' => 'Revistas'],
            ['tags_name'=> 'Poesía','type_tags' => 'Revistas'],
            ['tags_name'=> 'Policíacas','type_tags' => 'Revistas'],
            ['tags_name'=> 'Políticas','type_tags' => 'Revistas']




       ]);
    }
}
























