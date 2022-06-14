<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class SearchForm extends Model
{
    public $username;
    public $email;
    public $subject;

}