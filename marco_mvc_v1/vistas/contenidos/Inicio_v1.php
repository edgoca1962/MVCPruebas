<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Buscador de tareas</a>
    <ul class="nvabar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <div class="container p-2">
                <div class="row">
                    <div class="col-md-2">
                        <i class="fas fa-search btn btn-secondary btn-lg"></i>
                    </div>
                    <div class="col-md-10">
                        <input type="search" id="btn-buscar" name="btn-buscar" placeholder="Buscar artículos" class="form-control" autofocus>
                    </div>
                </div>
            </div>

        </form>
    </ul>

</nav>
<div class="container p-4">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form id="f_articulos">
                        <div class="form-group">
                            <input type="text" name="" id="titulo-articulo" placeholder="Título de artículo" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea id="descripcion-articulo" cols="30" rows="10" class="form-control" placeholder="Descripción de artículo"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block text-center">Guardar Artículo</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card my-4" id="resultados">
                <div class="card-body">
                    <ul id="temporal">

                    </ul>
                </div>
            </div>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Título</td>
                        <td>Descripción</td>
                    </tr>
                </thead>
                <tbody id="articulos"></tbody>
            </table>
        </div>
    </div>
</div>