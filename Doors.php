<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>الأبواب</title>
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
        <h1>صلي على محمد ﷺ</h1>
      </div>
    </div>
    <div>
      <div class="mode"><i class="fas fa-moon"></i></div>
      <div class="avatar" title="تسجيل خروج">
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
        <div class="sidebar-nav active">
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
          <span>أنواع</span>
        </div>
      </a>
      <a href="messages.php">
        <div class="sidebar-nav">
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
      <button type="button" data-bs-toggle="#" data-bs-target="#modalBackground" id="addButton" class="button f-width notification add-reminder">
        أضف باب جديد
      </button>
      <div class="row">
        <div class="col-md-6">
          <label for="collection"></label>
          <select id="collection">
            <option value="">اختر المجموعة</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="book"></label>
          <select id="book">
            <option value="">اختر الكتاب</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="table">
          <div class="table-body table-responsive">
            <table id="doorTable" class="display table-hover table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>رقم الباب</th>
                  <th>رقم الباب</th>
                  <th>الوصف بالعربي</th>
                  <th>الوصف بالإنجليزي</th>
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
  <div id="modalBackground" class="modal-background">
    <div id="modal" class="modal">
      <div class="modal-header">
        <h1>إضافة باب جديد</h1>
        <button id="closeButton" class="close-button">×</button>
      </div>
      <!-- Form -->
      <form id="saveDoorForm" class="form" method="post">
        <div class="row">
          <div class="col-6">
            <div class="input-field">
              <select class="input" name="select_collection" id="select_collection" required>
                <option value="">اختر المجموعة أولاً</option>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="input-field">
              <select class="input" name="select_book" id="select_book" required>
                <option value="">جاري التحميل ...</option>
              </select>
            </div>
          </div>
          <div class="full-width col-lg-12">
            <div class="input-field">
              <input placeholder="رقم الباب" type="number" class="input col-12" name="door_number" id="door_number" autocomplete="off" autocapitalize="on" required />
            </div>
          </div>
          <div class="full-width col-lg-12">
            <div class="input-field">
              <textarea placeholder="الوصف بالعربي" class="input col-12" name="des_door_Ab" placeholder="" required id="des_door_Ab"></textarea>
            </div>
          </div>
          <div class="full-width col-lg-12">
            <div class="input-field">
              <textarea placeholder="الوصف بالإنجليزي" class="input col-12" name="des_door_En" placeholder="" required id="des_door_En"></textarea>
            </div>
          </div>
          <div class="full-width col-lg-12">
            <div class="input-field">
              <input class="submit col-12" value="إنشاء" type="submit" />
            </div>
          </div>
        </div>
      </form>

      <!--/ End Form -->
    </div>
  </div>
  <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.5/b-3.0.2/r-3.0.2/rg-1.5.0/sc-2.4.1/sb-1.7.1/sp-2.3.1/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/modal_popup.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: 'get_collection.php',
        type: 'GET',
        success: function(response) {
          $('#collection').html(response);
          $('#select_collection').html(response);
        }
      });

      $('#collection').change(function() {
        var collectionID = $(this).val();
        $.ajax({
          url: 'get_books.php',
          type: 'POST',
          data: {
            collectionID: collectionID
          },
          success: function(response) {
            $('#book').html(response);
          }
        });
      });

      $('#select_collection').change(function() {
        var collectionID = $(this).val();
        $.ajax({
          url: 'get_books.php',
          type: 'POST',
          data: {
            collectionID: collectionID
          },
          success: function(response) {
            $('#select_book').html(response);
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#book').change(function() {
        var bookID = $(this).val();

        $.ajax({
          url: 'fetch_door_data.php',
          type: 'POST',

          data: {
            bookID: bookID
          },
          dataType: 'json',
          success: function(response) {
            var table = $('#doorTable').DataTable();
            table.clear().draw();
            table.rows.add(response.data).draw();
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      });

      $.extend($.fn.dataTable.defaults, {
        responsive: true,
        language: {
          searchPlaceholder: 'ابحث',
          lengthMenu: 'اظهر _MENU_ إدخالات',
          info: 'إظهار _START_ إلى _END_ من إجمالي _TOTAL_ إدخالات',
          infoEmpty: 'عرض 0 إلى 0 من إجمالي 0 إدخالات',
          emptyTable: 'لا توجد بيانات متاحة في الجدول',
          loadingRecords: 'جارٍ التحميل...',
          processing: 'جارٍ المعالجة...',
          search: 'بحث:',
          zeroRecords: 'لم يتم العثور على نتائج مطابقة',
          paginate: {
            first: 'الأول',
            last: 'الأخير',
            next: 'التالي',
            previous: 'السابق'
          },
          aria: {
            sortAscending: ': تفعيل لفرز العمود تصاعدياً',
            sortDescending: ': تفعيل لفرز العمود تنازلياً'
          }
        }
      });
    });
  </script>
  <script type="text/javascript">
    $('#saveDoorForm').submit(function(event) {
      event.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url: 'save_door.php',
        type: 'POST',
        data: formData,
        success: function(response) {
          console.log(response);
          closeModal();
          $('#doorTable').DataTable().ajax.reload();
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });

    function closeModal() {
      modal.classList.remove("show");
      modalBackground.style.display = "none";
    }
  </script>

  <script>
    $(document).on('click', '.btnDelete', function() {
      var id = $(this).data('id');
      if (confirm("هل أنت متأكد أنك تريد حذف هذا البند؟")) {
        $.ajax({
          url: 'delete_door.php',
          type: 'POST',
          data: {
            id: id
          },
          success: function(response) {
            console.log(response);
            var table = $('#doorTable').DataTable();
            table.clear().draw();
            $.ajax({
              url: 'fetch_door_data.php',
              type: 'POST',
              data: {
                bookID: $('#book').val()
              },
              dataType: 'json',
              success: function(response) {
                table.rows.add(response.data).draw();
              },
              error: function(xhr, status, error) {
                console.error(xhr.responseText);
              }
            });
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      }
    });
  </script>
</body>

</html>