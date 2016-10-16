<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StudentFormRequest;
use App\Semester;
use App\Student;
use App\Http\Controllers\Controller;

/**
 * Class SemesterController
 * @package App\Http\Controllers\Backend
 */
class StudentController extends Controller
{

    /**
     * @var Student
     */
    private $students;

    /**
     * @var Semester
     */
    private $semesters;

    /**
     * StudentController constructor.
     * @param Student $students
     * @param Semester $semesters
     */
    public function __construct(Student $students, Semester $semesters)
    {
        $this->students = $students;
        $this->semesters = $semesters;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->students->all();

        return view('backend.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
        $semester_list = $this->semesters->pluck('name','id');

        return view('backend.students.form', compact('student','semester_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentFormRequest $request)
    {
        $this->students->create($request->all());

        return redirect(route('students.index'))->with('status', 'Student Record Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $semester_list = $this->semesters->pluck('name','id');

        $student = $this->students->find($id);

        return view('backend.students.form', compact('student','semester_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentFormRequest $request, $id)
    {
        $student = $this->students->find($id);

        $student->update($request->all());

        return redirect(route('students.index'))->with('status', 'Student Record Updated');
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
        return view('backend.students.confirm', compact('id'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $student = $this->students->find($id);

        $student->delete();

        return redirect(route('students.index'))->with('status', 'Student Record Deleted');
    }
}

