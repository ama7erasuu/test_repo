<?php

namespace backend\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;


class MyController extends Controller
{
    public function actionTest()
    {
        return 'smth';
    }

}
