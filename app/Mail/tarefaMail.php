<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class tarefaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $tituloTarefa;
    public $descricaoTarefa;
    public $prioridade;
    public $categoria;
    public $dataInicio;
    public $dataConclusao;
    public $notas;
    /**
     * Create a new message instance.
     */
    public function __construct($Titulo, $DescricaoTarefa, $Name, $Prioridade, $Categoria, $DataInicio, $DataConclusao, $Notas)
    {
        $this->tituloTarefa= $Titulo;
        $this->name =$Name;
        $this->descricaoTarefa =$DescricaoTarefa;
        $this->prioridade = $Prioridade;
        $this->categoria = $Categoria;
        $this->dataInicio =$DataInicio;
        $this->dataConclusao =$DataConclusao;
        $this->notas =$Notas;
    }
    public function build()
    {
        return $this->subject('Tarefa Criada')
            ->view('tarefaCriada')
            ->with([
                'tituloTarefa' => $this->tituloTarefa,
                'name' => $this->name,
                'descricaoTarefa' => $this->descricaoTarefa,
                'prioridade'=> $this->prioridade,
                'categoria' => $this->categoria,
                'dataInicio' => $this->dataInicio,
                'dataConclusao' => $this->dataConclusao,
                'notas' => $this->notas

            ]);
    }
}
