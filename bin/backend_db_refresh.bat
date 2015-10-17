@echo off
SETLOCAL ENABLEEXTENSIONS
IF "%PHPPATH%"=="" (goto NOPHP)
IF "%PROJECTPATH%"=="" (goto NOPROJECTP)
cd %PROJECTPATH%\backend
SET PATH=%PATH%;%PHPPATH%
echo PHP PATH is %PHPPATH% 
echo PROJECT PATH is %PROJECTPATH% 
echo Refreshing Schema from localhost
call %PROJECTPATH%\backend\vendor\bin\propel database:reverse "mysql:host=localhost;dbname=moneyiq;user=root;password="
echo Refreshing database classes
call %PROJECTPATH%\backend\vendor\bin\propel model:build --schema-dir "%PROJECTPATH%\backend\generated-reversed-database"
echo Now we have to refresh the autoload scripts
call %PHPPATH%\php.exe %PROJECTPATH%\bin\composer.phar update
goto DONE

:NOPHP
echo PHPPATH is not set, please set it to php.exe
goto DONE

:NOPROJECTP
echo PROJECTPATH is not set, please set it to the website base folder
goto DONE

:DONE
echo All done
pause