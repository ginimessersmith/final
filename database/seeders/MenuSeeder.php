<?php

namespace Database\Seeders;

use App\Models\Pizza;
use App\Models\Tamano;
use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $premium = Categoria::create([
            'nombre' => 'PREMIUM'
        ]);

        $normales = Categoria::create([
            'nombre' => 'NORMALES'
        ]);

        $pequeño = Tamano::create([
            'nombre' => 'PEQUEÑA'
        ]);

        $grande = Tamano::create([
            'nombre' => 'GRANDE'
        ]);

        //pizzas especiales
        Pizza::create([
            'nombre' => 'CHESSEBURGER - GRANDE',
            'precio' => 56.00,
            'imagen_url' => "https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493528/pizzeria/qwhlhvxiaemrjwvf21ss.jpg",
            'descripcion' => 'CARNE MOLIDA, TOCINO Y CHEDDAR.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CHESSEBURGER - PEQUEÑA',
            'precio' => 32.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493528/pizzeria/qwhlhvxiaemrjwvf21ss.jpg',
            'descripcion' => 'CARNE MOLIDA, TOCINO Y CHEDDAR.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '4 QUESOS - GRANDE',
            'precio' => 56.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493532/pizzeria/if98nvy8xkessonljxzr.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '4 QUESOS - PEQUEÑA',
            'precio' => 32.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493532/pizzeria/if98nvy8xkessonljxzr.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'STROGONOFF - GRANDE',
            'precio' => 54.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493530/pizzeria/td8bjr0ox2pocvtgokao.jpg',
            'descripcion' => 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'STROGONOFF - PEQUEÑA',
            'precio' => 30.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493530/pizzeria/td8bjr0ox2pocvtgokao.jpg',
            'descripcion' => 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CARNIVORA - GRANDE',
            'precio' => 54.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493529/pizzeria/mlnixmxpavzjfnhohmpz.jpg',
            'descripcion' => 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CARNIVORA - PEQUEÑA',
            'precio' => 30.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493529/pizzeria/mlnixmxpavzjfnhohmpz.jpg',
            'descripcion' => 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'PERNIL - GRANDE',
            'precio' => 52.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493532/pizzeria/ehitr7ultelz5fjw8ero.jpg',
            'descripcion' => 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'PERNIL - PEQUEÑA',
            'precio' => 28.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493532/pizzeria/ehitr7ultelz5fjw8ero.jpg',
            'descripcion' => 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '3 QUESOS - GRANDE',
            'precio' => 50.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493526/pizzeria/l9iyntcs2o6cwghwcsiq.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR Y REQUESÓN.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '3 QUESOS - PEQUEÑA',
            'precio' => 28.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493526/pizzeria/l9iyntcs2o6cwghwcsiq.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR Y REQUESÓN.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $premium->id
        ]);

        //pizzas ordinarias

        Pizza::create([
            'nombre' => 'CALABRESA - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493527/pizzeria/eeqbo7nhefy1jv1w1cim.jpg',
            'descripcion' => 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'CALABRESA - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493527/pizzeria/eeqbo7nhefy1jv1w1cim.jpg',
            'descripcion' => 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'AMERICANA - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493527/pizzeria/u8ydowdqhruit381gxzu.jpg',
            'descripcion' => 'HUEVO, TOCINO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'AMERICANA - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493527/pizzeria/u8ydowdqhruit381gxzu.jpg',
            'descripcion' => 'HUEVO, TOCINO Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'PEPERONI - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493529/pizzeria/kvrwvvcvtmvoguk2rdm6.jpg',
            'descripcion' => 'PEPERONI Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'PEPERONI - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493529/pizzeria/kvrwvvcvtmvoguk2rdm6.jpg',
            'descripcion' => 'PEPERONI Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'VEGETARIANA - GRANDE',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493533/pizzeria/t9bdwuqspvtcso59kekw.jpg',
            'descripcion' => 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'VEGETARIANA - PEQUEÑA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493533/pizzeria/t9bdwuqspvtcso59kekw.jpg',
            'descripcion' => 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'HAWAIANA - GRANDE',
            'precio' => 46.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493527/pizzeria/llm2z1ycj1ku9ruubemu.jpg',
            'descripcion' => 'JAMÓN, PIÑA Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'HAWAIANA - PEQUEÑA',
            'precio' => 24.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493527/pizzeria/llm2z1ycj1ku9ruubemu.jpg',
            'descripcion' => 'JAMÓN, PIÑA Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'CLÁSICA - GRANDE',
            'precio' => 44.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493526/pizzeria/xb7r457wz28ujgn8djk6.jpg',
            'descripcion' => 'JAMÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'CLÁSICA - PEQUEÑA',
            'precio' => 24.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493526/pizzeria/xb7r457wz28ujgn8djk6.jpg',
            'descripcion' => 'JAMÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'MARGARITA - GRANDE',
            'precio' => 40.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493530/pizzeria/qgfmnxejfy1yiipda3rx.jpg',
            'descripcion' => 'TOMATE Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'MARGARITA - PEQUEÑA',
            'precio' => 22.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493530/pizzeria/qgfmnxejfy1yiipda3rx.jpg',
            'descripcion' => 'TOMATE Y MOZZARELLA.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'ECONÓMICA - GRANDE',
            'precio' => 38.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493529/pizzeria/hbm4q94knc15ondk0uru.jpg',
            'descripcion' => 'MOZZARELLA Y ORÉGANO.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normales->id
        ]);

        Pizza::create([
            'nombre' => 'ECONÓMICA - PEQUEÑA',
            'precio' => 22.00,
            'imagen_url' => 'https://res.cloudinary.com/dcysqd4ad/image/upload/v1720493529/pizzeria/hbm4q94knc15ondk0uru.jpg',
            'descripcion' => 'MOZZARELLA Y ORÉGANO.',
            'tamano_id' => $pequeño->id,
            'categoria_id' => $normales->id
        ]);
    }
}
