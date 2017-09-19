<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 19/09/2017
 * Time: 08:42
 */

namespace CodeProject\Presenters;


use CodeProject\Transformers\ProjectTaskTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectTaskPresenter extends FractalPresenter
{
    function getTransformer(){
        return new ProjectTaskTransformer();
    }
}