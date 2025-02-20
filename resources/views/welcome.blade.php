<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>شركة مصفاة تكرير النفط</title>
  <style>
    /* التصميم العام */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      color: #333;
    }

    header {
      background-color: #004d99;
      color: white;
      padding: 20px;
      text-align: center;
    }

    nav {
      background-color: #0066cc;
      padding: 10px;
      text-align: center;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-size: 18px;
    }

    nav a:hover {
      text-decoration: underline;
    }

    .hero {
      background-image: url('refinery.jpg'); /* صورة خلفية للمصفاة */
      background-size: cover;
      background-position: center;
      height: 400px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
    }

    .hero h1 {
      font-size: 48px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .content {
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .content h2 {
      color: #004d99;
      font-size: 32px;
      margin-bottom: 20px;
    }

    .content p {
      font-size: 18px;
      line-height: 1.6;
    }

    .services {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }

    .service {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 30%;
      text-align: center;
    }

    .service h3 {
      color: #0066cc;
      font-size: 24px;
    }

    footer {
      background-color: #004d99;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }

    footer a {
      color: #ffcc00;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- الهيدر -->
  <header>
    <h1>شركة مصفاة تكرير النفط</h1>
    <p>الريادة في صناعة الطاقة وتكرير النفط</p>
  </header>

  <!-- القائمة -->
  <nav>
    <a href="#about">عن الشركة</a>
    <a href="#services">خدماتنا</a>
    <a href="#contact">اتصل بنا</a>
  </nav>

  <!-- قسم البطل -->
  <div class="hero">
    <h1>نحو مستقبل مستدام للطاقة</h1>
  </div>

  <!-- المحتوى الرئيسي -->
  <div class="content">
    <section id="about">
      <h2>عن الشركة</h2>
      <p>
        شركة مصفاة تكرير النفط هي إحدى الشركات الرائدة في مجال تكرير النفط وتوفير منتجات الطاقة عالية الجودة. نلتزم بأعلى معايير الجودة والسلامة لضمان تلبية احتياجات عملائنا.
      </p>
    </section>

    <section id="services">
      <h2>خدماتنا</h2>
      <div class="services">
        <div class="service">
          <h3>تكرير النفط</h3>
          <p>نقدم خدمات تكرير النفط باستخدام أحدث التقنيات لضمان الجودة والكفاءة.</p>
        </div>
        <div class="service">
          <h3>البتروكيماويات</h3>
          <p>تصنيع المنتجات البتروكيماوية لدعم الصناعات المختلفة.</p>
        </div>
        <div class="service">
          <h3>الطاقة المتجددة</h3>
          <p>نساهم في تطوير حلول الطاقة المتجددة لبناء مستقبل مستدام.</p>
        </div>
      </div>
    </section>

    <section id="contact">
      <h2>اتصل بنا</h2>
      <p>للاستفسارات أو طلب الخدمات، يرجى التواصل معنا عبر البريد الإلكتروني: <a href="mailto:info@refinery.com">info@refinery.com</a>.</p>
    </section>
  </div>

  <!-- الفوتر -->
  <footer>
    <p>جميع الحقوق محفوظة &copy; 2023 شركة مصفاة تكرير النفط</p>
    <p><a href="#privacy">سياسة الخصوصية</a> | <a href="#terms">الشروط والأحكام</a></p>
  </footer>

</body>
</html>
