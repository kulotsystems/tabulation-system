## tabulation-system
I just accepted the [**#100DaysOfCode**](https://www.100daysofcode.com/) challenge.

For the next 100 days, I will be building a flexible tabulation system
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
2. Open cloned directory in your terminal then run the following commands in order:

    *___a.___ Install backend dependencies:*
    ```composer log
    composer update
    ```
   
    *___b___. Install frontend dependencies:*
    ```composer log
    npm install
    ```
   
    *___c___. Spin a local dev server:*
    ```composer log
    php artisan serve
    ```
   
   *___d___. Run or build frontend in different terminal session:*
 
    *Run while in development:*
    ```composer log
    npm run dev
    ```
    
    *Build assets for production:*
    ```composer log
    npm run prod
    ```
   
4. Access <http://localhost:8000> on your browser.
