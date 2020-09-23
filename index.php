<?php

require_once(dirname(__FILE__) . "/database/connect.php");
require_once(dirname(__FILE__) . "/classes/todo_list.class.php");

if (isset($_GET["limit"])) {
    $todoList = new TodoList($_GET["limit"]);
}
else {
    $todoList = new TodoList();
}

$todoList->render();

require_once("./database/close.php");
