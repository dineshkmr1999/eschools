<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<h3>Hello <?php echo e($name); ?>,<br>
    Congratulations, You are registered as a Teacher in <?php echo e($school_name); ?><br>
    Here is your login credentials. <br>
    Email:<?php echo e($email); ?><br>
    Password:<?php echo e($password); ?></h3>
</body>
</html>
<?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/teacher/email.blade.php ENDPATH**/ ?>