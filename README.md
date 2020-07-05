## Step
- composer install
- npm install / yarn install
- npm run dev / yarn dev
- create your `.env`
- fill your default configuration
- fill pusher configuration 
  ```
  PUSHER_APP_ID=1234
  PUSHER_APP_KEY=ABCDEF
  PUSHER_APP_SECRET=GHIJKLMNOP
  PUSHER_APP_CLUSTER=mt1
  ```
- run your apps with `php artisan websockets:serve`
