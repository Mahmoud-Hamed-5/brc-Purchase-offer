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
        <div dir="rtl">
            <div class="container mt-4">

                <section>
                    <div class="card shadow-lg p-4">
                        <h2 class="text-center mb-4">{{ 'نتائج العروض السابقة' }}</h2>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ 'رقم الاعلان' }}</th>
                                        <th>{{ 'عنوان الاعلان' }}</th>
                                        <th>{{ 'ملف نتائج العرض' }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers_results as $offer_result)
                                        <tr>
                                            <td>{{ $offer_result->offer_number }}</td>
                                            <td>{{ $offer_result->title }}</td>
                                            <td>
                                                @if ($offer_result->file)
                                                    <a href="{{ asset($offer_result->file) }}" class="btn btn-primary btn-sm"
                                                        download>{{ 'تحميل' }}</a>
                                                @else
                                                    <span class="text-muted">{{ 'لا يوجد ملف' }}</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection

