<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\AddMemberToGroupRequest;
use App\Http\Requests\Group\CreateGroupRequest;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return response()->json($groups);
    }

    public function findById($id)
    {
        $group = Group::find($id);

        if ($group == null) {
            return response()->json([
                'code' => 404,
                'status' => 'not found',
                'message' => 'Group not found'
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'data' => $group
        ]);
    }

    public function create(CreateGroupRequest $request)
    {
        $member = User::find($request->member_id);

        if ($member == null) {
            return response()->json([
                'code' => 404,
                'status' => 'not found',
                'message' => 'Member not found'
            ], 404);
        }

        $group = Group::create($request->all());

        $result = [
            'group_id' => $request->group_id,
            'member_id' => $request->member_id,
            'role' => 'owner'
        ];

        DB::table('group_members')->insert($result);

        return response()->json([
            'code' => 201,
            'status' => 'success',
            'data' => $group
        ], 201);
    }

    public function delete($id)
    {
        // TODO: add authentication
        $group = Group::find($id);

        if ($group == null) {
            return response()->json([
                'code' => 404,
                'status' => 'not found',
                'message' => 'Group not found'
            ], 404);
        }
        
        $group->delete();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Group deleted'
        ]);
    }
}
