﻿<?php
//Графон бутстраповский http://bootswatch.com/cerulean/

//1) Вход/Рега/восстановить пароль ( http://ssndob.so/login типа такого)
//2) после реги человек может просмотреть список ssh и новость
//3) поиск по county/State/city/zip
//4) выбор галочками что нужно и добавляет в корзину для дальнейшей оплаты
5) пополняет баланс шопа удобным способом, биток или вмз
//7) После покупки ему вылетает список ссх и храниться в кабинете
//8) в кабинете баланс и возможность его пополнить и история покупок с датами


//http://whoer.net/check?host=65.55.111.91

//Админка
//Добавить новость которая выводится клиентам на главной 
//Редактор цены, она одна для всех тваров. 1$
//Тикет система
//Работа с юзерами, добавление, смена пароля, все как у людей :)
//права доступа юзеров надо расписать так чтобы нельзя было ломануть базу и спиздить инфу
Чек всей базы ссх на валид раз в день с переносом в категорию "мертвые"
Чек всей базы ссх на блэк whoer.net раз в день с переносом блэкнутых ссш в категорию "блэк"

//блок статистики:
//сколько живых, сколько в мертвых сколько в блеке
//живые, метрые блек
//Импорт/ экспорт всей базы файлами в формате txt
//при импорте фильтровать дубли

/*
Живые				0 продаются только живые
//	Страна
Зарезервированые	1 в корзине у юзера
Купленые			2 купленые пользователем
Блек				3 который достучался о не подходит
Мертвые				4 тот в который чекер постучался но не достучался
*/

/*
формат базы: 
ip					login		pass		country					state		city			zip
97.68.67.145	|	admin	|	default	|	United States (US)	|	Florida	|	Orlando		|	02135
71.42.53.75		|	admin	|	default	|	United States (US)	|	Florida	|	Melbourne	|	02135
97.76.160.183	|	admin	|	default	|	United States (US)	|	Florida	|	Inverness	|	02135

http://ip-score.com/checkip/158.100.215.31
97.68.67.145 | admin | default

https://monosnap.com/image/P84QkeUC6MfFa07Ql6jmmBMKpIgfsN.png

75.151.201.133 | PlcmSpIp | PlcmSpIp | United States (US) | Louisiana | Monroe | 71201

http://ip-score.com/checkip/158.100.215.31
https://monosnap.com/image/7UibGzJZqd5IMXafJDmOIHlEE3mVnW.png
*/
?>