<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\PromotionKey;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    /**
     * Define custom validation messages once so they can be reused.
     */
    private array $customMessages = [
        'student_ids.required'     => 'Please select at least one student.',
        'student_ids.array'        => 'The selected students must be in a valid format.',
        'student_ids.min'          => 'Please select at least one student.',
        'student_ids.*.exists'     => 'One or more of the selected students do not exist in the system.',
        'target_class_id.required' => 'Please select a target class.',
        'target_class_id.exists'   => 'The selected target class is invalid.',
    ];

    public function index(Request $request)
    {
        $data['classes']       = SchoolClass::where('is_enabled', '1')->orderBy('name')->get();
        $data['selectedClass'] = $request->query('class_id');
        $data['students']      = collect();

        if ($data['selectedClass']) {
            $data['students'] = Student::with(['schoolClass', 'arm'])
                ->where('class_id', $data['selectedClass'])
                ->orderBy('surname')
                ->get();
        }

        return view('admin.student.promote.index', $data);
    }

    public function promote(Request $request)
    {
        // 1. Manually check validation rules
        $validator = Validator::make($request->all(), [
            'student_ids'     => 'required|array|min:1',
            'student_ids.*'   => 'exists:students,id',
            'target_class_id' => 'required|exists:school_classes,id',
        ], $this->customMessages);

        // 2. If it fails, redirect back with your custom 'error' session message
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $updated = Student::whereIn('id', $request->student_ids)
            ->where('is_promoted', 0)
            ->update([
                'class_id'    => $request->target_class_id,
                'is_promoted' => 1,
            ]);

        $skipped = count($request->student_ids) - $updated;
        $message = "{$updated} student(s) promoted successfully.";
        
        if ($skipped > 0) {
            $message .= " {$skipped} student(s) skipped (already promoted this session).";
        }

        return redirect()->route('admin.promote.index')->with('success', $message);
    }

    public function demote(Request $request)
    {
        // 1. Manually check validation rules
        $validator = Validator::make($request->all(), [
            'student_ids'     => 'required|array|min:1',
            'student_ids.*'   => 'exists:students,id',
            'target_class_id' => 'required|exists:school_classes,id',
        ], $this->customMessages);

        // 2. If it fails, redirect back with your custom 'error' session message
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $updated = Student::whereIn('id', $request->student_ids)
            ->update([
                'class_id'    => $request->target_class_id,
                'is_promoted' => 0,
            ]);

        return redirect()->route('admin.promote.index')->with('success', "{$updated} student(s) demoted successfully.");
    }
    
    public function keyGeneratePage()
    {
        $keys = PromotionKey::latest()->get();
        return view('admin.student.promote.key', compact('keys'));
    }

    public function generateKey()
    {
        $key = Str::random(10);
        PromotionKey::create([
            'key' => $key,
            'is_used' => false
        ]);

        return redirect()->back()->with('success', 'Promotion key generated successfully: ' . $key);
    }

    public function initiatePromotion(Request $request)
    {      
        $promoKey = PromotionKey::where('key', $request->key)->where('is_used', false)->first();

        if (!$promoKey) {
            return redirect()->back()->with('error', 'Invalid promotion key.');
        }

        $students = Student::where('is_promoted', 1)->get();

        foreach ($students as $student) {
            $student->is_promoted = 0;
            $student->save();
        }

        $promoKey->is_used = true;
        $promoKey->save();

        return redirect()->route('admin.promote.index')->with('success', 'Promotion initiated successfully.');

    }

    public function deleteKey($id)
    {
        $key = PromotionKey::findOrFail($id);
        $key->delete();
        return redirect()->back()->with('success', 'Promotion key deleted successfully.');
    }
}