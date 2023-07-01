<?php $__env->startSection('title','MTS - Criar Evento'); ?>

<?php $__env->startSection('content'); ?>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie Seu Evento</h1>
            <form action="/events" method="POST" enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="title" class="">Evento: </label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
            </div>

            <div class="form-group">
                <label for="image" class="">Imagem do Evento: </label>
                <input class="from-control-file" type="file" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="title" class="">Data do Evento: </label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group">
                <label for="title" class="">Cidade: </label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">
            </div>

            <div class="form-group">
                <label for="title" class="">Categoria: </label>
                <select id="private" name="private" class="form-control">
                    <option value="0">Publico</option>
                    <option value="1">Privado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title" class="">Descrição: </label>
                <textarea name="description" id="description" class="form-control" placeholder="Descrição do Evento"></textarea>
            </div>

            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura: </label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco">Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Area-Vip">Area-Vip
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open-Bar">Open-Bar
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open-Food">Open-Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes">Brindes
                </div>
            </div>






            <input class="btn btn-success" type="submit" value="CriarEvento">

        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelEstudo\Laravel-Eventos\gerenciador-eventos\resources\views/events/create.blade.php ENDPATH**/ ?>