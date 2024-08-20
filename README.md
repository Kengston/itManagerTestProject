Instruction:
1) composer install
2) docker-compose up --build -d
3) docker-compose exec php bin/console doctrine:migrations:migrate
4) docker-compose exec php bin/console doctrine:fixtures:load
