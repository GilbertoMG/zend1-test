<?php
class Blog_IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {

        $blogModel = $this->_helper->model('Blog');
        var_dump($blogModel->findAll());

        // $this->view->title = "Nesta página listaremos os posts";
        // $blog = $this->_helper->model('Blog');
        // var_dump($blog->info());
        // $db = Zend_Db_Table::getDefaultAdapter();
        // $db->setFetchMode(Zend_Db::FETCH_OBJ);
        // $result = $db->query('SELECT * FROM blog');
        // $result->setFetchMode(Zend_Db::FETCH_OBJ);
        // $posts = $result->fetchAll();

        // var_dump($posts);
    }
}