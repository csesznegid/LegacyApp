<?

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
}

?>