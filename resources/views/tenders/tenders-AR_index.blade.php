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
                    <h2 class="text-center mb-4"> {{'الاعلانات الداخلية'}} </h2>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th> {{'رقم الإعلان'}} </th>
                                <th> {{'موضوع الإعلان'}} </th>
                                <th> {{'تفاصيل / شرح'}} </th>

                                <th> {{'التأمينات الأولية'}} </th>
                                <th> {{'قيمة دفتر الشروط'}} </th>
                                <th> {{'موعد الإغلاق'}} </th>
                                <th> {{'المرفقات'}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            <x-tenders-tableContent :tenders="$tenders" :noFilesMessage="'لا يوجد مرفقات'" />
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')

@endsection
