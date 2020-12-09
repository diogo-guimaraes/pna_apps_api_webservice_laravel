<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('set foreign_key_checks = 0');

        // $this->call(EmpresaTableSeeder::class);
        // $this->call(SiteTableSeeder::class);
        $this->call(TipoTelefoneTableSeeder::class);
        // $this->call(TelefoneTableSeeder::class);

        // $this->call(ValorCategoriaTableSeeder::class);
        // $this->call(ValoresTableSeeder::class);
        // $this->call(TempoTableSeeder::class);
        // $this->call(InsercaoControleTableSeeder::class);
        // $this->call(EmailTableSeeder::class);
        // $this->call(UsuarioEmpresaFkTableSeeder::class);

        DB::statement('set foreign_key_checks = 1');
    }
}
