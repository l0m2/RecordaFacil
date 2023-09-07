<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\DailyTaskReminder;
use App\Models\tarefa;
use Carbon\Carbon;

class SendDailyTaskReminders extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily task reminders';

    /**
     * Execute the console command.
     */

     public function __construct()
     {
         parent::__construct();
     }

    public function handle()
    {
        $currentDate = Carbon::now();
        $users = Auth::user(); 

        foreach ($users as $user) {
            // Recupere as tarefas em andamento do usuário
            $tasks = tarefa::where('user_id', $user->id)
            ->where('terminada', false)
            ->where('dataInicio', '>=', $currentDate)
            ->get();

            // Verifique se o usuário tem tarefas em andamento
            if ($tasks->count() > 0) {
                // Envie um e-mail de lembrete para o usuário com as tarefas em andamento
                Mail::to($user->email)->send(new DailyTaskReminder($user, $tasks));
            }
        }

        $this->info('Daily task reminders sent successfully.');
    }
}
