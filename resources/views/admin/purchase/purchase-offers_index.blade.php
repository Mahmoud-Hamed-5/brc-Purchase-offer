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
        @include('admin.purchase.partials.purchase-offer_editModal')

        <div class="bg-light" dir="rtl">
            <div class="container mt-4">

                <div class="top-buttons">
                    <a href="{{ route('admin.purchase_offers.create_offer') }}" class="btn btn-secondary"
                        style="margin-top: 10px;">{{ __('إضافة بيانات') }}</a>

                    <a onclick="document.getElementById('logout-form').submit()" class="btn btn-danger"
                        style="margin-top: 10px;">{{ __('تسجيل خروج') }}</a>

                    <form hidden action="{{ route('admin.auth.logout') }}" method="POST" id="logout-form">
                        @csrf
                    </form>
                </div>


                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4">عرض المواد أو الأعمال</h2>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>الرقم المتسلسل</th>
                                <th>نوع المواد أو الأعمال</th>
                                <th>تاريخ الإعلان</th>
                                <th>تاريخ الإغلاق</th>
                                <th>نسخة عرض السعر</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase_offers as $purchase_offer)
                                <tr>
                                    <td>{{ $purchase_offer->offer_number }}</td>
                                    <td>{{ $purchase_offer->material_type }}</td>
                                    <td>{{ $purchase_offer->ad_date }}</td>
                                    <td>{{ $purchase_offer->close_date }}</td>
                                    <td>
                                        @if ($purchase_offer->file)
                                            <a href="{{ asset($purchase_offer->file) }}" class="btn btn-primary btn-sm"
                                                download>تحميل</a>
                                        @else
                                            <span class="text-muted">لا يوجد ملف</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"
                                            onclick="editRecord({{ $purchase_offer->id }}, '{{ $purchase_offer->offer_number }}', '{{ $purchase_offer->material_type }}', '{{ $purchase_offer->ad_date }}', '{{ $purchase_offer->close_date }}')">تعديل</button>
                                        <form
                                            action="{{ route('admin.purchase_offers.delete_offer', $purchase_offer->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        function editRecord(id, offerNumber, materialType, adDate, closeDate) {
            document.getElementById('editId').value = id;
            document.getElementById('editOfferNumber').value = offerNumber;
            document.getElementById('editMaterialType').value = materialType;
            document.getElementById('editAdDate').value = adDate;
            document.getElementById('editCloseDate').value = closeDate;

            editRoute =
                "{{ route('admin.purchase_offers.edit_offer', ['purchase_offer' => ':offerId']) }}";
            editRoute =
                editRoute.replace(':offerId', id);

            document.getElementById('editForm').action = editRoute;
            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        }
    </script>
@endsection
