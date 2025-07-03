React and Laravel project
1. Go to ```cd server``` and do command ```docker compose run --rm app composer create-project laravel/laravel .```
2. Write ``` cd ../client``` and do command ```docker compose run --rm client npx create-react-app . --template typescript```
4. Copy env from the example ```cp .env.example .env```
5. ```cd ..``` and ```docker compose up --build -d```
