// $(function () {
//     get_memo_data();
// });

// function get_memo_data() {
//     $.ajax({
//         url: "memo_result/ajax/",
//         dataType: "json",
//         success: data => {
//             $("#memo-data")
//                 .find(".memo-visible")
//                 .remove();
//             for (var i = 0; i < data.comments.length; i++) {

//                 var html = `
//                 <div class="memo memo-visible">
                
//                         <div class="col-7 card text-dark bg-light mb-3" style="max-width: 18rem;">
//                             <div class="card-header d-flex justify-content-between align-items-center">
//                                 ${data.comments[i].created_at}
//                                 <a href="{{route('delete_memo', [$comment->id])}}"><button type="button" class="btn-close" disabled
//                                     aria-label="Close"></button></a></div>
//                             <div class="card-body">
//                                 <p class="card-text">${data.comments[i].comment}</p>
//                             </div>
//                         </div>
                  
//                 </div>
//                 `;

//                 $("#memo-data").append(html);
//             }
//         },
//         error: () => {
//             alert("ajax Error");
//         }
//     });

//     setTimeout("get_memo_data()", 5000);
// }

// // 追加
// $(function () {
//     // text = replace(/[\n\r]/g, "</br>")
//     $('#memo-btn').click(
//         function () {


//             var memo = $('#memo').memo().replace(/[\n\r]/g, "<br>");

//             $.ajax({
//                 url: 'post/',
//                 type: 'POST',
//                 dataType: 'json',
//                 data: { post: memo },
//                 timeout: 3000,
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//                 },
//             }).then(function (data) {
//                 memo = $('#memo').memo("");
//                 console.log(data);

//             }).fail(function (XMLHttpRequest, textStatus, errorThrown) {
//                 alert("error");
//             })
//         });
// });