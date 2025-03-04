@extends('layouts.app')

<style>

    .top-buttons {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
</style>

@section('content-body')
    <main>
        <div dir="ltr">
            <div class="container mt-4">

                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4"> {{ 'Tenders' }} </h2>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th> {{ 'Tender Number' }} </th>
                                <th> {{ 'Subject' }} </th>
                                <th> {{ 'Additional Information' }} </th>
                                <th> {{ 'Temporary Bid Bond' }} </th>
                                <th> {{ 'Tender\'s Cost' }} </th>
                                <th> {{ 'Dead Line' }} </th>
                                <th> {{ 'Attachments' }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            <x-tenders-tableContent :tenders="$tenders" :noFilesMessage="'No Attachments'" />
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
@endsection
