$(function () {
    get_data();
});

// 表示
function get_data() {

    $.ajax({
        url: "result/ajax/",
        dataType: "json",
        success: data => {
            $("#comment-data")
                .find(".comment-visible")
                .remove();
            // console.log(data.comments);
            for (var i = 0; i < data.comments.length; i++) {
                var html = `
                    <div class="media comment-visible">
                        <div class="media-body comment-body">
                            <div class="row">
                                <span class="comment-body-user" id="name">${data.comments[i].name}</span>
                                <span class="comment-body-time" id="created_at">${data.comments[i].created_at}</span>
                            </div>
                            <span class="comment-body-content" id="comment">${data.comments[i].comment}</span>
                        </div>
                    </div>
                `;

                $("#comment-data").append(html);
            }
        },
        error: () => {
            alert("ajax Error");
        }
    });

    setTimeout("get_data()", 1000);
}

// 追加
$(function () {
    // text = replace(/[\n\r]/g, "</br>")
    $('#ajax-btn').click(
        function () {


            var val = $('#comment2').val().replace(/[\n\r]/g, "<br>");

            $.ajax({
                url: 'add/',
                type: 'POST',
                dataType: 'json',
                data: { comment : val },
                timeout: 3000,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).then(function (data) {
                val = $('#comment2').val("");
                console.log(data);

            }).fail(function (XMLHttpRequest, textStatus, errorThrown) {
                alert("error");
            })
        });
});