<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SemesterFormRequest;
use App\Semester;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class SemesterController
 * @package App\Http\Controllers\Backend
 */
class SemesterController extends Controller
{

    /**
     * @var Semester
     */
    private $semesters;

    /**
     * SemesterController constructor.
     * @param Semester $semesters
     */
    public function __construct(Semester $semesters)
    {
        $this->semesters = $semesters;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = $this->semesters->all();

        return view('backend.semesters.index', compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Semester $semester)
    {
        return view('backend.semesters.form', compact('semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemesterFormRequest $request)
    {
        $this->semesters->create($request->all());
        return redirect(route('semesters.index'))->with('status', 'Semester Record Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $semester = $this->semesters->find($id);
        return view('backend.semesters.form', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $semester = $this->semesters->find($id);
        $semester->update($request->all());
        return redirect(route('semesters.index'))->with('status', 'Semester Record Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @return Semester
     */
    public function confirm($id)
    {
        return view('backend.semesters.confirm', compact('id'));
    }

    public function destroy($id)
    {
        $semester = $this->semesters->find($id);
        $semester->delete();
        return redirect(route('semesters.index'))->with('status', 'Semester Record Updated');
    }
}

