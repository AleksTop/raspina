<?php
namespace dashboard\components\rbac;

use dashboard\modules\post\models\Comment;
use dashboard\modules\post\models\Post;
use yii\rbac\Rule;
use yii\web\NotFoundHttpException;

class AuthorRule extends Rule
{
    public $name = 'AuthorRule';
    private $_model;
    private $_user;

    public function execute($user, $item, $params)
    {
        $methodName = $item->name;
        $this->_user = $user;

        return $this->{$methodName}($params);
    }

    public function updatePost($params)
    {
        $this->_findModel($params);
        if(!$params['model'] instanceof Post)
        {
            return true;
        }

        return $this->_checkOwnerEntity();
    }

    public function deletePost($params)
    {
        $this->_findModel($params);
        if(!$params['model'] instanceof Post)
        {
            return true;
        }

        return $this->_checkOwnerEntity();
    }

    public function deleteComment($params)
    {
        $this->_findModel($params);
        if(!$params['model'] instanceof Comment)
        {
            return true;
        }

        return $params['model']->post->created_by == $this->_user;
    }

    public function approveComment($params)
    {
        $this->_findModel($params);
        if(!$params['model'] instanceof Comment)
        {
            return true;
        }

        return $params['model']->post->created_by == $this->_user;
    }

    public function replyComment($params)
    {
        $this->_findModel($params);
        if(!$params['model'] instanceof Comment)
        {
            return true;
        }

        return $params['model']->post->created_by == $this->_user;
    }

    private function _checkOwnerEntity()
    {
        return $this->_model->created_by == $this->_user;
    }

    private function _findModel($params)
    {
        if(isset($params['model']))
        {
            $this->_model = $params['model'];
        }
        else
        {
            throw new NotFoundHttpException('The model does not exist.');
        }
    }
}