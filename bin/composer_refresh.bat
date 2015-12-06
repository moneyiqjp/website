@echo off
SETLOCAL ENABLEEXTENSIONS
IF "%PHPPATH%"=="" (goto NOPHP)
IF "%PROJECTPATH%"=="" (goto NOPROJECTP)
cd %PROJECTPATH%\backend
SET PATH=%PATH%;%PHPPATH%
echo PHP PATH is %PHPPATH% 
echo PROJECT PATH is %PROJECTPATH% 
echo Refreshing Composer
call %PHPPATH%\php.exe %PROJECTPATH%\bin\composer.phar self-update
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