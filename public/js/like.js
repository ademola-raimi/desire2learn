$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.vote').on('click', function(e){
        e.preventDefault();
        var data = {
            isLike: $(this).find('i').hasClass('fa-thumbs-up')? true : false,
            user_id: $(this).data('user')
        }

        var videoId = $(this).attr('id');
        toggleLike(videoId, data, function (err, res) {
            if (err) {
                console.log('Error: '+ err);
            } else {
                console.log(res);
            }
        });
    });

    function toggleLike(videoId, data, cb){
        if (data.user_id == undefined) {
            return window.location.href = "/login";
        }

        $.ajax({
            method: 'POST',
            url: '/video/' + videoId + '/like',
            data: data,
            success: function (res) {
                cb(null,res);
                $('i.fa-thumbs-up').html(' ' + res.like);
                $('i.fa-thumbs-down').html(' '+ res.unlike)
            },
            error: function (err) {
                cb(err, null);
            }
        });
    }
});
