<?php


namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\ItemModel;
use app\core\components\ItemDisplay;


class ItemController extends Controller
{
    public function item(Request $request){

        $itemModel = new ItemModel();
        if ($request->isPost()){
            $itemModel->loadData($request->getBody());

            if ($itemModel->validate() && $itemModel->register()){
                Application::$app->response->redirect("/add-product");
            }else{
            }
          
            return $this->render('add_item', [
                'model' => $itemModel
            ]);
        }

        return $this->render('add_item', [
            'model' => $itemModel
        ]);
    }

    public function home(Request $request){


        $requestBody = $request->getBody();
        ItemDisplay::massDelete($requestBody);
        Application::$app->response->redirect("/");

      
    }

}