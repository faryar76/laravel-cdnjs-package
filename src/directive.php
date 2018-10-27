<?php 

Blade::directive('cdnjs', function ($expression) {
    return "<?php echo \Cdnjs::test($expression); ?>";
});