<?php $__env->startSection('title',$event->title); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img class="img-fluid" src="/img/events/<?php echo e($event->image); ?>" alt="<?php echo e($event->title); ?>">
            </div>
            <div id="info-container" class="col-md-6">
                <h1><?php echo e($event->title); ?></h1>
                <p class="event-city"> <ion-icon name="location-outline"></ion-icon> <?php echo e($event->city); ?> </p>
                <p class="events-participants"><ion-icon name="people-outline"></ion-icon><?php echo e(count($event->users)); ?> Participantes</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon><?php echo e($eventOwner['name']); ?></p>
                <p class="event-owner"><ion-icon name="calendar-number-outline"></ion-icon>Data: <?php echo e(date('d/m/Y' ,strtotime($event->date))); ?></p>

                <?php if(!$hasUserJoined): ?>

                    <form action="/events/join/<?php echo e($event->id); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <a href="/events/join/<?php echo e($event->id); ?>" class="btn btn-success" id="event-submit" onclick="event.preventDefault(); this.closest('form').submit();">Confirmar-presença</a>
                    </form>

                <?php else: ?>
                    <p class="already-joined-msg"><ion-icon name="ticket-outline"></ion-icon> Ingresso Adquirido</p>
                <?php endif; ?>

                <h3>O evento conta com:</h3>
                <ul id="items-list">
                    <?php $__currentLoopData = $event->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><ion-icon name="play-outline" ></ion-icon><span><?php echo e($item); ?></span></li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o Evento: </h3>
                <p class="event-description"><?php echo e($event->description); ?></p>
            </div>
        </div>

    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelEstudo\Laravel-Eventos\gerenciador-eventos\resources\views/events/show.blade.php ENDPATH**/ ?>