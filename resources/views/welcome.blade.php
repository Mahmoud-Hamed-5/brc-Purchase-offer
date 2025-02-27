@extends('layouts.app')

<!-- Main Content -->
@section('content-body')
    <main id="main-content">



        <section id="about-component" class="about" style="display: block;">
            <x-about />
        </section>

        <section id="activity-component" class="about" style="display: none;">
            <x-activity />
        </section>

        <section id="management-component" class="about" style="display: none;">
            <x-management />
        </section>

        <section id="manager-component" class="about" style="display: none;">
            <x-manager />
        </section>
    </main>

    {{-- <div id="about-component" style="display: block;">
        <x-about />
    </div>

    <div id="activity-component" style="display: none;">
        <x-activity />
    </div> --}}

   
@endsection
