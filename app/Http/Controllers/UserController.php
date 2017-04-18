<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
use Auth;

class UserController extends Controller {

    //
    protected $redirectTo = '/login';

    public function showLogin() {
        return \View::make('auth/login');
    }

    public function postLogin(\App\Http\Requests\User\PostLogin $request) {

        /*  $user = User::where('email', $request->input('email'))
          ->where('password', bcrypt($request->input('password')))->first(); */
        $userdata = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
        );
        $user = Auth::user();
        if (Auth::attempt($userdata, true)) {
            return view('profile', ['user' => Auth::user()]);
        } else {
            return \View::make('auth/login');
        }
    }

    public function showRegister() {
        return \View::make('auth/register');
    }

    public function postRegister(\App\Http\Requests\User\PostRegister $request) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());


        $user = User::create([
                    'name' => $request->input('name'),
                    'surname' => $request->input('surname'),
                    'age' => $request->input('age'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'file' => $file->getClientOriginalName(),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password'))
        ]);

        $user = User::where('email', $request->input('email'))
                ->first();
        if ($user) {
            \Auth::login($user);
            return view('profile', ['user' => $user]);
        }
        return \Redirect::back();
    }

    public function showProfile() {
        $id = Auth::user()->id();
        $user = User::find($id);
        return view('profile', ['user' => Auth::user()]);
    }

    public function showEdit() {
        return view('edit', ['user' => Auth::user()]);
    }

    public function postEdit(\App\Http\Requests\User\PostEdit $request) {
        User::where('id', Auth::user()->id)
                ->update(['name' => $request->input('name'), 'surname' => $request->input('surname'),
                    'age' => $request->input('age'), 'phone' => $request->input('phone'),
                    'address' => $request->input('address'), 'email' => $request->input('email')]);
        return view('profile', ['user' => Auth::user()]);
    }

    public function showNotes() {
        $notes = Note::where('user_id', Auth::user()->id)->paginate(20);
        return view('notes', ['notes' => $notes, 'user' => Auth::user()]);
    }

    public function editNote(Request $request) {
        $note = Note::where('id', $request->input("note_id"))->first();
        return view('editnote', ['note' => $note]);
    }

    public function postEditNote(\App\Http\Requests\User\PostEditNote $request) {
        Note::where('id', $request->input("id"))
                ->update(['name' => $request->input('name'), 'text' => $request->input('text'), 'category' => $request->input('category')]);

        return redirect('user/notes');
    }

    public function deleteNote(Request $request) {
        Note::where('id', $request->input("note_id"))
                ->delete();

        return redirect('user/notes');
    }

    public function addNote(\App\Http\Requests\User\AddNote $request) {
        $id = Auth::user()->id;
        Note::create([
            'name' => $request->input('name'),
            'text' => $request->input('text'),
            'category' => $request->input('category'),
            'user_id' => $id,
            'active'=>$request->input('active'),
        ]);

        return redirect('user/notes');
    }

    public function getAll() {
        $notes = Note::with('user')->orderBy('updated_at', 'DESC')->paginate(20);
        return \View::make('getall', ['notes' => $notes]);

        //return redirect('user/notes');
    }

    public function logout() {
        Auth::logout();
        return \View::make('welcome');
    }

}
