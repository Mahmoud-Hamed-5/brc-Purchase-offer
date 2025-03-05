@extends('layouts.app')

<style>

    .top-buttons {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .button-link {
        display: inline-block;
        padding: 2px 2px;
        background-color: transparent;
        font-size: 0.9rem;
        color: #000000;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin: 1px;
        border: none;
        cursor: pointer;
    }

    .button-link:hover {
        background-color: #0056b3;
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
