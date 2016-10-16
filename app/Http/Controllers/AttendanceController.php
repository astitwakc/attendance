<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

/**
 * Class AttendanceController
 * @package App\Http\Controllers
 */
class AttendanceController extends Controller
{
    /**
     * @var Student
     */
    private $student;

    /**
     * AttendanceController constructor.
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')->where('semester_id', '=', 2)->get();

        return view('attendance.index',compact('students'));
    }

   public function firstSemester()
   {
       $students = DB::table('students')->where('semester_id', '=', 2)->get();

       return view('attendance.first_sem',compact('students'));
   }

}
