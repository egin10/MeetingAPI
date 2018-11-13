<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Meeting;

class RegisterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate([
            'meeting_id' => 'required',
            'user_id' => 'required'
        ]);

        $meeting_id = $request->input('meeting_id');
        $user_id = $request->input('user_id');

        $meeting = Meeting::findOrFail($meeting_id);
        $user = User::findOrFail($user_id);

        $message = [
            'msg' => 'User is already registered for meeting',
            'user' => $user,
            'meeting' => $meeting,
            'unregister' => [
                'href' => 'api/v1/meeting/registration' . $meeting_id,
                'method' => 'DELETE'
            ]
        ];
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'it works!';
    }
}
