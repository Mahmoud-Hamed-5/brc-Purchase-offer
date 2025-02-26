@extends('layouts.app')

<style>
    body {
        direction: rtl;
    }

    .top-buttons {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
</style>

@section('content-body')
<main>
    <div class="bg-light" dir="rtl">
        <div class="container mt-4">
            <div class="top-buttons">
                <a href="{{ route('admin.purchase_offers.index') }}" class="btn btn-secondary"
                    style="margin-top: 10px;">{{ __('عرض البيانات') }}</a>

                <a onclick="document.getElementById('logout-form').submit()" class="btn btn-danger"
                    style="margin-top: 10px;">{{ __('تسجيل خروج') }}</a>

                <form hidden action="{{ route('admin.auth.logout') }}" method="POST" id="logout-form">
                    @csrf
                </form>
            </div>


            <div class="card shadow-lg p-4 mt-3">
                <h2 class="text-center mb-4">إضافة مواد أو أعمال</h2>

                <form action="{{route('admin.purchase_offers.store_offer')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    
                    <div class="mb-3">
                        <label for="offerNumber" class="form-label">رقم الاعلان</label>
                        <input type="text" id="offerNumber" name="offerNumber" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="materialType" class="form-label">نوع المواد أو الأعمال</label>
                        <textarea id="materialType" name="materialType" class="form-control" placeholder="أدخل نوع المواد أو الأعمال" required
                            rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="adDate" class="form-label">تاريخ الإعلان</label>
                        <input type="date" id="adDate" name="adDate" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="closeDate" class="form-label">تاريخ الإغلاق</label>
                        <input type="date" class="form-control" id="closeDate" name="closeDate" required>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">نسخة عرض السعر</label>
                        <input type="file" id="file" name="file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">إضافة</button>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</main>
@endsection
