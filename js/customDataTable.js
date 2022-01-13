$(document).ready( function () {
   $('#employeeData').DataTable({
      processing: true,
      serverSide: true,
      ajax: "fetch.php",
      columns: [
         {
            data: '1'
         }, {
            data: '2'
         }, {
            data: '3'
         }, {
            data: '4'
         }, {
            data: '5'
         }, {
            data: '6'
         }, {
            data: '7',
            render: (data) => {
               return '<img src="img/' + data + '" width="80px">'
            }
         }, {
            data: '0',
            render: (data) => {
               return '<a class="edit-btn" href="update.php?id=' + data + '">Edit</a>'
               + " || " + '<a class="del-btn" href=' + '?delete_id=' + data + '>Delete</a>'
            }
         }
      ]
   })
});