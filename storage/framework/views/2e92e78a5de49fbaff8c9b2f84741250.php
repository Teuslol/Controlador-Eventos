<?php $__env->startSection('title','MTS - Events'); ?>



<?php $__env->startSection('content'); ?>
    <div id="search-container" class="col-md-12" >
        <h1>Busca De Eventos</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Busca" >
            <button class="btn btn-success" type="submit"> Pesquisar <ion-icon name="search-outline"></ion-icon></button>
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <?php if($search): ?>
        <h2>Buscando Por: <?php echo e($search); ?></h2>

        <?php else: ?>
            <h2>Próximo Eventos</h2>
            <p class="subtitle">Nossos proximos Eventos: </p>

        <?php endif; ?>
        <div id="cards-container" class="row">
            <?php $__currentLoopData = $eventsBD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card col-md-3">
                    <img src="/img/events/<?php echo e($event->image); ?>" alt="<?php echo e($event->title); ?>">
                    <div class="card-body">
                        <p class="card-date"><?php echo e(date('d/m/Y' ,strtotime($event->date))); ?></p>
                        <h5 class="card-title"><?php echo e($event->title); ?></h5>
                        <p class="card-participantes"><?php echo e(count($event->users)); ?> Participantes</p>
                        <a href="/events/<?php echo e($event->id); ?>" class="btnS btn btn-danger">Saiba Mais <ion-icon name="add-circle-outline"></ion-icon></a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($eventsBD) == 0 && $search): ?>
                <p>Não foi possível encontrar nenhum evento com <?php echo e($search); ?>! <a href="/">Ver Todos</a></p>
            <?php elseif(count($eventsBD) == 0): ?>
                <h1>Não Há Eventos Disponiveis</h1>

            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelEstudo\Laravel-Eventos\gerenciador-eventos\resources\views/welcome.blade.php ENDPATH**/ ?>