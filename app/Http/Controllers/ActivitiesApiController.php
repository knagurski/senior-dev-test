<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Exceptions\ApiException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ActivitiesApiController extends Controller
{
    /**
     * @return Activity[]
     */
    public function index()
    {
        // get all activities for the user
        return Auth::user()->activities()->get();
    }

    /**
     * @param Request $request
     * @return Activity
     */
    public function create(Request $request)
    {
        $this->validate($request, ['subject' => 'required']);

        // create a new activity and add it to the user
        return Auth::user()->addActivity(
            new Activity($request->all())
        );
    }

    /**
     * @param Activity $activity
     * @return Activity
     */
    public function read(Activity $activity)
    {
        // check that the user owns this activity
        if (!$activity->user->is(Auth::user())) {
            throw new UnauthorizedException('Forbidden', 403);
        }

        return $activity;
    }

    /**
     * @param Activity $activity
     * @param Request $request
     * @return Activity
     */
    public function update(Activity $activity, Request $request)
    {
        // check that the user owns this activity
        if (!$activity->user->is(Auth::user())) {
            throw new UnauthorizedException('Forbidden', 403);
        }

        // make sure we have a subject to fill
        $this->validate($request, ['subject' => 'required']);

        // update the Activity
        $activity->update($request->all());

        return $activity;
    }

    /**
     * @param Activity $activity
     * @return array
     */
    public function delete(Activity $activity)
    {
        // check that the user owns this activity
        if (!$activity->user->is(Auth::user())) {
            throw new UnauthorizedException('Forbidden', 403);
        }

        // soft delete the activity and return the result
        return ['deleted' => $activity->delete()];
    }
}
