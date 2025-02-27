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


        <!-- Contact Link -->
        <a href="#contact">اتصل بنا</a>
    </nav>


           {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                عن الشركة <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" onclick="load_home('activity.html')" href="#"><i class="fa fa-bar-chart"></i> الأنشطة </a></li>
                <li><a class="dropdown-item" onclick="load_home('management.html')" href="#"><i class="fa fa-fw fa-university"></i> الهيكل الاداري </a></li>
                <li><a class="dropdown-item" onclick="load_home('manager.html')" href="#"><i class="fa fa-fw fa-address-card-o"></i> المدير العام </a></li>
                <li><a class="dropdown-item" onclick="load_home('documents.html')" href="#"><i class="fa fa-fw fa-file-excel-o"></i> الوثائق المطلوبة للتعيين </a></li>
            </ul>
        </li> --}}
  </div>
