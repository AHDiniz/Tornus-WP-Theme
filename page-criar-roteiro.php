<?php

get_header();

?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <h1 class="es-pink text-center">Criar Roteiro de Viagens</h1>
            <p class="text-center">Dê o nome para seu novo roteiro de viagens para que você possa editá-lo depois.</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mt-5 mb-5">
                <div class="card-body">
                    <form action="<?php echo home_url("/editar-roteiro/");?>" method="get" class="row">
                        <div class="col-12 mt-4">
                            <label for="route-name">Nome do Roteiro</label>
                            <input type="text" name="route-name" id="route-name" class="form-control" placeholder="Nome do Roteiro">
                        </div>
                        <div class="col-6 mt-1">
                            <label for="route-begin">Local de Início do Roteiro</label>
                            <input type="text" name="route-begin" id=
                            "route-begin" class="form-control" placeholder="Início do Roteiro">
                            <label for="route-end">Local Final do Roteiro</label>
                            <input type="text" name="route-end" id="route-end" class="form-control" placeholder="Final do Roteiro">
                        </div>
                        <div class="col-6 mt-1">
                            <label for="route-begin-date">Data de Início do Roteiro</label>
                            <input type="date" name="route-begin-date" id="route-begin-date" class="form-control" placeholder="Data de Início do Roteiro">
                            <label for="route-end-date">Data Final do Roteiro</label>
                            <input type="date" name="route-end-date" id="route-end-date" class="form-control" placeholder="Data Final do Roteiro">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="check-point">Ponto Turístico</label>
                            <input type="checkbox" name="check-point" id="check-point" value="check">
                            <label for="check-experience">Experiência Turística</label>
                            <input type="checkbox" name="check-experience" id="check-experience" value="check">
                            <label for="check-group">Atividade em Grupo</label>
                            <input type="checkbox" name="check-group" id="check-group" value="check">
                            <label for="check-event">Evento</label>
                            <input type="checkbox" name="check-event" id="check-event" value="check">
                        </div>
                        <div class="col d-flex justify-content-center mt-3 mb-4">
                            <button type="submit" class="btn es-pink-bg text-white can-click">Criar Roteiro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();

?>