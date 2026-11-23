{{-- Shared Student form partial: used by both create and edit --}}
<x-students.form :student="$student ?? new \App\Models\Student()" />
