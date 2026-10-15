<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::all();

        return view('academic-years.index', compact('academicYears'));
    }

    public function create()
    {
        return view('academic-years.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validation($request);

        $academicYear = new AcademicYear();
        $academicYear->start_year = $validated['start_year'];
        $academicYear->end_year = $validated['end_year'];
        $academicYear->save();

        return redirect()->route('academic-year.index');
    }

    public function edit(AcademicYear $academicYear)
    {
        if ($this->hasRelatedData($academicYear)) {
            return redirect()
                ->route('academic-year.index')
                ->with(
                    'error',
                    'You cannot edit this academic year because it has related data.'
                );
        }

        return view('academic-years.edit', [
            'academicYear' => $academicYear,
        ]);
    }

    public function update(Request $request, AcademicYear $academicYear)
    {
        if ($this->hasRelatedData($academicYear)) {
            return redirect()
                ->route('academic-year.index')
                ->with(
                    'error',
                    'You cannot edit this academic year because it has related data.'
                );
        }

        $validated = $this->validation($request, $academicYear->id);

        $academicYear->start_year = $validated['start_year'];
        $academicYear->end_year = $validated['end_year'];
        $academicYear->save();

        return redirect()->route('academic-year.index');
    }

    private function validation(
        Request $request,
        ?int $academicYearId = null
    ): array {
        $uniqueRule = Rule::unique('academic_years', 'start_year')
            ->where('end_year', $request->input('end_year'));

        if ($academicYearId !== null) {
            $uniqueRule->ignore($academicYearId);
        }

        $validated = $request->validate([
            'start_year' => [
                'required',
                'integer',
                $uniqueRule,
            ],
            'end_year' => [
                'required',
                'integer',
            ],
        ]);

        if (!$this->dataValidation(
            (int) $validated['start_year'],
            (int) $validated['end_year']
        )) {
            throw ValidationException::withMessages([
                'end_year' =>
                    'The end year must be exactly one year after the start year.',
            ]);
        }

        return $validated;
    }

    private function dataValidation(
        int $startYear,
        int $endYear
    ): bool {
        return $endYear === $startYear + 1;
    }

    private function hasRelatedData(AcademicYear $academicYear): bool
    {
        $hasSessions = DB::table('class_sessions')
            ->where('academic_year_id', $academicYear->id)
            ->exists();

        $hasTeachers = DB::table('center_teacher')
            ->where('academic_year_id', $academicYear->id)
            ->exists();

        return $hasSessions || $hasTeachers;
    }
}
