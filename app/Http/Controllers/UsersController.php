<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function archive() 
    {
        $user = User::where('id', $id = 1)->firstOrFail();
		$userCount = $user->count();
        echo (($userCount > 0) ? __('User ID :id exists', ['id' => $id]) : __('User ID :id does not exist', ['id' => $id])) . PHP_EOL;
        echo __('Archive user ID :id', ['id' => $id]) . PHP_EOL;
        $user->archive();
        $user = User::where('id', $id = 1)->first();
        echo (!empty($user) ? __('User ID :id exists', ['id' => $id]) : __('User ID :id does not exist', ['id' => $id])) . PHP_EOL;
        $user = User::where('id', $id = 1)->withArchived()->firstOrFail();
		$userCount = $user->count();
        echo (__('(Archived area)') . (($userCount > 0) ? __('User ID :id exists', ['id' => $id]) : __('User ID :id does not exist', ['id' => $id]))) . PHP_EOL;
    }
}
