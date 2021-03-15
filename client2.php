<?php

  set_time_limit(0); //Скрипт должен работать постоянно
  ob_implicit_flush(); //Все echo должны сразу же выводиться

  $address = IP;
  $port = PORT;

  if (($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
    echo "Ошибка создания сокета";
  }
  else {
    echo "Сокет создан\n";
  }

  $result = socket_connect($socket, $address, $port);
  if ($result === false) {
    echo "Ошибка при подключении к сокету";
  } else {
    echo "Подключение к сокету прошло успешно\n";
  }

  $msg = "test";
  echo "Сообщение серверу: $msg\n";
  socket_write($socket, $msg, strlen($msg)); //Отправляем серверу сообщение
  $out = socket_read($socket, 1024); //Читаем сообщение от сервера
  echo "Сообщение от сервера: $out.\n"; //Выводим сообщение от сервера
  
  echo "Сообщение серверу: $msg\n";
  socket_write($socket, $msg, strlen($msg));
  echo "Соединение завершено\n";
  //Останавливаем работу с сокетом
  if (isset($socket)) {
    socket_close($socket);
    echo "Сокет успешно закрыт";
  }