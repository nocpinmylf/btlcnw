$(document).ready(() => {
  let id;
  // Get button clicked's id
  $('.item-group-btn.xoa').on('click', (event) => {
    id = event.target.id;
  });

  $.ajaxSetup ({
    cache: false
  });


  // Xoa
  $('.item-group').on('submit', (event) => {
    event.preventDefault();

    // Abort any pending request
    if($.ajax()) {
      $.ajax().abort();
    }

    $.ajax({
      type: "POST",
      url: "quanly.php",
      data: { pid: id },
      async: true,
      // beforeSend: () => {
      //   $('#danhsach').html("...");
      // }
    }).done((response) => {
      $('#quanly').html(response);
    });
  });

  // Tim kiem
  $("#timkiemForm").on('submit', (event) => {
    event.preventDefault();
    $.ajax({
      type: "GET",
      url: "quanly.php",
      data: { timkiem: $('#timkiem').val()},
      async: true
    }).done((response) => {
      $('#quanly').html(response);
    });
  });
});