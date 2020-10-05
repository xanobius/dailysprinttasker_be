<?php

namespace Database\Seeders;

use App\Models\Sprint;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('asd123')
        ]);
        $token = $user->createToken('access-token');
        $this->command->alert('Token : '. $token->plainTextToken);

        $team = new Team();

        $team->user_id = $user->id;

        $team->fill([
            'name' => 'Testers Team',
            'personal_team' => 1
        ]);
        $team->save();



        $initialS = Sprint::factory()->create([
            'user_id' => $user->id
        ]);

        Task::factory()->count(5)->create([
            'user_id' => $user->id,
            'sprint_id' => $initialS->id
        ]);

        $second = Sprint::factory()->create([
            'user_id' => $user->id,
            'previous_sprint_id' => $initialS->id,
            'is_active' => true
        ]);

        Task::factory()->count(5)->create([
            'user_id' => $user->id,
            'sprint_id' => $second->id
        ]);

        $third = Sprint::factory()->create([
            'user_id' => $user->id,
            'previous_sprint_id' => $second->id
        ]);

        Task::factory()->count(5)->create([
            'user_id' => $user->id,
            'sprint_id' => $third->id
        ]);
    }
}
