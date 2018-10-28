<?php


Blade::directive('cdnjs', function ($packageName) {
    return "<?php echo \Cdnjs::generate($packageName); ?>";
});
