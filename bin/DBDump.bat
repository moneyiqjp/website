@echo off
set MYSQLPATH=F:\Webserver\mysql
del /s uatdb.sql
echo Dumping moneyiq_uat datbase to uatdb.sql
call %MYSQLPATH%\bin\mysqldump -h moneyiq.jp  -umoneyiqadmin -pShowM3Th3Mon3y  --triggers moneyiq_uat > uatdb.sql 
echo DONE