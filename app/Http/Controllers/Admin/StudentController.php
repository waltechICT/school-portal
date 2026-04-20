<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Arm;
use App\Models\Role;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['students'] = Student::with(['schoolClass', 'arm', 'role'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['classes'] = SchoolClass::get();
        $data['arms'] = Arm::get();
        $data['roles'] = Role::where('is_enabled', 1)->get();
        return view('admin.student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'         => 'required|string|unique:students,student_id',
            'admission_no'       => 'required|string|unique:students,admission_no',
            'surname'            => 'required|string|max:50',
            'other_names'        => 'required|string|max:50',
            'class_id'           => 'required|exists:school_classes,id',
            'arm_id'             => 'required|exists:arms,id',
            'role_id'            => 'required|exists:roles,id',
            'sex'                => 'required|in:Male,Female',
            'date_of_birth'      => 'required|date',
            'guardian_name'      => 'required|string|max:50',
            'guardian_phone'     => 'required|string|max:20',
            'guardian_address'   => 'required|string',
            'guardian_occupation'=> 'required|string|max:50',
            'student_passport'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $student = new Student();
        $student->student_id          = $request->student_id;
        $student->admission_no        = $request->admission_no;
        $student->surname             = $request->surname;
        $student->other_names         = $request->other_names;
        $student->class_id            = $request->class_id;
        $student->arm_id              = $request->arm_id;
        $student->role_id             = $request->role_id;
        $student->sex                 = $request->sex;
        $student->date_of_birth       = $request->date_of_birth;
        $student->guardian_name       = $request->guardian_name;
        $student->guardian_phone      = $request->guardian_phone;
        $student->guardian_address    = $request->guardian_address;
        $student->guardian_occupation = $request->guardian_occupation;
        $student->is_enabled          = $request->is_enabled;

        if ($request->hasFile('student_passport')) {
            $image = $request->file('student_passport');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/students'), $imageName);
            $student->student_passport = 'uploads/students/' . $imageName;
        }

        $student->save();

        return redirect()->route('admin.students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['student'] = Student::with(['schoolClass', 'arm'])->findOrFail($id);
        return view('admin.student.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['student'] = Student::findOrFail($id);
        $data['classes'] = SchoolClass::get();
        $data['arms'] = Arm::get();
        $data['roles'] = Role::where('is_enabled', 1)->get();
        return view('admin.student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'student_id'         => 'required|string|unique:students,student_id,' . $id,
            'admission_no'       => 'required|string|unique:students,admission_no,' . $id,
            'surname'            => 'required|string|max:50',
            'other_names'        => 'required|string|max:50',
            'class_id'           => 'required|exists:school_classes,id',
            'arm_id'             => 'required|exists:arms,id',
            'role_id'            => 'required|exists:roles,id',
            'sex'                => 'required|in:Male,Female',
            'date_of_birth'      => 'required|date',
            'guardian_name'      => 'required|string|max:50',
            'guardian_phone'     => 'required|string|max:20',
            'guardian_address'   => 'required|string',
            'guardian_occupation'=> 'required|string|max:50',
            'is_enabled'         => 'required|boolean',
            'student_passport'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $student->student_id          = $request->student_id;
        $student->admission_no        = $request->admission_no;
        $student->surname             = $request->surname;
        $student->other_names         = $request->other_names;
        $student->class_id            = $request->class_id;
        $student->arm_id              = $request->arm_id;
        $student->role_id             = $request->role_id;
        $student->sex                 = $request->sex;
        $student->date_of_birth       = $request->date_of_birth;
        $student->guardian_name       = $request->guardian_name;
        $student->guardian_phone      = $request->guardian_phone;
        $student->guardian_address    = $request->guardian_address;
        $student->guardian_occupation = $request->guardian_occupation;
        $student->is_enabled          = $request->is_enabled;

        if ($request->hasFile('student_passport')) {
            // Delete old passport if it exists
            if ($student->student_passport && File::exists(public_path($student->student_passport))) {
                File::delete(public_path($student->student_passport));
            }

            $image = $request->file('student_passport');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/students'), $imageName);
            $student->student_passport = 'uploads/students/' . $imageName;
        }

        $student->save();

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        // Delete passport if it exists
        if ($student->student_passport && File::exists(public_path($student->student_passport))) {
            File::delete(public_path($student->student_passport));
        }

        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully.');
    }
}
