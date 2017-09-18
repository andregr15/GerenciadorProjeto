<?php

namespace CodeProject\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use CodeProject\Services\ProjectService;

class CheckProjectOwner
{

    /**
     * @var ProjectService
     */
    private $service;

    function __construct(ProjectService $service){

        $this->service = $service;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ownerId = Auth::user()->getAuthIdentifier();
        $projectId = $request->project;

        if(!$this->service->isOwner($projectId, $ownerId)) {
            return new Response([
                'error'=>true,
                'message'=>'Access forbiden'
            ]);
        }

        return $next($request);
    }
}
