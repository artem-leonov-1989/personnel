<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SetUserPasswordCommand extends Command
{
    protected $signature = 'user:set-password';
    protected $description = 'Встановити свій пароль для існуючого користувача';

    public function handle(): void
    {
        $login = $this->ask('Логін користувача');
        $user = User::where('login', $login)->first();
        if ($user) {
            $random = $this->ask('Свій пароль? (yes/no)');
            if ($random === 'yes') {
                $password = $this->ask('Введіть новий пароль');
            } else {
                $password = Str::password(rand(10, 15));
                $this->info('Новий пароль - '.$password);
            }
            $user->password = Hash::make($password);
            $user->save();
            $this->info('Пароль змінено');
            return;
        }
        $this->error('Такого користувача не існує!');
    }
}
