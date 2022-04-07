## tabulation-system
I just accepted the [**#100DaysOfCode**](https://www.100daysofcode.com/) challenge.

In 100 days, I will be building a flexible tabulation system
using [**Laravel 9**](https://laravel.com/) and [**Vue3**](https://vuejs.org/).
I will be using **[Vite](https://vitejs.dev/)** during development.


### Development Environment
| Tool      | Version   |
| --------- | --------- |
| PHP       | `^8.0`    |
| Node      | `^16.14`  |
| Composer  | `^2.2.7`  |

### Development Setup
1. Clone or download this repository.
2. Open the project directory and **copy** `.env-example` to `.env` in its same directory.
3. Create a MySQL database named `tabulation_system`.
4. Open cloned directory in your terminal then run the following commands in order:

    *___a.___ Install backend dependencies:*
    ```composer log
    composer update
    ```
   
    *___b___. Install frontend dependencies:*
    ```composer log
    npm install
    ```
   
    *___c___. Generate application key:*
    ```composer log
    php artisan key:generate
    ```
    
    *___d___. Migrate database tables:*
    ```composer log
    php artisan migrate
    ```
   
    *___e___. Populate database tables with data:*
    ```composer log
    php artisan db:seed
    ```
   
    *___f___. Spin a local dev server:*
    ```composer log
    php artisan serve
    ```
   
   *___g___. Build or run frontend in different terminal session:*
   
    *Build assets for production: **(required during first run)***
    ```composer log
    npm run prod
    ```
 
    *Run while in development:*
    ```composer log
    npm run dev
    ```
    
4. Access <http://localhost:8000> on your browser.   
   ```
   Username: kulotsystems
   Password: test
   ```
