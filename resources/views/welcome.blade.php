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

    <section id="contact" class="contact">

        <div class="contact-info">
            <h2>اتصل بنا</h2>

            <!-- Email -->
            <div class="contact-item">
                <i class="fa-solid fa-envelope contact-icon" style="color: darkred"></i>
                <p>
                    <a href="mailto:brc@brc.sy?subject=موضوع الايميل">راسلنا عبر البريد الالكتروني</a>
                </p>
            </div>

            <!-- Facebook -->
            <div class="contact-item">
                <i class="fa-brands fa-facebook contact-icon" style="color: blue"></i>
                <p>
                    <a href="http://www.facebook.com/Brc.sy" target="_blank">موقعنا على الفيسبوك</a>
                </p>
            </div>

            <!-- YouTube -->
            <div class="contact-item">
                <i class="fa-brands fa-youtube contact-icon" style="color: red"></i>
                <p>
                    <a href="https://www.youtube.com/channel/UCQbHkxoaopsrf_ZAd_ub-Kw" target="_blank">قناتنا على
                        اليوتيوب</a>
                </p>
            </div>

            <!-- Telephone -->
            <div class="contact-item">
                <i class="fa-solid fa-phone contact-icon" style="color: black"></i>

                <span style="color: red;">{{ 'هاتف:' }}</span>
                &nbsp;
                <p dir="ltr">
                    {{ '+963 43 7711100' }}
                </p>
            </div>

            <!-- Fax -->
            <div class="contact-item">
                <i class="fa-solid fa-fax contact-icon" style="color: green"></i>

                <span style="color: red;">{{ 'فاكس:' }}</span>
                &nbsp;
                <p dir="ltr">
                    {{ '+963 43 7712325' }}
                </p>

            </div>
        </div>

    </section>
@endsection
