<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 19/09/2017
 * Time: 08:35
 */

namespace CodeProject\Presenters;


use CodeProject\Transformers\ProjectNoteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectNotePresenter extends FractalPresenter
{
    function getTransformer() {
        return new ProjectNoteTransformer();
    }
}