<?php
/**
 * Class Usuario extends Zend_Db_Table_Abstract
 * 
 * @property string $id
 * @property string $lname
 * @property string $fname
 * @property string $username
 * @property string $email
 * @property string $password   
 */

class Application_Model_Usuario extends Zend_Db_Table_Abstract {

    protected $_name = 'users';
    protected $_primary = 'id';

    // protected $_referenceMap = array(
    //     'Permissao' => array(
    //         'columns' => 'permissao_id',
    //         'refTableClass' => 'Permissao',
    //         'refColumns' => 'id'
    //     )
    // );

    public function listar() {

        try {
            return $this->fetchAll();
        } catch (Zend_Db_Except $e) {
           return false;
        }
    }

    /**
     * @return mixed
     * @throws Exception
     * @throws Zend_Db_Except
     * Método inserir
     */

    public function inserir(Array $dados) {
        try {
            echo '<pre>';
            var_dump($dados,$this->_getCols());
            die();

            $dados = self::colunas($dados);
            
            return $this->insert($dados);
        } catch (Zend_Db_Except $e) {
           return false;
        }
    }

    // Update
    public function update(Array $dados, $id) {
        try {
            $where = $this->getAdapter()->quoteInto('id = ?', $id);
            $dados = self::colunas($dados);
            return parent::update($dados, $where);
        } catch (Zend_Db_Except $e) {
           return false;
        }
    }

    // Delete
    public function delete($id) {
        try {
            $where = $this->getAdapter()->quoteInto('id = ?', $id);
            return parent::delete($where);
        } catch (Zend_Db_Except $e) {
           return false;
        }
    }

    public function colunas(Array $dados) {
        $ret = array();
        foreach ($dados as $coluna => $valor) {
           if(in_array($coluna, $this->_getCols())) {
              $ret[$coluna] = $valor;
           }
        }
        return $ret;
    }


    public function sql2() {
        $sql = $this->select()->setIntegrityCheck(false)
      //  ->from($this->_name, array('codigo' => 'id', 'nome' => 'fname'))
      ->from(array('usu'=>$this->_name), array('codigo_usuario' => 'usu.id'))
      
      ->join(array('blogue'=>'blog', 'usu.id = blog.user_id',array('idb'=>'id','title','tag')))
      ->columns(array('nombre'=>'usu.fname'))
      //  ->where('id = ?', 1)
        ->order('id DESC')
        ->limit(5);
        echo '<pre>';
        // var_dump($sql->assemble());
        // die();
        return $this->fetchAll($sql);
    }

    public function sql() {
        $sql = $this->select()->setIntegrityCheck(false)
            ->from(array('usu' => $this->_name), array('codigo_usuario' => 'usu.id', 'nombre' => 'usu.fname'))
            ->join(array('blogue' => 'blog'), 'usu.id = blogue.user_id', array('idb' => 'blogue.id', 'title' => 'blogue.title', 'tag' => 'blogue.tag'))
            ->order('blogue.id DESC')
            ->limit(5);
    
        // Para depuração (opcional)
         echo $sql->assemble();
         die();
    
        return $this->fetchAll($sql);
    }
}