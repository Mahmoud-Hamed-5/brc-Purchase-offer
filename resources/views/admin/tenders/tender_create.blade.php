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

    .radio-group {
        display: flex;
        gap: 20px;
        font-family: Arial, sans-serif;
    }

    .radio-label {
        display: flex;
        align-items: center;
        cursor: pointer;
        position: relative;
        padding-left: 30px;
    }

    .radio-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .radio-custom {
        position: absolute;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #fff;
        border: 2px solid #ccc;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .radio-label:hover .radio-custom {
        border-color: #007bff;
    }

    .radio-input:checked~.radio-custom {
        background-color: #007bff;
        border-color: #007bff;
    }

    .radio-input:checked~.radio-custom::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 10px;
        height: 10px;
        background-color: #fff;
        border-radius: 50%;
    }

    .radio-text {
        margin-left: 10px;
        font-size: 16px;
        color: #333;
    }

    .form-switch .form-check-input {
        width: 3em !important;
        height: 1.5em !important;
        margin-left: 0 !important;
        cursor: pointer !important;
    }

    .form-switch .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
    }

    .form-switch .form-check-input:not(:checked) {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    /* Narrower form container */
    .narrow-form {
        max-width: 800px;
        /* Adjust the width as needed */
        margin: 0 auto;
        /* Center the form */
    }

    /* Make input fields narrower */
    .narrow-form .form-control,
    .narrow-form .form-select {
        max-width: 100%;
        /* Ensure inputs don't overflow */
    }

    /* Adjust spacing for smaller screens */
    @media (max-width: 768px) {
        .narrow-form {
            max-width: 100%;
            /* Full width on small screens */
            padding: 0 15px;
            /* Add some padding */
        }
    }
</style>

@section('content-body')
    <main>
        <div class="bg-light" dir="rtl">
            <div class="container mt-4">
                <div class="top-buttons">
                    <a href="{{ route('admin.tenders.index') }}" class="btn btn-success"
                        style="margin-top: 10px;">{{ __('عرض البيانات') }}</a>

                    <a href="{{ route('admin.dashboard.index') }}" class="btn btn-dark"
                        style="margin-top: 10px;">{{ __('لوحة الإدارة') }}</a>

                    <a onclick="document.getElementById('logout-form').submit()" class="btn btn-danger"
                        style="margin-top: 10px;">{{ __('تسجيل خروج') }}</a>

                    <form hidden action="{{ route('admin.auth.logout') }}" method="POST" id="logout-form">
                        @csrf
                    </form>
                </div>

                <section>
                    <div class="card shadow-lg p-4 mt-3 narrow-form"> <!-- Add narrow-form class here -->
                        <h2 class="text-center mb-4"> {{ 'إضافة إعلان جديد' }} </h2>

                        <form action="{{ route('admin.tenders.store_tender') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Tender Number and Tender Type on the same line -->
                            <div class="mb-3 d-flex align-items-center gap-5">
                                <div class="flex-grow-1 w-50">
                                    <label for="tenderNumber" class="form-label"> {{ 'رقم الاعلان' }} </label>
                                    <input type="text" class="form-control" id="tenderNumber" name="tenderNumber"
                                        required>
                                </div>
                                <div class="w-50">
                                    <label class="form-label"> {{ 'نوع الاعلان' }} </label>
                                    <div class="radio-group">
                                        <label class="radio-label">
                                            <input type="radio" id="tenderTypeInternal" name="tenderType" value="internal"
                                                class="radio-input">
                                            <span class="radio-custom"></span>
                                            <span class="radio-text"> {{ 'داخلي' }} </span>
                                        </label>
                                        <label class="radio-label">
                                            <input type="radio" id="tenderTypeExternal" name="tenderType" value="external"
                                                class="radio-input">
                                            <span class="radio-custom"></span>
                                            <span class="radio-text"> {{ 'خارجي' }} </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Tender Title -->
                            <div class="mb-3">
                                <label for="tenderTitle" class="form-label">{{ 'موضوع الاعلان' }}</label>
                                <input type="text" class="form-control" id="tenderTitle" name="tenderTitle" required>
                            </div>

                            <!-- Tender Details as Textarea -->
                            <div class="mb-3">
                                <label for="tenderDetails" class="form-label">{{ 'تفاصيل الاعلان' }}</label>
                                <textarea class="form-control" id="tenderDetails" name="tenderDetails" rows="4" required></textarea>
                            </div>

                            <!-- Bond Cost and Currency -->
                            <div class="mb-3 d-flex align-items-center gap-3">
                                <div class="flex-grow-1">
                                    <label for="bondCost" class="form-label"> {{ 'التأمينات الأولية' }} </label>
                                    <input type="number" class="form-control" id="bondCost" name="bondCost" required>
                                </div>
                                <div>
                                    <label for="bondCurrency" class="form-label"> {{ 'العملة' }} </label>
                                    <select class="form-select" id="bondCurrency" name="bondCurrency" required>
                                        <option value="SYP">{{ 'ل.س' }}</option>
                                        <option value="USD">{{ 'دولار' }}</option>
                                        <option value="EUR">{{ 'يورو' }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tender Cost and Currency -->
                            <div class="mb-3 d-flex align-items-center gap-3">
                                <div class="flex-grow-1">
                                    <label for="tenderCost" class="form-label"> {{ 'قيمة دفتر الشروط' }} </label>
                                    <input type="number" class="form-control" id="tenderCost" name="tenderCost" required>
                                </div>
                                <div>
                                    <label for="tenderCurrency" class="form-label"> {{ 'العملة' }} </label>
                                    <select class="form-select" id="tenderCurrency" name="tenderCurrency" required>
                                        <option value="SYP">{{ 'ل.س' }}</option>
                                        <option value="USD">{{ 'دولار' }}</option>
                                        <option value="EUR">{{ 'يورو' }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Close Date and Publish Status Switch -->
                            <div class="mb-3 d-flex align-items-center gap-5">
                                <!-- Close Date -->
                                <div class="flex-grow-1 w-50">
                                    <label for="closeDate" class="form-label"> {{ 'تاريخ الإغلاق' }} </label>
                                    <input type="date" class="form-control" id="closeDate" name="closeDate"
                                        value="{{ now()->toDateString() }}" required>
                                </div>

                                <!-- Publish Status Switch -->
                                <div class="w-25 me-5">
                                    <label for="publishStatus" class="form-label">{{ 'حالة النشر' }}</label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="publishStatus"
                                            name="publishStatus" role="switch" checked value="1">
                                        <label class="form-check-label" for="publishStatus" id="publishStatusLabel">
                                            {{ 'نشط' }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ 'المرفقات' }}</label>
                                <button type="button" class="btn btn-success mb-2" onclick="addFileInput()">
                                    <span class="h3">{{ ' + ' }}</span>
                                </button>
                                <div id="file-list"></div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">إضافة</button>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </main>

    <script>
        document.getElementById('publishStatus').addEventListener('change', function() {
            const publishStatusLabel = document.getElementById('publishStatusLabel');
            publishStatusLabel.textContent = this.checked ? 'نشط' : 'متوقف';
            this.value = this.checked ? '1' : '0';
        });
    </script>

    <script>
        function addFileInput() {
            const fileInputContainer = document.getElementById("file-list");
            const fileInputWrapper = document.createElement("div");
            fileInputWrapper.classList.add("d-flex", "align-items-center", "mb-2");

            const fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.name = "attachments[]"; // Array input for multiple files
            fileInput.classList.add("form-control", "w-50", "me-3");
            fileInput.style.marginLeft = "10px";

            const removeButton = document.createElement("button");
            removeButton.type = "button";
            removeButton.classList.add("btn", "btn-danger");
            removeButton.textContent = "X";
            removeButton.onclick = function() {
                fileInputWrapper.remove();
            };

            fileInputWrapper.appendChild(fileInput);
            fileInputWrapper.appendChild(removeButton);
            fileInputContainer.appendChild(fileInputWrapper);
        }
    </script>
@endsection
