<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function archive() 
    {
        $user = User::where('id', 1)->firstOrFail();
		$userCount = $user->count();
        echo (($userCount > 0) ? '使用者編號 1 存在' : '使用者編號 1 不存在') . PHP_EOL;
        echo '將使用者編號 1 進行封存' . PHP_EOL;
        $user->archive();
        $user = User::where('id', 1)->first();
        echo (!empty($user) ? '使用者編號 1 存在' : '使用者編號 1 不存在') . PHP_EOL;
        $user = User::where('id', 1)->withArchived()->firstOrFail();
		$userCount = $user->count();
        echo '（封存區）' . (($userCount > 0) ? '使用者編號 1 存在' : '使用者編號 1 不存在') . PHP_EOL;
    }
}
