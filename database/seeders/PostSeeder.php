<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();

        foreach (range(1, 20) as $i) {
            Post::create([
                'user_id' => $users->random()->id,
                'content' => 'Conteúdo do post #' . $i,
                'image_path' => null,
            ]);
        }

        $this->command->info("20 posts criados com sucesso!");
    }
}
