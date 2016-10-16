<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleFormRequest;
use App\Role;

/**
 * Class SemesterController
 * @package App\Http\Controllers\Backend
 */
class RoleController extends Controller
{

    /**
     * @var Semester
     */
    private $roles;

    /**
     * SemesterController constructor.
     * @param Semester $roles
     */
    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roles->all();

        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        return view('backend.roles.form', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleFormRequest $request)
    {
        $this->roles->create($request->all());

        return redirect(route('roles.index'))->with('status', 'Role Record Created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = $this->roles->find($id);

        return view('backend.roles.form', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleFormRequest $request, $id)
    {
        $role = $this->roles->find($id);

        $role->update($request->all());

        return redirect(route('roles.index'))->with('status', 'Role Record Updated');
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
        return view('backend.roles.confirm', compact('id'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $role = $this->roles->find($id);

        $role->delete();

        return redirect(route('roles.index'))->with('status', 'Role Record Updated');
    }
}

