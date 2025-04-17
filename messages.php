<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>الرسائل</title>
  <link rel="icon" href="./images/logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style_hadith.css" />
  <link rel="stylesheet" href="assets/css/form_hadith.css">
  <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.5/b-3.0.2/r-3.0.2/rg-1.5.0/sc-2.4.1/sb-1.7.1/sp-2.3.1/datatables.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/rg-1.2.0/datatables.min.css" />

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/rg-1.2.0/datatables.min.js"></script>
  <style>
    .modal {
      width: 80rem;
    }
  </style>
</head>

<body>
  <?php
  include_once "count_number.php";
  ?>
  <!--Start Navbar -->
  <nav class="navbar">
    <div>
      <div class="bars"><i class="fas fa-bars"></i></div>
      <img src="./images/logo.png" alt="" class="logo" />
    </div>
    <div class="input-box">
      <div style="font-family:'Amiri', serif;">
        <h1> صلي على محمد ﷺ</h1>
      </div>
    </div>
    <div>
      <div class="mode"><i class="fas fa-moon"></i></div>
      <div class="avatar" title="تسجيل الخروج">
        <a href="login/logout.php">
          <div class="icon"><i class="fas fa-reply"></i></div>
        </a>
      </div>
    </div>
  </nav>
  <!-- Start Content  -->
  <div class="content">
    <!-- Side Bar -->
    <div class="sidebar">
      <a href="Dashboard_admin.php">
        <div class="sidebar-nav">
          <div class="icon"><i class="fas fa-tasks"></i></div>
          <span>المجموعات</span>
        </div>
      </a>
      <a href="Books.php">
        <div class="sidebar-nav">
          <div class="icon"><i class="fas fa-book"></i></div>
          <span>كتب</span>
        </div>
      </a>
      <a href="Doors.php">
        <div class="sidebar-nav">
          <div class="icon"><i class="fas fa-dungeon"></i></div>
          <span>أبواب</span>
        </div>
      </a>
      <a href="hadiths.php">
        <div class="sidebar-nav">
          <div class="icon"><i class="fas fa-scroll"></i></div>
          <span>أحاديث</span>
        </div>
      </a>
      <a href="Rawis.php">
        <div class="sidebar-nav">
          <div class="icon"><i class="fas fa-user"></i></div>
          <span>روات</span>
        </div>
      </a>
      <a href="Types.php">
        <div class="sidebar-nav">
          <div class="icon"><i class="fas fa-list"></i></div>
          <span>انواع</span>
        </div>
      </a>
      <a href="messages.php">
        <div class="sidebar-nav active">
          <div class="icon"><i class="fas fa-envelope"></i></div>
          <span>رسائل</span>
        </div>
      </a>

    </div>
    <div class="wrapper">
      <div class="row">
        <div class="box fanos">
          <img src="./images/fanos.svg" alt="" />
          <span class="fas fa-tasks"></span>
          <span><?php echo $numCollections ?></span>
          <span>المجموعات</span>
        </div>
        <div class="box">
          <img src="./images/zena.svg" alt="" />
          <span class="fas fa-book"></span>
          <span><?php echo $numBooks ?></span>
          <span>كتب</span>
        </div>
        <div class="box">
          <img src="./images/zena.svg" alt="" />
          <span class="fas fa-dungeon"></span>
          <span><?php echo $numDoors ?></span>
          <span>أبواب</span>
        </div>
        <div class="box">
          <img src="./images/fanos.svg" alt="" />
          <span class="fas fa-scroll"></span>
          <span><?php echo $numHadiths ?></span>
          <span>أحاديث</span>
        </div>
      </div>
      <div class="row">
        <div class="table">
          <div class="table-body table-responsive">
            <table id="messagesTable" class="display table-hover table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>معرف</th>
                  <th>الاسم</th>
                  <th>البريد الإلكتروني</th>
                  <th>الموضوع</th>
                  <th class="none">الرسالة</th>
                  <th>التاريخ</th>
                  <th>الإجراءات</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.5/b-3.0.2/r-3.0.2/rg-1.5.0/sc-2.4.1/sb-1.7.1/sp-2.3.1/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      loadMessages();
      $('#messagesTable').DataTable({
        language: {
          "emptyTable": "لا توجد بيانات متاحة في الجدول",
          "info": "عرض _START_ إلى _END_ من أصل _TOTAL_ سجل",
          "infoEmpty": "عرض 0 إلى 0 من أصل 0 سجل",
          "infoFiltered": "(تمت تصفيتها من مجموع _MAX_ مُدخل)",
          "lengthMenu": "عرض _MENU_ سجل لكل صفحة",
          "loadingRecords": "جارٍ التحميل...",
          "processing": "جارٍ المعالجة...",
          "search": "بحث:",
          "zeroRecords": "لم يتم العثور على سجلات مطابقة",
          "paginate": {
            "first": "الأول",
            "last": "الأخير",
            "next": "التالي",
            "previous": "السابق"
          },
          "aria": {
            "sortAscending": ": تفعيل لفرز العمود تصاعدياً",
            "sortDescending": ": تفعيل لفرز العمود تنازلياً"
          }
        }
      });
    });

    $.extend($.fn.dataTable.defaults, {
      responsive: true
    });
  </script>
  <script>
    $(document).ready(function() {
      loadMessages();


    });

    $.extend($.fn.dataTable.defaults, {
      responsive: true
    });
  </script>



  <script>
    $(document).on('click', '.btnDelete', function() {
      var id = $(this).data('id');
      if (confirm("هل أنت متأكد أنك تريد حذف هذا العنصر؟")) {
        $.ajax({
          url: 'delete_message.php',
          type: 'POST',
          data: {
            id: id
          },
          success: function(response) {
            loadMessages();
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      }
    });

    function loadMessages() {
      $.ajax({
        url: 'fetch_message_data.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          var table = $('#messagesTable').DataTable();
          table.clear().draw();
          table.rows.add(response.data).draw();
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }
  </script>




</body>

</html>