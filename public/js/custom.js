$(document).ready(function () {

    //Setting up functions
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.rewiew-btn').click(function(e){
        e.preventDefault();
        $this = $(this);
        $buttonContent = $this.attr('data-value');

        switch($buttonContent){
            case 'yes':
                $this.html('Thank You for your feedback');
                $this.next().text('no');
                url = '/dashboard/review/' + $this.attr('data-id') + '/upvote';
                updateProjectStatus(url)
            break;
            case 'no':
                $this.html('Thank You for your feedback');
                $this.prev().text('yes');
                url = '/dashboard/review/' + $this.attr('data-id') + '/downvote';
                updateProjectStatus(url)
            break;
        }

    })

    function updateProjectStatus(api_endpoint) {
        $.ajax({
            type: 'GET',
            url: api_endpoint,
            success: function (data) {
                //Do nothing
            },
            error: function (data) {
                //Do nothing
            }
        });
    }

    $('.rewiew-btn.reply-review').click(function(e){
        e.preventDefault();
        $('.review-comment.comment-box').css({display:'block'});
    });

    $('.country').change(function(e){
        orderValue = $(this).val();
        var country = $("<input>")
            .attr("type", "hidden")
            .attr("name", "country").val("yes");
        var filterorder = $("<input>")
            .attr("type", "hidden")
            .attr("name", "order").val(orderValue);
        $('#order-result').append(country).append(filterorder);
        $('#order-result select').remove();
        $('#order-result').submit();
    });

    $('input[type=radio]').click(function(){
        $('#average').html(calculateCulmulative('input[type=radio]:checked'));
    });

    function calculateCulmulative(selector){
        var starsCulmulativeValue = 0;
        $(selector).each(function () {
            starsCulmulativeValue += parseInt($(this).val(), 10);
        });
        starsCulmulativeValue = (starsCulmulativeValue * 2) / 5;
        return starsCulmulativeValue;
    }

    $('#review-form').submit(function(e){
        var score = $("<input>")
            .attr("type", "hidden")
            .attr("name", "score").val(calculateCulmulative('input[type=radio]:checked'));
        $(this).append(score);
    });

    $('input[type=checkbox]').click(function () {
        var stars = $("<input>")
            .attr("type", "hidden")
            .attr('class', 'stars-selector')
            .attr("name", "stars").val(getStarFilters('input[type=checkbox]:checked'));

        $('#order-result .stars-selector').remove();
        $('#order-result').append(stars);
    });

    function getStarFilters(selector) {
        var starsCulmulativeValue = [];
        $(selector).each(function (e) {
            starsCulmulativeValue.push($(this).attr('value'));
        });
        return starsCulmulativeValue;
    }

#});
