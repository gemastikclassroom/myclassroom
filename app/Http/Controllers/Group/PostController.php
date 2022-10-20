<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\CreateNewPostRequest;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function create(CreateNewPostRequest $request)
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

        if ($groupMember == null) {
            return response()->json([
                'code' => 400,
                'status' => 'bad request',
                'message' => 'Member not in group'
            ], 400);
        }

        $result = [
            'group_id' => $request->group_id,
            'member_id' => $request->member_id,
            'content' => $request->content,
            'attachment' => $request->attachment,
        ];

        // create post
        DB::table('group_posts')->insert($result);

        return response()->json([
            'code' => 201,
            'status' => 'success',
            'data' => $result,
        ], 201);
    }

    public function findPost($group_id, $post_id)
    {
        $group = Group::find($group_id);

        if ($group == null) {
            return response()->json([
                'code' => 404,
                'status' => 'not found',
                'message' => 'Group not found'
            ], 404);
        }

        $post = DB::table('group_posts')
            ->where('group_id', $group_id)
            ->where('id', $post_id)
            ->first();

        if ($post == null) {
            return response()->json([
                'code' => 404,
                'status' => 'not found',
                'message' => 'Post not found'
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'data' => $post
        ]);
    }

    public function findAllPost($id)
    {
        $group = Group::find($id);

        if ($group == null) {
            return response()->json([
                'code' => 404,
                'status' => 'not found',
                'message' => 'Group not found'
            ], 404);
        }

        $posts = DB::table('group_posts')
            ->where('group_id', $id)
            ->get();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'data' => $posts
        ]);
    }
}
