<?

require_once(dirname(__FILE__) . '/../constants/constants.php');

class TodoList
{
    var $queryResult;

    function TodoList($limit = 0)
    {
        if ($limit == 0) {
            $limitStr = "";
        }
        else {
            $limitStr = " LIMIT " . $limit;
        }

        $mySQLResult       = mysql_query(" SELECT * FROM todo " . $limitStr);
        $this->queryResult = array();
        while($row = mysql_fetch_assoc($mySQLResult)) {
            array_push($this->queryResult, $row);
        }
    }

    function render()
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

?>