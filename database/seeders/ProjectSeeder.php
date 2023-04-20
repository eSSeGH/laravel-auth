<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) {

            $project = new Project();
            $project->title = $faker->unique->sentence( $faker->numberBetween(3,6) );
            $project->description = $faker->optional()->text( $faker->numberBetween(20,50) );
            $project->client_name = $faker->randomElement(['Sig. Rossi','Sig. Verdi', 'Sig. Bianchi', 'Sig. Gialli', 'Sig. Negri']);
            $project->client_tel = $faker->numberBetween(3331111111,3399999999);
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
