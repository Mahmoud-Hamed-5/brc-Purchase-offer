@extends('layouts.app')

<style>
    body {
        direction: rtl;
    }

    .top-buttons {
        display: flex;
        justify-content: end;
        align-items: center;
        /* Vertically center items */
        margin-bottom: 10px;
    }

    .top-buttons .btn {
        margin-top: 10px;
        /* Consistent margin for buttons */
    }

    .top-buttons .form-select {
        width: 150px;
        /* Consistent width for dropdowns */
    }
</style>

@section('content-body')
    <main>
        <div dir="rtl">
            <div class="container mt-4">

                <div class="top-buttons">
                    <a onclick="document.getElementById('logout-form').submit()" class="btn btn-danger"
                        style="margin-top: 10px;">{{ __('تسجيل خروج') }}</a>

                    <form hidden action="{{ route('admin.auth.logout') }}" method="POST" id="logout-form">
                        @csrf
                    </form>
                </div>

                <section id="management-board" class="management-board">

                    <div class="card shadow-lg p-4">
                        <h2 class="text-center mb-4"> {{ 'لوحة الإدارة' }} </h2>

                        <div class="mt-1">
                            <a href="{{ route('admin.purchase_offers.index') }}" class="btn btn-primary w-50 me-3"
                                style="margin-top: 10px;">{{ __('إدارة الشراء المباشر') }}
                            </a>
                        </div>

                        <div class="mt-1">
                            <a href="{{ route('admin.offers_results.index') }}" class="btn btn-success w-50 me-3"
                                style="margin-top: 10px;">{{ __('إدارة نتائج العروض') }}
                            </a>
                        </div>

                        <div class="mt-1">
                            <a href="{{ route('admin.tenders.index') }}" class="btn btn-secondary w-50 me-3"
                                style="margin-top: 10px;">{{ __('إدارة الاعلانات الداخلية والخارجية') }}
                            </a>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </main>
@endsection

@section('script')
@endsection
