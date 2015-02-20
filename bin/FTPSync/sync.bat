rem A basic batch file that repeats FTPSync transfers until
rem all files are transfered successfully.

del %1.RES
:repeat
ftpsync %1 %2 %3
if errorlevel 4 goto inierror
if errorlevel 3 goto repeat
if errorlevel 2 goto repeat
if errorlevel 1 goto repeat
goto end

:inierror
echo "ERROR: Most likely there's a problem in %1.INI file!"

:end