<?php

get_header();

?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <h1 class="es-pink text-center">Criar Atividade</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo home_url('criar-atividade')?>" method="get">
                        <label for="activity-name">Nome da Atividade</label>
                        <input type="text" class="form-control" placeholder="Nome da Atividade" name="activity-name">
                        <label for="activity-address">Endereço da Atividade</label>
                        <input type="text" class="form-control" placeholder="Endereço da Atividade" name="activity-address">
                        <label for="activity-description">Descrição da Atividade</label>
                        <input type="text" class="form-control" placeholder="Descrição da Atividade" name="activity-description">
                        <label for="activity-images">Images da Atividade</label>
                        <input type="image" class="form-control" accept=".jpg,.jpeg,.png" multiple>
                        <div class="row">
                            <div class="col-3 form-check">
                                <label for="activity-type" class="form-check-label">Ponto Turístico</label>
                                <input type="radio" name="activity-type" value="point" class="form-check-input">
                            </div>
                            <div class="col-3 form-check">
                                <label for="activity-type" class="form-check-label">Experiência Turística</label>
                                <input type="radio" name="activity-type" value="experience" class="form-check-input">
                            </div>
                            <div class="col-3 form-check">
                                <label for="activity-type" class="form-check-label">Atividade em Grupo</label>
                                <input type="radio" name="activity-type" value="group" class="form-check-input">
                            </div>
                            <div class="col-3 form-check">
                                <label for="activity-type" class="form-check-label">Evento</label>
                                <input type="radio" name="activity-type" value="event" class="form-check-input">
                            </div>
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