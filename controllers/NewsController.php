<?php

class NewsController
{
    public function actionIndex()
    {
        echo "List of news";
        return true;
    }

    public function actionView($category, $id)
    {
        echo $category . "  " . $id;
        echo "View one news";
        return true;
    }
}

?>