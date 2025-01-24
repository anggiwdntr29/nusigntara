<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alfabet;
use App\Models\Lessons;
use App\Models\LessonSaved;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function index(): JsonResponse
    {
        $lessons = Lessons::with('alfabet')->paginate(10);
        $response = $lessons->map(function ($lesson) {
            return [
                'id' =>  $lesson->id,
                'alfabet' => $lesson->alfabet->alfabet ?? null,
                'lessons' => $lesson->text_indo,
            ];
        });

        return response()->json([
            'data' => $response,
            'pagination' => [
                'total' => $lessons->total(),
                'per_page' => $lessons->perPage(),
                'current_page' => $lessons->currentPage(),
                'last_page' => $lessons->lastPage(),
            ]
        ]);
    }

    public function saveLesson(Request $request): JsonResponse
    {
        $id_user = Auth::guard('api')->id();

        $validator = Validator::make($request->all(), [
            'id_lessons' => 'required|exists:lessons,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
        
        $existingLesson = LessonSaved::where('id_user', $id_user)
            ->where('id_lessons', $request->id_lessons)
            ->first();

        if ($existingLesson) {
            return response()->json([
                'message' => 'You have already saved this lesson',
            ], 200);
        }

        $savedLesson = LessonSaved::create([
            'id_user' => $id_user,
            'id_lessons' => $request->id_lessons,
        ]);

        return response()->json([
            'message' => 'Lesson saved successfully',
        ]);
    }
}
