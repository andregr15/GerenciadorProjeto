<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 19/09/2017
 * Time: 08:53
 */

namespace CodeProject\Presenters;


use CodeProject\Transformers\ClientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ClientPresenter extends FractalPresenter
{
    function getTransformer(){
        return new ClientTransformer();
    }
}