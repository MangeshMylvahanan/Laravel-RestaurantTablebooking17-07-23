<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo e(url('https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('login-css/css/style.css')); ?>">

</head>

<body class="img js-fullheight" style="background-image: url(login-images/bg1.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-3">
                    <h2 class="heading-section">Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        
                        <form action="/login" class="signin-form" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">LogIn</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-100 text-md-left">
                                    <a href="#" style="color: #fff">Forgot Password</a>
                                    <p>Dont have a account <a href="/register" style="color: #846ee4">Register!</a></p>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Or LogIn With &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span
                                    class="ion-logo-facebook mr-2"></span> Facebook</a>
                            <a href="login/google" class="px-2 py-2 ml-md-1 rounded"><span
                                    class="ion-logo-google mr-2"></span> Google</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo e(asset('login-js/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('login-js/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('login-js/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('login-js/js/main.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\Users\Mangesh Mylvahanan\Laravel\Task 10-7-23\Restaurant\resources\views/Auth/login.blade.php ENDPATH**/ ?>