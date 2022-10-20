<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\AddMemberToGroupRequest;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function add(AddMemberToGroupRequest $request)
    {
        $group = Group::find($request->group_id);

        if ($group == null) {
            return response()->json([
                'code' => 404,
                'status' => 'not found',
                'message' => 'Group not found'
            ], 404);
        }

        $member = User::find($request->member_id);

        if ($member == null) {
            return response()->json([
                'code' => 404,
                'status' => 'not found',
                'message' => 'Member not found'
            ], 404);
        }

        $groupMember = GroupMember::where('group_id', $request->group_id)
            ->where('member_id', $request->member_id)
            ->first();

        if ($groupMember != null) {
            return response()->json([
                'code' => 400,
                'status' => 'bad request',
                'message' => 'Member already in group'
            ], 400);
        }

        $result = [
            'group_id' => $request->group_id,
            'member_id' => $request->member_id,
            'role' => 'member'
        ];

        // create member
        DB::table('group_members')->insert($result);

        return response()->json([
            'code' => 201,
            'status' => 'success',
            'data' => $result,
        ], 201);
    }
}
