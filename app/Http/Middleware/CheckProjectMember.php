<?php

namespace CodeProject\Http\Middleware;

use Closure;
use CodeProject\Services\ProjectService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class CheckProjectMember
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
        $memberId = Auth::user()->getAuthIdentifier();
        $projectId = $request->project;

        if(!$this->service->isMember($projectId, $memberId)) {
            return new Response([
                'error'=>true,
                'message'=>'Access forbiden'
            ]);
        }

        return $next($request);
    }
}
