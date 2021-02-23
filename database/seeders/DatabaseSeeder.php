<?php

namespace Database\Seeders;

// Hay que declarar DB para usarlo
use DB;
// Necesario para usar los modelos de usuario y libro
use App\Models\Libro;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $libros = array(
		array(
			'titulo' => 'Don Quixote de la Mancha I',
			'anio' => '1605', 
			'escritor' => 'Miguel de Cervantes Saavedra', 
			'portada' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1330094687l/1525808.jpg', 
			'disponible' => true, 
			'descripcion' => 'El ingenioso hidalgo don Quijote de la Mancha narra las aventuras de Alonso Quijano, un hidalgo pobre que de tanto leer novelas de caballería acaba enloqueciendo y creyendo ser un caballero andante, nombrándose a sí mismo como don Quijote de la Mancha. Sus intenciones son ayudar a los pobres y desfavorecidos, y lograr el amor de la supuesta Dulcinea del Toboso, que es en realidad es una campesina llamada Aldonza Lorenzo. Decide nombrar a Sancho Panza, un empleado suyo, su escudero. Juntos viven muchas aventuras y tras ser vencido por el Caballero de la Blanca Luna se retira a su hogar, donde, tras adquirir de nuevo la cordura, fallece.'
		),
		array(
			'titulo' => 'Don Quixote de la mancha II',
			'anio' => '1615', 
			'escritor' => 'Miguel de Cervantes Saavedra', 
			'portada' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1347607129l/1382974.jpg', 
			'disponible' => false, 
			'descripcion' => 'Publicada su segunda parte con el título de El ingenioso caballero Don Quijote de la Mancha en 1615, diez años después de la primera parte, durante los últimos años de vida del autor, en parte como respuesta a la falsa segunda parte del Quijote de Alonso Fernández de Avellaneda en 1614, acerca la cual Cervantes escribió irónicamente en el Prólogo. Es la obra literaria más influyente no solo de la Era de Oro de la Literatura Española, pero también de toda literatura en la lengua española. El Quijote es una obra fundadora de la Literatura Occidental, siendo parte del Canon Occidental, siendo considerada la novela moderna, además de ser la más leída después de la Biblia. Es la primera obra genuinamente desmitificadora de la tradición caballeresca y cortés por su tratamiento burlesco. Representa la primera novela moderna y la primera novela polifónica; como tal, ejerció un enorme influjo en toda la narrativa europea.'
		),
		array(
			'titulo' => 'La Celestina',
			'anio' => '1499', 
			'escritor' => 'Fernando de Rojas', 
			'portada' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1405559122l/214858.jpg', 
			'disponible' => false, 
			'descripcion' => 'La loca pasión por Melibea, hija de un rico mercader, lleva al joven Calisto a romper todas las barreras morales y a aliarse con una vieja alcahueta y hechicera, Celestina. El amor es, pues, una pasión que lo mueve todo. Los señores aman según los cánones del amor cortés, y los criados se mueven en el inframundo de los prostíbulos, pero tanto unos como otros sienten el gozo y placer de vivir, y este amor lujurioso los conducirá a todos a la destrucción y a la muerte. Reflejo de una sociedad conflictiva, La Celestina, obra a caballo entre la novela y la obra dramática, abre las puertas a nuevos aires y tiempos nuevos, y su autor, Fernando de Rojas, crea con ella uno de los grandes mitos de la literatura universal.'
		)
	);
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //self::seedBiblioteca();
        //$this->command->info('Tabla biblioteca inicializada con datos');

        self::seedUsuarios();
        $this->command->info('Tabla usuarios inicializada con exito');
    }

    // Este metodo es solo para iniciaizar la tbala biblioteca con algunos libros
    public function seedBiblioteca(){
        // Se borra el cntenido actual antes de meter nuevo
        DB::table('libros')->delete();

        foreach( $this->libros as $libro ) {
            $p = new Libro;
            $p->titulo = $libro['titulo'];
            $p->anio = $libro['anio'];
            $p->escritor = $libro['escritor'];
            $p->portada = $libro['portada'];
            $p->disponible = $libro['disponible'];
            $p->descripcion = $libro['descripcion'];
            $p->save();
        }
    }

    // Este metodo es solo para iniciaizar la tabla usuarios con algunos usuarios
    public function seedUsuarios(){
        // Se borra el cntenido actual antes de meter nuevo
        DB::table('users')->delete();

        // Usuario 1
		$user = new User;
		$user->name = "Fulanito";
		$user->email = "fulanito19@loslibrito.test";
		$user->password = bcrypt("123456");
		$user->save();

        // Usuario 2
		$user2 = new User;
		$user2->name = "Menganito";
		$user2->email = "vivamengano@loslibrito.test";
		$user2->password = bcrypt("123456");
		$user2->save();
    }
}
