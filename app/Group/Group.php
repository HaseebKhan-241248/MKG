<?php

namespace App\Group;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'title',
        'description',
        'group_books',
        'status',
        'type',
    ];

    public static function saveOrUpdateGroup($request)
    {
        request()->validate([
            'title'       => 'required|unique:groups',            
        ]);
       Group::create([
        'title'        => $request->title,
        'description'  => $request->description,
        'status'       => $request->status,
        'group_books'  => $request->group_books,
        'type'         => 1,
       ]);
       return [
           'message' => "Group Saved Successfully!",
       ];
    }
}
