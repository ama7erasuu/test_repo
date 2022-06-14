<?php

namespace frontend\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use frontend\models\SearchForm;
use frontend\models\Project;
use yii\httpclient\Client;
use yii\data\Pagination;



class MyController extends Controller
{
    public function actionTest()
    {
        $model= new Project;
        return  $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionSearch()
    {
        $model= new Project;
        $searching= Yii::$app->request->post()['Project']['name'];
        $query=Project::find()->where(['like','name',$searching]);
        $countQuery = clone $query;
        if ($countQuery->count()<1){
            $client = new Client();
             $response = $client->createRequest()
             ->setMethod('GET')
             ->setUrl(['https://api.github.com/search/repositories', 'q' => $searching])
             ->setHeaders(['User-Agent' => 'project'])
             ->send();
             if ($response->isOk) {
             
                $items=$response->getData()['items'];
                foreach ($items as $value){
                    $model= new Project;
                    $model->name=$value['name'];
                    $model->author=$value['owner']['login'];
                    $model->link=$value['html_url'];
                    $model->stargazers=$value['stargazers_count'];
                    $model->watchers=$value['watchers_count'];
                    $model->save();
                }
        
            }
        }
        $pagination = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return  $this->render('search', compact('models','pagination','searching'));
    }

    // через Postman 
public function actionApi()
{
    $requestParams = Yii::$app->getRequest()->getBodyParams();
foreach($requestParams as $value){
$parametr=$value;
}
        $query=Project::find()->where(['like','name',$parametr]);
        $countQuery = clone $query;
        if ($countQuery->count()<1){
            $client = new Client();
             $response = $client->createRequest()
             ->setMethod('GET')
             ->setUrl(['https://api.github.com/search/repositories', 'q' => $parametr])
             ->setHeaders(['User-Agent' => 'project'])
             ->send();
             if ($response->isOk) {
                $items=$response->getData()['items'];
                foreach ($items as $value){
                    $model= new Project;
                    $model->name=$value['name'];
                    $model->author=$value['owner']['login'];
                    $model->link=$value['html_url'];
                    $model->stargazers=$value['stargazers_count'];
                    $model->watchers=$value['watchers_count'];
                    $model->save();
                }
        
            }
        }
        $pagination = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return  $response;
    }

}
