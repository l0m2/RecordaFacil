<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <!-- Inclua os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
</head>
<body style="background-color: #f5f5f5;">
   

    <nav class="navbar navbar-expand-lg navbar-success bg-success sticky-menu ">
        <div class="container-fluid">
          <a class="navbar-brand " href="#" id="icon">Recorda Facil</a>
          <button class="navbar-toggler" type="button btn-white" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0  m-3 ">
              
              <li class="nav-item p-2">
                <a href="#tarefas" class="menu-link active"><i class="fas fa-list-ul"></i> Tarefas</a>
              </li>

              <li class="nav-item p-2">
                <a href="#estatisticas" class="menu-link"><i class="fas fa-chart-bar"></i> Estatísticas</a>
              </li>
              <li class="nav-item p-2">
                <a href="#criar-tarefa" class="menu-link"><i class="fas fa-tasks"></i> Criar Tarefa</a>
              </li>
              <li class="nav-item p-2">
                <a href="#anotacoes" class="menu-link"><i class="fas fa-info-circle"></i> Detalhes</a>
              </li>
              <li class="nav-item p-2">
                <a href="#sobre-nos" class="menu-link"><i class="fas fa-user-circle"></i> Sobre Nós</a>
              </li>      
            </ul>
            <div class="col-md-6 user-info d-flex justify-content-end">
                <a href="#"><i class="fas fa-user"></i> {{$user->name}}</a>
            </div>
          </div>
        </div>
      </nav>



    <div class="container">
  
        <div class="container scroll-section" id="tarefas">
            <div class="corpo" id="tarefas">
                <!-- Parte 1 - Tarefas -->
                <h2>Tarefas</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Categoria</th>
                            <th>Prioridade</th>
                            <th>Data de Conclusão</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tarefas as $tarefa)
                        <tr>
                            <td><a href="#">{{$tarefa->tituloTarefa}}</a></td>
                            <td>{{$tarefa->categoria}}</td>
                            <td>{{$tarefa->prioridade}}</td>
                            <td>{{$tarefa->dataConclusao}}</td>
                        </tr>
                        @endforeach
                        <!-- Adicione mais linhas conforme necessário para suas tarefas -->
                    </tbody>
                </table>
                <div class="btns" >
                    <a href="#" class="btn btn-success btn-sm p-2 " style="font-size: 15px">Em Andamento</a>
                    <a href="#" class="btn btn-success btn-sm p-2" style="font-size: 15px">Em Atraso</a>
                    <a href="#" class="btn btn-success btn-sm p-2" style="font-size: 15px">Concluídas</a>
                    <a href="#" class="btn btn-success btn-sm p-2" style="font-size: 15px">Prioridade</a>
                    <a href="#" class="btn btn-success btn-sm p-2" style="font-size: 15px">Todas</a>
                </div>
                <!-- Adicione aqui a lista de tarefas -->
            </div>
    
        </div>

        <div class="container scroll-section" id="estatisticas">
            <div class="estatisticas" id="estatisticas">
                <!-- Parte 2 - Estatísticas -->
                <h2>Estatísticas</h2>
                <div class="row">
                    <div class="barra-estatisticas">
                        <div class="barra-item concluidas" style="width: {{$estatistica[1]}}%;"></div>
                        <div class="barra-item em-andamento" style="width: {{$estatistica[0]}}%;"></div>
                        <div class="barra-item em-atraso" style="width: {{$estatistica[2]}}%;"></div>
                        <div class="barra-item em-espera" style="width: {{$estatistica[3]}}%;"></div>
                    </div>
                    <div class="legenda">
                        <div class="legenda-item">
                            <div class="cor em-andamento"></div>
                            <span>Tarefas em Andamento {{$estatistica[0]}}%</span>
                        </div>
                        <div class="legenda-item">
                            <div class="cor concluidas"></div>
                            <span>Tarefas Concluídas {{$estatistica[1]}}%</span>
                        </div>
                        <div class="legenda-item">
                            <div class="cor em-espera"></div>
                            <span>Tarefas em Espera {{$estatistica[3]}}%</span>
                        </div>
                        <div class="legenda-item">
                            <div class="cor em-atraso"></div>
                            <span>Tarefas em Atraso {{$estatistica[2]}}%</span>
                        </div>
                    </div>
                                   
                </div>
            </div>
        </div>
        
        <div class="container scroll-section" id="criar-tarefa">
            <div class="criar-tarefa-form" id="criar-tarefa">
                <h2>Criar Tarefa</h2>
            <form action="criar-tarefas" method="post">
                @csrf <!-- Token CSRF para proteção -->
                <!-- Título da Tarefa -->
                <div class="form-group">
                    <label for="titulo">Título da Tarefa:</label>
                    <input type="text" id="titulo" name="tituloTarefa" class="form-control" required>
                </div>
            
                <!-- Descrição da Tarefa (opcional) -->
                <div class="form-group">
                    <label for="descricao">Descrição da Tarefa:</label>
                    <textarea id="descricao" name="descricaoTarefa" class="form-control" required></textarea>
                </div>
            
                <div class="form-group">
                    <label for="data-inicio">Data de Inicio:</label>
                    <input type="date" id="data-inicio" name="dataInicio" class="form-control" required>
                </div>

                <!-- Data de Conclusão -->
                <div class="form-group">
                    <label for="data-conclusao">Data de Conclusão:</label>
                    <input type="date" id="data-conclusao" name="dataConclusao" class="form-control" required>
                </div>
            
                <!-- Prioridade da Tarefa -->
                <div class="form-group">
                    <label for="prioridade">Prioridade:</label>
                    <select id="prioridade" name="prioridade" class="form-control" required>
                        <option value="Baixa">Seleccione a Prioridade</option>    
                        <option value="Baixa">Baixa</option>
                        <option value="Média">Média</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>
            
                <!-- Categoria da Tarefa -->
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select id="categoria" name="categoria" class="form-control" required>
                        <option value="Outros">Seleccione uma Categoria</option>
                        <option value="Trabalho">Trabalho</option>
                        <option value="Estudo">Estudo</option>
                        <option value="Pessoal">Pessoal</option>
                        <option value="Saúde">Saúde</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>
            
                <!-- Notas da Tarefa (opcional) -->
                <div class="form-group">
                    <label for="notas">Notas:</label>
                    <textarea id="notas" name="notas" class="form-control" required></textarea><br>
                </div>
            
                <!-- Botão para criar a tarefa -->
                <button type="submit" class="btn btn-success w-100">Criar Tarefa</button>
            </form>
            </div>
        </div>    

    <div class="container scroll-section" id="anotacoes">
<div class="anotacoes" id="anotacoes">
    <!-- Parte 3 - Anotações -->
    <h2>Notas</h2>
    <!-- Adicione aqui as anotações do usuário -->
</div>
</div>
</div>

<div class="footer" id="sobre-nos">
&copy; 2023 Meu Aplicativo
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
<script src="{{asset('js/menufuncion.js')}}"></script>
<script src="{{asset('js/sessaoVisivel.js')}}"></script>
<script src="{{asset('js/menu.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>



 

