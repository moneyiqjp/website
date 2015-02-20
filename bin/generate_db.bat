cd ../backend
vendor/bin/propel sql:build "mysql:host=localhost;dbname=moneyiq;user=root;password="
vendor/bin/propel sql:build --config-dir ./config/ --schema-dir .\generated-reversed-database/
