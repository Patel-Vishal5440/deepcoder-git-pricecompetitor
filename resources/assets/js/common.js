// if (document.querySelectorAll('.table_search').length) {
//     let searchTable = undefined;
//     $('.table_search').keyup(function () {
//         const table = this.dataset.table;
//         if (table) {
//             if (searchTable !== undefined) {
//                 clearTimeout(searchTable);
//             }
//             searchTable = setTimeout(function () {
//                 // $('#' + table).dataTable().fnDraw();
//                 $('#' + table).dataTable().api().draw();
//             }, 500);
//         }
//     });
// }

// $(document).on('click', '#delete', function (el) {
//     el.preventDefault();
//     $('#way_to_grave').attr('action', $(this).attr('href'));
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $('#way_to_grave').submit();
//         }
//     })
// });

// window.addEventListener('load', function () {
//     hidePageLoading();
// })
// export const showPageLoading=function  () {
//     document.body.classList.add('page-loading');
//     document.body.setAttribute('data-kt-app-page-loading', "on");
// }
// export const hidePageLoading= function  () {
//     document.body.classList.remove('page-loading');
//     document.body.removeAttribute('data-kt-app-page-loading');
// }
