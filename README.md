## How to setup

1. Clone the repository
2. Run `composer install`
3. Run the migrations `php artisan migrate --seed`
4. Create passport client `php artisan passport:client --password`. Take note of the client id and secret, they will be used in th Front-end app.
5. Set env vars. Github username, email and PAT (Personal Access Token)
6. Run `php artisan optimize`
7. Serve.
