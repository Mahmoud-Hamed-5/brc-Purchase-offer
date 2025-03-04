  <!-- الهيدر -->
  <div>


      <header>
          {{-- <h1> {{__("شركة مصفاة بانياس")}} </h1> --}}
          {{-- <p>الريادة في صناعة الطاقة وتكرير النفط</p> --}}
      </header>

      <!-- القائمة -->
      <nav >
        <!-- Home Link -->
        <a href="{{ url('/') }}">الصفحة الرئيسية</a>

        <!-- About Link -->
        {{-- <a href="#about">عن الشركة</a> --}}

        <!-- Activities Dropdown -->
        <div class="navbar-nav">
            <li class="nav-item dropdown dropdown-user-profile">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                    <button type="button" class="btn btn-outline-light px-2">{{ 'عن الشركة' }}</button>
                </a>

                <div class="dropdown-menu text-center dropdown-menu-end">
                    <a class="dropdown-item text-center m-0 px-4 status"  onclick="load_content('about')">
                        <span>{{ 'من نحن' }}</span>
                    </a>

                    <a class="dropdown-item text-center m-0 px-4 status"  onclick="load_content('activity')">
                        <span>{{ 'الأنشطة' }}</span>
                    </a>

                    <a class="dropdown-item text-center m-0 px-4 status"  onclick="load_content('management')">
                        <span>{{ 'الهيكل الاداري' }}</span>
                    </a>

                    <a class="dropdown-item text-center m-0 px-4 status"  onclick="load_content('manager')">
                        <span>{{ 'المدير العام' }}</span>
                    </a>

                </div>
            </li>
        </div>

        <a href="{{ route('web.purchase_offers.index') }}">{{'الشراء المباشر'}}</a>

        <a href="{{ route('web.tenders.AR_index') }}">{{'الاعلانات الداخلية'}}</a>

        <a href="{{ route('web.tenders.EN_index') }}">{{'Tenders'}}</a>


        <!-- Contact Link -->
        <a href="#contact">اتصل بنا</a>
    </nav>

  </div>
