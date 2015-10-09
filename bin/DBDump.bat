@echo off
rem set MYSQLPATH=F:\xampp\mysql\
del /s uatdb.sql
echo %MYSQLPATH%
call %MYSQLPATH%\mysqldump -h moneyiq.jp  -umoneyiqadmin -pShowM3Th3Mon3y  --routines --triggers moneyiq_uat > uatdb.sql 
echo DONE