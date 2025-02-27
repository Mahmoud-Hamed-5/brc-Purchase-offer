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
        <div  dir="rtl">
            <div class="container mt-4">

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

@endsection
