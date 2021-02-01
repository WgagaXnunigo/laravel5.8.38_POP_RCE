# Laravel 5.8.38可用POP链

laravel 5.8最近的更新导致一些POP链失效，更新造成的影响包括但不限于：
- /vendor/fzaninotto/faker/src/Faker/Generator.php中Faker类新增__wakeup方法
