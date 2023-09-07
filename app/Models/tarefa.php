<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class tarefa extends Model
{
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

protected $table='tarefas';


protected $fillable=[
'tituloTarefa',
'descricaoTarefa',
'dataConclusao',
'prioridade',
'categoria',
'notas',
'user_id',
'terminada'
];
}
