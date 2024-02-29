Requitments:

- Composer (tested on 2.3.7)
- Docker (tested on 25.0.3)
- NPM


Installation:
git clone https://github.com/pirklajos/flexi.git flexi_test
cd felxi_test
cd app
docker-compose up -d
cd site
composer install
npm install
php bin/console doctrine:migration:migrate
npm run watch
open in browser: 
    localhost:8001
