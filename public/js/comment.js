$(document).ready(function() {
    $('.comment-submit').on('click', function() {

        var comment = $('#new-comment-field').val();
        var avatar = $(this).data('avatar');
        var commentCount = parseInt($(this).data('comment-count')) + 1;
        var token = $(this).data('token');

        var url = '/comment';
        
        var user_id = $('#user_id').val();
        var videoId = $('#video_id').val();

        var data = {
            parameter: {
                _token: token,
                video_id: videoId,
                comment: comment
            }
        } 

        if (comment.length > 0) {
            //Process AJAX request
            $.ajax({
                url: url,
                type: 'POST',
                data: data.parameter,

                success: function(response) {

                    switch (response.status_code) {
                        case 200:

                            var newComment = '<div id="container">';
                            newComment += '<div class="row" style="margin-top: 2%; margin-left: 3.5%;">';
                            newComment += '<div class="col-sm-2">';
                            newComment += '<img src="' + avatar + '" alt="" class="img-circle" width="25px" height="25px" style="border-radius:25px;">';
                            newComment += '</div>';
                            newComment += '<div class="col-sm-10">';
                            newComment += '<div class="comment-body" style="margin-left: -8%; margin-top: 1%;" ';
                            newComment += 'data-comment-id="' + response.commentId + '">';
                            newComment += '<span> <strong>' + comment + '</strong>' + ', ' + 'Just now </span>';
                            //newComment += '<span>' + comment->created_at->diffForHumans() + '</span>';
                            // newComment += '<div class="update-actions pull-right">';
                            // newComment += '<a href="#" id="comment_action_caret" class="fa fa-bars no-style-link"></a>';
                            // newComment += '<div id="comment_actions" style="display:none">';
                            // newComment += '<a href="#" class="fa fa-pencil comment-action-edit no-style-link" ';
                            // newComment += 'data-commentId="' + response.commentId + '"></a>';
                            // newComment += '<a href="#" class="fa fa-trash comment-action-delete no-style-link" ';
                            // newComment += 'data-commentId="' + response.commentId + '"></a>';
                            // newComment += '</div>';
                            // newComment += '</div>';
                            newComment += '</div></div></div></div>';

                            $('.load_comment').last().append(newComment);
                            //Increase the count by 1 after submitting a comment
                            var count = $('#comment-count').html();
                            count = Number(count) + 1;

                            //Set this new value in the html
                            $('#comment-count').html(count);

                            //empty the comment field
                            $('#new-comment-field').val('');

                            break;

                        default:
                        return false;
                    } 
                }
            });
        }

        return false;
    });

});
