<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="app.resources._css.app.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>CRUD</title>

    <style>
        .actions {
            margin-left: 200px;
        }
    </style>

</head>    
<header>
    @include('navbar')
</header>
<body>
  <!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
          </div>
          <div class="modal-body">Deseja realmente excluir este item? </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary">Sim</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
          </div>
      </div>
  </div>
</div>


  <div class="container mt-5">
  <h3 style="color: #343a40">Funcionarios</h3>
  <h5 style="color: #343a40">Vizualise a baixo os funcionarios cadastrados</h5>
  
  <div id="list" class="row">

    <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th class="actions">Ações</th>
                 </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $f)
 
                <tr>
                    <td>{{ $f->id}}</td>
                    <td>{{ $f->nome}}</td>
                    <td>{{ $f->email}}</td>
                    <td>{{ $f->idade}}</td>
                    <td  class="actions">
                        <a class="btn btn-warning btn-xs" data-toggle="modal" href="#EditarFunModal">Editar</a>
                        <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
         </table>
         <a class="btn btn-success btn-xs" data-toggle="modal" href="#CriarFuncModal">Cadastrar</a>

 
     </div>
 </div> <!-- /#list -->
</div>
{{-- Modal Cadastrar--}}
    <div class="modal fade" id="CriarFuncModal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('registrar.func') }}" method="POST">
                @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado" style="color: #343a40">Adicionar Funcionario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nome</label>
              <input name="nome" type="text" class="form-control" placeholder="Mauricio Moura" required>
            </div>
            <div class="form-group">
              <label>Idade</label>
              <input name="idade" type="number" class="form-control" placeholder="19" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="email" type="email" class="form-control" placeholder="mmoura@gmail.com" required>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-success" value="Confirmar">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
    </form>

      </div>
    </div>
    @foreach ($funcionarios as $f)

              {{-- Modal atualizar--}}
              <div  class="modal fade" id="EditarFunModal{{ $f->id }}">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <form action="{{ route('atualizar.func', $f->id)}}" method="POST">
                        @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="TituloModalCentralizado">Atualizar Funcionario</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome</label>
                            <input name="nome" type="text" class="form-control" value="{{ $f->nome }}" required>
                          </div>
                          <div class="form-group">
                            <label>Idade</label>
                            <input name="idade" type="number" class="form-control" placeholder="19" required>
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" placeholder="mmoura@gmail.com" {{ $f->email}} required>
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary">Salvar mudanças</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>   
              @endforeach

                 {{-- Modal deletar  --}}
            <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="TituloModalCentralizado">Título do modal</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary">Salvar mudanças</button>
                    </div>
                  </div>
                </div>
              </div>
          </ul>
        </div>
      </div>
    </nav>    

</body>
</html>

