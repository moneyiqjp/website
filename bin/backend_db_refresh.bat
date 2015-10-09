@echo off
SETLOCAL ENABLEEXTENSIONS
cd ../backend
IF "%PHPPATH%"=="" (set PHPPATH=C:\Projects\xampp\php\php.exe)
IF "%PROJECTPATH%"=="" (set PROJECTPATH=C:\Projects\website)
echo PHP PATH is %PHPPATH% 
echo Refreshing Schema
call %PROJECTPATH%\backend\vendor\bin\propel database:reverse "mysql:host=localhost;dbname=moneyiq;user=root;password="
echo Refreshing database classes
call %PROJECTPATH%\backend\vendor\bin\propel model:build --schema-dir "%PROJECTPATH%\backend\generated-reversed-database"
echo Now we have to refresh the autoload scripts
call %PHPPATH% %PROJECTPATH%\bin\composer.phar update
echo All done