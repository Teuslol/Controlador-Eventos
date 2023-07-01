<?php $__env->startSection('title','MTS - Produto'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Tela produto</h1>
<?php if($busca != ''): ?>

    <p>Busca : <?php echo e($busca); ?></p>

<?php endif; ?>










<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelEstudo\Laravel-Eventos\gerenciador-eventos\resources\views/create.blade.php ENDPATH**/ ?>
