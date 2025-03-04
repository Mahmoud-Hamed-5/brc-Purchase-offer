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

    .form-label {
        font-size: 1.1rem;
        font-weight: bold;
        color: darkblue;
    }

    /* Narrower form container */
    .narrow-form {
        max-width: 800px; /* Adjust the width as needed */
        margin: 0 auto; /* Center the form */
    }

    /* Make input fields narrower */
    .narrow-form .form-control,
    .narrow-form .form-select {
        max-width: 100%; /* Ensure inputs don't overflow */
    }

    /* Adjust spacing for smaller screens */
    @media (max-width: 768px) {
        .narrow-form {
            max-width: 100%; /* Full width on small screens */
            padding: 0 15px; /* Add some padding */
        }

        .date-row {
            flex-direction: column; /* Stack inputs vertically on small screens */
        }
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

            <div class="card shadow-lg p-4 mt-3 narrow-form"> <!-- Add narrow-form class here -->
                <h2 class="text-center mb-4"> {{'إضافة مواد أو أعمال'}} </h2>

                <form action="{{ route('admin.purchase_offers.store_offer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Offer Number -->
                    <div class="mb-3 w-25">
                        <label for="offerNumber" class="form-label"> {{'رقم الاعلان'}} </label>
                        <input type="text" id="offerNumber" name="offerNumber" class="form-control" required>
                    </div>

                    <div class="w-25 me-5">
                        <label for="publishStatus" class="form-label">{{ 'حالة النشر' }}</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="publishStatus" name="publishStatus" role="switch" checked value="1">
                            <label class="form-check-label" for="publishStatus" id="publishStatusLabel">
                                {{'نشط'}}
                            </label>
                        </div>
                    </div>

                    <!-- Material Type -->
                    <div class="mb-3 w-75">
                        <label for="materialType" class="form-label"> {{'نوع المواد أو الأعمال'}} </label>
                        <textarea id="materialType" name="materialType" class="form-control" placeholder="أدخل نوع المواد أو الأعمال" required rows="4"></textarea>
                    </div>

                    <!-- Ad Date and Close Date on the same line -->
                    <div class="mb-3 d-flex align-items-center gap-3 date-row">
                        <div class="flex-grow-1">
                            <label for="adDate" class="form-label"> {{'تاريخ الإعلان'}} </label>
                            <input type="date" id="adDate" name="adDate" class="form-control" required>
                        </div>
                        <div class="flex-grow-1">
                            <label for="closeDate" class="form-label"> {{'تاريخ الإغلاق'}} </label>
                            <input type="date" class="form-control" id="closeDate" name="closeDate" required>
                        </div>
                    </div>

                    <!-- File Upload -->
                    <div class="mb-3 w-50">
                        <label for="file" class="form-label">{{'نسخة عرض السعر'}}</label>
                        <input type="file" id="file" name="file" class="form-control" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">{{'إضافة'}}</button>
                </form>
            </div>
        </div>

    </div>
</main>
@endsection


<script>
    document.getElementById('publishStatus').addEventListener('change', function() {
        const publishStatusLabel = document.getElementById('publishStatusLabel');
        publishStatusLabel.textContent = this.checked ? 'نشط' : 'متوقف';
        this.value = this.checked ? '1' : '0';
    });
</script>
