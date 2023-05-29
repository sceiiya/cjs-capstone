// $(document).ready(()=>{
//     $(document).ready(function() {
//         // Get the form element
//         const newApllicant = $('#createEmployeeForm');

//         // Add a submit event listener to the form
//         newApllicant.on('submit', function(e) {
//             // Prevent the default form submission
//             e.preventDefault();

//             // Perform AJAX request
//             const formData = newApllicant.serialize();
//             const url = newApllicant.attr('action');
//             const method = newApllicant.attr('method');

//             $.ajax({
//                 url: url,
//                 type: method,
//                 data: formData,
//                 dataType: 'json',
//                 headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
//                 success: function(data) {
//                     // Handle the response data
//                     console.log(data);
//                     // You can perform additional actions based on the response,
//                     // such as displaying success messages or updating the UI.

//                     // Clear the form
//                     form.trigger('reset');
//                 },
//                 error: function(xhr, status, error) {
//                     // Handle any error that occurred during the request
//                     console.error(error);
//                 }
//             });
//         });
//     });
// })