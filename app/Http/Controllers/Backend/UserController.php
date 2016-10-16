<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StudentFormRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Role;
use App\User;

/**
 * Class SemesterController
 * @package App\Http\Controllers\Backend
 */
class UserController extends Controller
{

    /**
     * @var User
     */
    private $users;

    /**
     * @var Role
     */
    private $roles;

    /**
     * UserController constructor.
     * @param User $users
     * @param Role $roles
     */
    public function __construct(User $users, Role $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->all();

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $role_list = $this->roles->pluck('name','id');

        return view('backend.users.form', compact('user','role_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        $this->users->create($input);

        return redirect(route('users.index'))->with('status', 'User Record Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role_list = $this->roles->pluck('name','id');

        $user = $this->users->find($id);

        return view('backend.users.form', compact('user','role_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {

        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        $user = $this->users->find($id);

        $user->update($input);

        return redirect(route('users.index'))->with('status', 'User Record Updated');
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
        return view('backend.users.confirm', compact('id'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = $this->users->find($id);

        $user->delete();

        return redirect(route('users.index'))->with('status', 'User Record Deleted');
    }
}

