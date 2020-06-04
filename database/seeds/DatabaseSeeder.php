<?php

use App\Models\EasyDesk\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $migrateDefault = (string)$this->command->ask('Deseja resetar a base primeiro?(S/N) Padrao: ', 'N');
        $seedDefault = (string)$this->command->ask('Deseja criar as seeds base?(S/N) Padrao: ', 'N');


        try {

            if ($migrateDefault == 'S' || $migrateDefault == 's') {
                $this->command->info('Resetando base!');
                Artisan::call('migrate:fresh');
                $this->command->info('Base resetada!');
            }

            if ($seedDefault == 'S' || $seedDefault == 's') {
                $this->command->info('Inserindo seeds base!');
                $this->call(PermissionsTableSeeder::class);
                $this->call(RolesTableSeeder::class);
                $this->call(UsersTableSeeder::class);
                $this->call(ModelHasRolesTableSeeder::class);
                $this->call(RoleHasPermissionsTableSeeder::class);
                $this->command->info('Seeds bases inseridas!');
            }

            $this->command->info('Processo concluido com sucesso!');
        } catch (Exception $exception) {
            $this->command->info('Ocorreu um erro durante o processo: '. $exception->getMessage());
        }


    }
}
