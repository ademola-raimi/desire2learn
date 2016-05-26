$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.vote').on('click', function(e){
        e.preventDefault();
        var data = {
            isLike: $(this).find('i').hasClass('fa-thumbs-up'),
            user: $(this).data('user')
        }
        var videoId = $(this).attr('id');
        makeLikeAction(videoId, data);
    });

    function makeLikeAction(videoId, data){
        if (data.user == undefined) {
            return window.location.href = "/login";
        }
        $.ajax({
            method: 'POST',
            url: '/video/like/' + videoId,
            data: data,
        });
    }
   
});