@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">  
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>إضافة نشاط جديد للرحلة</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('activities.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="activity_name" class="form-label">اسم النشاط</label>
                    <input type="text" class="form-control" id="activity_name" name="name" placeholder="مثال: زيارة الأهرامات" required>
                </div>

                <div class="mb-3">
                    <label for="activity_time" class="form-label">وقت النشاط</label>
                    <input type="datetime-local" class="form-control" id="activity_time" name="activity_time" required>
                </div>

                <div class="mb-3">
                    <label for="activity_description" class="form-label">تفاصيل أو وصف النشاط</label>
                    <textarea class="form-control" id="activity_description" name="description" rows="3" placeholder="اكتب تفاصيل سريعة عن النشاط..."></textarea>
                </div>

                <button type="submit" class="btn btn-success">حفظ النشاط</button>
                <a href="#" class="btn btn-secondary">إلغاء</a>
            </form>
        </div>
    </div>
</div>

@endsection