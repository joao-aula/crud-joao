

<nav class="navbar navbar-expand navbar-dark bg-dark container mt-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('site.index') }}">CRUD</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            {{-- abrir modal cadastrar--}}
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" data-toggle="modal" href="#CriarFuncModal">Cadastrar</a>
          </li>
            {{-- abrir modal atualizar--}}
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" data-toggle="modal" href="#EditarFunModal">Atualizar</a>
            </li>       
            {{-- abrir modal Deletar--}}
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" data-toggle="modal" href="#ExemploModalCentralizado">Deletar</a>
            </li>
           