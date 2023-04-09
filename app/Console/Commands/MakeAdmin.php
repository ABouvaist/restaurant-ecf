<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make-admin
        {first_name? : Le prénom de l\'admin}
        {last_name? : Le nom de l\'admin}
        {email? : L\'email de l\'admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (User::where('role', User::ADMIN)->exists()) {
            $this->error("\nUn admin existe déjà.");
            if ($this->confirm('Voulez-vous supprimer l\'admin existant ?')) {
                User::where('role', User::ADMIN)->delete();
                $this->info('L\'admin existant a été supprimé.');
            } else {
                $this->info('L\'admin n\'a pas été supprimé.');
                return;
            }
        }

        $user = User::make([
            'first_name' => $this->argument('first_name') ?? $this->ask('Entrez un prénom'),
            'last_name' => $this->argument('last_name') ?? $this->ask('Entrez un nom'),
            'role' => User::ADMIN,
            'email' => $this->promptEmail(),
            'password' => Hash::make($this->promptPassword()),
        ]);

        $this->table(['Prénom', 'Nom', 'Email', 'a'], [
            [
                $user->first_name,
                $user->last_name,
                $user->email,
                $user->role,
            ],
        ]);

        if ($this->confirm('Voulez-vous créer cet admin ?')) {
            $user->email_verified_at = now();
            $user->save();
        } else {
            $this->info('L\'admin n\'a pas été créé.');
            return;
        }


        $this->info("L'admin {$user->first_name} {$user->last_name} a été créé avec succès.");

    }

    public function promptPassword(): string
    {
        $secret = $this->secret('Entrez un mot de passe');

        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        if (!preg_match($passwordRegex, $secret)) {
            $this->error('Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.');
            return $this->promptPassword();
        }

        if ($this->secret('Confirmez le mot de passe') !== $secret) {
            $this->error('Les mots de passe ne correspondent pas.');
            return $this->promptPassword();
        }

        return $secret;
    }

    public function promptEmail(bool $useArg = true): string
    {
        $argEmail = $useArg ? $this->argument('email') : null;
        $email = $argEmail ?? $this->ask('Entrez un email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('L\'email n\'est pas valide.');
            return $this->promptEmail(false);
        }

        if (User::where('email', $email)->exists()) {
            $this->error('Cet email est déjà utilisé.');
            return $this->promptEmail(false);
        }

        return $email;
    }
}
