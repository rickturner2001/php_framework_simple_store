<?php


namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\ItemModel;

class ItemController extends Controller
{
    public function item(Request $request){

        $itemModel = new ItemModel();
        if ($request->isPost()){
            $itemModel->loadData($request->getBody());

            if ($itemModel->validate() && $itemModel->register()){
                Application::$app->response->redirect("/");
            }
          
            return $this->render('add_item', [
                'model' => $itemModel
            ]);
        }

        return $this->render('add_item', [
            'model' => $itemModel
        ]);
    }
}