<?php

require_once(dirname(__FILE__) . '/../constants/constants.php');

class TodoList
{
    private $queryResult;

    public function __construct($limit = 0)
    {
        global $db;
        if ($limit == 0) {
            $limitStr = "";
        }
        else {
            $limitStr = " LIMIT " . $limit;
        }

        $mySQLResult       = mysqli_query($db, " SELECT * FROM todo " . $limitStr);
        $this->queryResult = array();
        while ($row = mysqli_fetch_assoc($mySQLResult)) {
            array_push($this->queryResult, $row);
        }
    }

    public function render()
    {
        loadTodoConstants();
        $template    = file_get_contents(dirname(__FILE__) . "/../view/todo.html");
        $todoContent = "<ol>";
        for ($i = 0; $i < count($this->queryResult); $i++) {
            if ($this->queryResult[$i]["id"] == TODO_ATTENDANCE) {
                $cssClass = "purple-bold";
            }
            else {
                $cssClass = "red";
            }
            $todoContent = $todoContent . sprintf('<li class="%s">', $cssClass) . $this->queryResult[$i]["task"] . "</li>";
        }
        $todoContent = $todoContent . "</ol>";
        $template    = str_replace("<(todo_content)>", $todoContent, $template);

        print_r($template);
    }
}
