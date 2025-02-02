<?php
class Blog_IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {

        $blogModel = new Blog_Model_Blog();
        $this->view->posts = $blogModel->findAll();


        // $blogModel = $this->_helper->model('Blog');
        // var_dump($blogModel->findAll());

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

     // edit
     public function editAction()
     {

         $id = $this->_request->getParam('id');
         
         $blogModel = new Blog_Model_Blog();        
         $this->view->post = $blogModel->find($id)->current();

         $form = new Blog_Form_Blog();
         $form->setAction($this->view->baseUrl('/blog/index/update'));
         $form->populate([
            'id' => $id,
            'title' => $this->view->post->title,
            'content' => $this->view->post->content
        ]);
         $this->view->form = $form;
         
     }

     // update
     public function updateAction()
     {
         $id = $this->_request->getParam('id');
         $blogModel = new Blog_Model_Blog();
         try {
            $data = $this->_request->getParams();
            $blogModel->update($id, $data);
         } catch (\Throwable $th) {
            $this->view->error = $th->getMessage();            
            //throw $th;
         }
         $this->_helper->redirector('index');
     }

     // delete
     public function deleteAction()
     {
         $id = $this->_request->getParam('id');
         $blogModel = new Blog_Model_Blog();
         $blogModel->delete($id);
         $this->_helper->redirector('index');
     }
}