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
    public function index()
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

    public function detailLesson($id)
    {
        $lesson = Lessons::find($id);

        if (!$lesson) {
            return response()->json([
                'message' => 'Lesson not found'
            ], 404);
        }

        $lesson->image = $lesson->image ? env('APP_HOST_NAME') . '/storage/images/' . $lesson->image : null;
        $lesson->video_sibi = $lesson->video_sibi ? env('APP_HOST_NAME') . '/storage/videos/' . $lesson->video_sibi : null;
        $lesson->video_bisindo = $lesson->video_bisindo ? env('APP_HOST_NAME') . '/storage/videos/' . $lesson->video_bisindo : null;
        $lesson->video_asl = $lesson->video_asl ? env('APP_HOST_NAME') . '/storage/videos/' . $lesson->video_asl : null;

        return response()->json([
            'data' => $lesson
        ]);
    }



    public function saveLesson(Request $request)
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

    public function search(Request $request)
    {
        $searchQuery = $request->query('lesson', '');

        $lessons = Lessons::where('text_indo', 'LIKE', "{$searchQuery}%") 
                            ->select('id', 'text_indo')
                            ->orderBy('text_indo', 'asc')
                            ->get();

        if ($lessons->isEmpty()) {
            return response()->json([
                'message' => 'Data tidak ada'
            ], 404);
        }

        return response()->json($lessons);
    }

    public function filter(Request $request)
    {
        $filter = $request->query('alfabet');

        $lessonsQuery = Lessons::with('alfabet');

        if ($filter) {
            $lessonsQuery->whereHas('alfabet', function($query) use ($filter) {
                $query->where('alfabet', $filter);
            });
        }

        $lessons = $lessonsQuery->get();

        $response = $lessons->map(function ($lesson) {
            return [
                'lessons' => $lesson->text_indo,
                'alfabet' => $lesson->alfabet->alfabet,
            ];
        });

        if ($lessons->isEmpty()) {
            return response()->json([
                'message' => 'Data tidak ada'
            ], 404);
        }

        return response()->json($response);
    }

    public function mySaved(Request $request)
    {
        $id_user = Auth::guard('api')->id();
    
        $mySavedLessons = LessonSaved::where('id_user', $id_user)
            ->with(['lessons:id,text_indo']) 
            ->get();
    
        if ($mySavedLessons->isEmpty()) {
            return response()->json([
                'message' => 'No saved lessons found'
            ], 404);
        }
    
        $result = $mySavedLessons->map(function ($savedLesson) {
            return $savedLesson->lessons;
        });
    
        return response()->json([
            'data' => $result
        ]);
    }
    


}
