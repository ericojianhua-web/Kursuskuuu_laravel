<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Participant;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{
    // Menampilkan daftar pendaftaran
    public function index()
    {
        $enrollments = Enrollment::with([
            'participant',
            'course'
        ])->latest()->get();

        return view('enrollments.index', compact('enrollments'));
    }

    // Menampilkan formulir pendaftaran
    public function create()
    {
        $participants = Participant::orderBy('name')->get();

        // Hanya menampilkan kursus yang berstatus open
        $courses = Course::where('status', 'open')
            ->orderBy('name')
            ->get();

        return view('enrollments.create', compact(
            'participants',
            'courses'
        ));
    }

    // Menyimpan data pendaftaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'participant_id' => [
                'required',
                'exists:participants,id',
            ],

            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('enrollments', 'course_id')
                    ->where('participant_id', $request->participant_id),
            ],
        ], [
            'participant_id.required' => 'Peserta wajib dipilih.',
            'course_id.required' => 'Kursus wajib dipilih.',
            'course_id.unique' => 'Peserta sudah terdaftar pada kursus ini.',
        ]);

        Enrollment::create([
            'participant_id' => $validated['participant_id'],
            'course_id' => $validated['course_id'],
            'status' => 'registered',
        ]);

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Pendaftaran kursus berhasil!');
    }
}
