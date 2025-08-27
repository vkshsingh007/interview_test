composer create-project laravel/laravel interview-prep
cd interview-prep
php artisan serve


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=interview_demo
DB_USERNAME=root
DB_PASSWORD=

php artisan make:migration create_users_table

Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->timestamps();
});

php artisan migrate

php artisan make:model Task -m

Schema::create('tasks', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->timestamps();
});
php artisan migrate
