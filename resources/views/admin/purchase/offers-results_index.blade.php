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
        @include('admin.purchase.partials.offer-result_editModal')

        <div dir="rtl">
            <div class="container mt-4">

                <div class="top-buttons">
                    <a href="{{ route('admin.offers_results.create_offer_result') }}" class="btn btn-primary"
                        style="margin-top: 10px;">{{ __('إضافة بيانات') }}</a>


                    <a href="{{ route('admin.dashboard.index') }}" class="btn btn-secondary"
                        style="margin-top: 10px;">{{ __('لوحة الإدارة') }}</a>

                    <a onclick="document.getElementById('logout-form').submit()" class="btn btn-danger"
                        style="margin-top: 10px;">{{ __('تسجيل خروج') }}</a>

                    <form hidden action="{{ route('admin.auth.logout') }}" method="POST" id="logout-form">
                        @csrf
                    </form>
                </div>

                <section>
                    <div class="card shadow-lg p-4">
                        <h2 class="text-center mb-4">{{ 'نتائج العروض' }}</h2>

                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ 'رقم الاعلان' }}</th>
                                    <th>{{ 'عنوان الاعلان' }}</th>
                                    <th> {{ 'حالة النشر' }} </th>
                                    <th>{{ 'ملف النتائح' }}</th>
                                    <th>{{ 'العمليات' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers_results as $offer_result)
                                    <tr>
                                        <td>{{ $offer_result->offer_number }}</td>
                                        <td>{{ $offer_result->title }}</td>
                                        <td>
                                            @if ($offer_result->publish_status)
                                                <span class="badge bg-success">{{ 'نشط' }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ 'متوقف' }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($offer_result->file)
                                                <a href="{{ asset($offer_result->file) }}" class="btn btn-primary btn-sm"
                                                    download>{{ 'تحميل' }}</a>
                                            @else
                                                <span class="text-muted">لا يوجد ملف</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="mt-1">
                                                <button class="btn btn-warning btn-sm"
                                                    onclick="editRecord({{ $offer_result->id }}, '{{ $offer_result->offer_number }}',
                                             '{{ $offer_result->title }}', '{{ $offer_result->publish_status }}')">
                                                    {{ 'تعديل' }}
                                                </button>
                                            </div>
                                            <div class="mt-1">
                                                <form
                                                    action="{{ route('admin.offers_results.delete_offer_result', $offer_result->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('هل أنت متأكد؟')">{{ 'حذف' }}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        function editRecord(id, offerNumber, title, publishStatus) {
            document.getElementById('editId').value = id;
            document.getElementById('editOfferNumber').value = offerNumber;
            document.getElementById('editTitle').value = title;

            // Set the publish status switch and label
            const publishStatusSwitch = document.getElementById('editPublishStatus');
            const publishStatusLabel = document.getElementById('editPublishStatusLabel');
            publishStatusSwitch.checked = publishStatus == 1 ? 1 : 0; // Set switch state
            publishStatusLabel.textContent = publishStatus == 1 ? 'نشط' : 'متوقف'; // Set label text


            editRoute =
                "{{ route('admin.offers_results.edit_offer_result', ['offer_result' => ':offerId']) }}";
            editRoute =
                editRoute.replace(':offerId', id);

            document.getElementById('editForm').action = editRoute;
            var editModal = new bootstrap.Modal(document.getElementById('offerResultEditModal'));
            editModal.show();
        }
    </script>
@endsection
