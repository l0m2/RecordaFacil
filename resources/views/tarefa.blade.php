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
    <div class="header">
        <h1>Recorda Facil</h1>
    </div>

    <div class="menu-icon">
        <i class="fas fa-bars"></i>
    </div>
    
    <div class="menu">

    </div>
    <div class="menu sticky-menu">
            <div class="row">
                <div class="col-md-6">
                <div class="menu sticky-menu">  
                    <!-- Adicione classes semelhantes às outras seções -->
                    
                    <a href="#tarefas" class="menu-link active"><i class="fas fa-list-ul"></i> Tarefas</a>
                    <a href="#estatisticas" class="menu-link"><i class="fas fa-chart-bar"></i> Estatísticas</a>
                    <a href="#criar-tarefa" class="menu-link"><i class="fas fa-tasks"></i> Criar Tarefa</a>
                    <a href="#anotacoes" class="menu-link"><i class="fas fa-sticky-note"></i> Notas</a>
                    <a href="#sobre-nos" class="menu-link"><i class="fas fa-info-circle"></i> Sobre Nós</a>
                </div>                          
            </div>
            <div class="col-md-6 user-info">
                <a href="#"><i class="fas fa-user"></i> Leopoldo Jacob Matsinhe</a>
            </div>
            </div>
        </div>
    </div>



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
                        <tr>
                            <td><a href="#">Tarefa 1</a></td>
                            <td>Estudos</td>
                            <td>Alta</td>
                            <td>10/09/2023</td>
                        </tr>
                        <tr>
                            <td><a href="#">Tarefa 2</a></td>
                            <td>Musica</td>
                            <td>Média</td>
                            <td>10/09/2023</td>
                        </tr>
                        <!-- Adicione mais linhas conforme necessário para suas tarefas -->
                    </tbody>
                </table>
                <button class="btn btn-success btn-sm">Em Andamento</button>
                <button class="btn btn-success btn-sm">Em Atraso</button>
                <button class="btn btn-success btn-sm">Concluídas</button>
                <button class="btn btn-success btn-sm">Prioridade</button>
                <button class="btn btn-success btn-sm">Todas</button>
                <!-- Adicione aqui a lista de tarefas -->
            </div>
    
        </div>

        <div class="container scroll-section" id="estatisticas">
            <div class="estatisticas" id="estatisticas">
                <!-- Parte 2 - Estatísticas -->
                <h2>Estatísticas</h2>
                <div class="row">
                    <div class="barra-estatisticas">
                        <div class="barra-item concluidas" style="width: 100%;"></div>
                        <div class="barra-item em-andamento" style="width: 0%;"></div>
                        <div class="barra-item em-atraso" style="width: 0%;"></div>
                    </div>
                    <div class="legenda">
                        <div class="legenda-item">
                            <div class="cor concluidas"></div>
                            <span>Tarefas Concluídas</span>
                        </div>
                        <div class="legenda-item">
                            <div class="cor em-andamento"></div>
                            <span>Tarefas em Andamento</span>
                        </div>
                        <div class="legenda-item">
                            <div class="cor em-atraso"></div>
                            <span>Tarefas em Atraso</span>
                        </div>
                    </div>
                                   
                </div>
            </div>
        </div>
        
        <div class="container scroll-section" id="criar-tarefa">
            <div class="criar-tarefa-form" id="criar-tarefa">
                <h2>Criar Tarefa</h2>
            <form action="" method="post">
                @csrf <!-- Token CSRF para proteção -->
                <!-- Título da Tarefa -->
                <div class="form-group">
                    <label for="titulo">Título da Tarefa:</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" required>
                </div>
            
                <!-- Descrição da Tarefa (opcional) -->
                <div class="form-group">
                    <label for="descricao">Descrição da Tarefa:</label>
                    <textarea id="descricao" name="descricao" class="form-control"></textarea>
                </div>
            
                <!-- Data de Criação (não precisa ser preenchida no formulário) -->
                <!-- Data de Conclusão -->
                <div class="form-group">
                    <label for="data-conclusao">Data de Conclusão:</label>
                    <input type="date" id="data-conclusao" name="data-conclusao" class="form-control" required>
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
                    <textarea id="notas" name="notas" class="form-control"></textarea><br>
                </div>
            
                <!-- Botão para criar a tarefa -->
                <button type="submit" class="btn btn-primary">Criar Tarefa</button>
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



 

