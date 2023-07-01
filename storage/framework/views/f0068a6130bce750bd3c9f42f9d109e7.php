<!doctype html>
<html lang="PT - BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark">
            <div class="container-fluid" id="navbar">

                <a href="/" class="navbar-brand">
                    <img src="/img/evento1.jfif" alt="MTS Eventos logo">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/"><ion-icon name="home-outline"></ion-icon>Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/events/create" style="padding-bottom: 4px; padding-top: 12px;">Criar Eventos</a></li>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item"><a class="nav-link" href="/dashboard" style="padding-bottom: 4px; padding-top: 12px;">Meus Eventos</a></li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                <?php echo csrf_field(); ?>
                                <a class="nav-link" href="/logout" onclick="event.preventDefault();  this.closest('form').submit();">
                                    <ion-icon name="log-out-outline"></ion-icon> Sair
                                </a>
                            </form>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item"><a class="nav-link" href="/login"><ion-icon name="person-outline"></ion-icon>Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register"><ion-icon name="person-add-outline"></ion-icon>Cadastrar</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php if(session('msg')): ?>
                    <p class="msg"><?php echo e(session('msg')); ?></p>
                <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </main>



<footer>
    <p>MTS Eventos &copy; 2023</p>
</footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LaravelEstudo\Laravel-Eventos\gerenciador-eventos\resources\views/layouts/main.blade.php ENDPATH**/ ?>