<?php
// I've left this controller here mostly for posterity. During development
// I experimented with a traditional web CRUD flow to understand how Laravel
// worked.

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ActivitiesController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $activities = Auth::user()->activities()->with('user')->get();
        return view('activities.index', compact('activities'));
    }

    /**
     * @param Activity $activity
     * @param Request $request
     * @return View
     */
    public function edit(Activity $activity, Request $request)
    {
        if ($request->user()->id !== $activity->user->id) {
            throw new AccessDeniedHttpException('Nope, piss off');
        }

        return view('activities.activity', compact('activity'));
    }

    public function update(Activity $activity, Request $request)
    {
        $activity->update($request->all());

        return redirect()->route('activities');
    }

    /**
     * @return View
     */
    public function add()
    {
        return view('activities.add');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $request->user()->addActivity(new Activity($request->all()));

        return redirect()->route('activities');
    }

    /**
     * @param Activity $activity
     * @return RedirectResponse
     */
    public function delete(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities');
    }
}
