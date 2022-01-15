$(document).ready( function () {
   $('#employeeData').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
         url: "fetch.php",
         type: "POST"
       },
      columns: [
         {
            data: 'employee_id'
         }, {
            data: 'name'
         }, {
            data: 'email'
         }, {
            data: 'design_name'
         }, {
            data: 'contact'
         }, {
            data: 'blood_type'
         }, {
            data: 'photo',
            render: (data) => {
               return '<img src="img/' + data + '" width="80px">'
            }
         }, {
            data: 'id',
            render: (data) => {
               return '<a class="edit-btn" href="update.php?id=' + data + '">Edit</a>'
               + " || " + '<a class="del-btn" href=' + '?delete_id=' + data + '>Delete</a>'
            }
         }
      ]
   })
});