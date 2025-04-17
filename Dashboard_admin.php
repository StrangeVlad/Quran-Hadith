<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>المجموعات</title>
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
      border-radius: 0;
      padding: 2rem;
      height: auto;
      width: 34rem;
    }

    .submit {
      margin-bottom: 1.5rem;
    }

    a {
      color: inherit;
      /* Inherit text color from parent */
      text-decoration: none;
      /* Remove underline */
      cursor: pointer;
      /* Change cursor to pointer on hover */
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
      <div class="avatar" title="Logout">
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
        <div class="sidebar-nav active">
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
      <button type=" button" data-bs-toggle="#" data-bs-target="#modalBackground" id="addButton" class="button f-width notification add-reminder">
        أضف مجموعة جديدة
      </button>

      <div class="row">
        <div class="table">
          <div class="table-body table-responsive">
            <table id="collectionTable" class="display  table-hover table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>رقم المجموعة</th>
                  <th>اسم المجموعة</th>
                  <th>اسم المجموعة بالانجليزية</th>
                  <th>مؤلف</th>
                  <th>المؤلفالإنجليزية</th>
                  <th class="none">وصف</th>
                  <th>أجراءات</th>
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
        <h1>أضف مجموعة جديدة</h1>
        <button id="closeButton" class="close-button">×</button>
      </div>
      <!-- Form -->
      <form id="saveCollectionForm" class="form" method="post">
        <div class="row">
          <!-- Form fields -->
          <div class="col-6">
            <div class="input-field">
              <input placeholder="اسم المجموعة بالعربية" type="text" class="input" name="collection_name_ab" id="collection_name_ab" autocomplete="off" autocapitalize="on" required />
            </div>
          </div>
          <div class="col-6">
            <div class="input-field">
              <input placeholder="اسم المجموعة بالإنجليزية" type="text" class="input" name="collection_name_en" id="collection_name_en" autocomplete="off" autocapitalize="on" required />
            </div>
          </div>
          <div class="col-6">
            <div class="input-field">
              <input placeholder="اسم الكاتب بالعربية" type="text" class="input" name="Author_name_ab" id="Author_name_ab" autocomplete="off" autocapitalize="on" required />
            </div>
          </div>
          <div class="col-6">
            <div class="input-field">
              <input placeholder="اسم الكاتب بالإنجليزية" type="text" class="input" name="Author_name_en" id="Author_name_en" autocomplete="off" autocapitalize="on" required />
            </div>
          </div>
          <div class="full-width col-lg-12">
            <div class="input-field">
              <textarea placeholder="الوصف بالإنجليزية" class="input col-12" name="des_collection_En" placeholder="" required id="des_collection_En"></textarea>
            </div>
          </div>
          <div class="full-width col-lg-12">
            <div class="input-field">
              <input class="submit col-12" value="إنشاء" type="submit" />
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!--/ End Form -->
  </div>
  </div>
  <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.5/b-3.0.2/r-3.0.2/rg-1.5.0/sc-2.4.1/sb-1.7.1/sp-2.3.1/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/modal_popup.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#collectionTable").DataTable({
        'serverSide': true,
        'processing': true,
        'paging': true,
        'pageLength': 4,
        'order': [],
        'responsive': true,
        language: {
          searchPlaceholder: 'ابحث',
          lengthMenu: 'اظهر _MENU_ ادخالات',
          info: 'اظهار _START_ الى _END_ من اجمالي _TOTAL_ مدخلات',

          paginate: {
            previous: 'السابق',
            next: 'التالي'
          },
          aria: {
            search: 'بحث:'
          },
          search: 'بحث:',

        },
        'ajax': {
          'url': 'fetch_collection_data.php',
          'type': 'post',
          'data': {}
        },

        'fnCreatedRow': function(nRow, aData, iDataIndex) {
          $(nRow).attr('CollectionID', aData[0]);
        },
        'columnDefs': [{
          'targets': 5,
          'render': function(data, type, row, meta) {
            if (type === 'display') {
              return '<div style="white-space: normal;">' + data + '</div>'; // Apply word wrapping
            }
            return data;
          }
        }]
      });

    });
    $('.dt-search label').text('بحث:');

    $.extend($.fn.dataTable.defaults, {
      responsive: true
    });
  </script>
  <script type="text/javascript">
    $('#saveCollectionForm').submit(function(event) {
      event.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url: 'save_collection.php',
        type: 'POST',
        data: formData,
        success: function(response) {
          console.log(response);
          $('#collectionTable').DataTable().ajax.reload();
          $('#modalBackground').fadeOut();
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });

    $.extend($.fn.dataTable.defaults, {
      responsive: true
    });
  </script>
  <script>
    $(document).on('click', '.btnDelete', function() {
      var id = $(this).data('id');
      if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
          url: 'delete_collection.php',
          type: 'POST',
          data: {
            id: id
          },
          success: function(response) {
            console.log(response);
            $('#collectionTable').DataTable().ajax.reload();
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