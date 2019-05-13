$(document).ready(function () {
    $('.rewiew-btn').click(function(e){
        e.preventDefault();
        $this = $(this);
        $buttonContent = $this.attr('data-value');

        switch($buttonContent){
            case 'yes':
                $this.html('Thank You for your feedback');
                $this.next().text('no');
            break;
            case 'no':
                $this.html('Thank You for your feedback');
                $this.prev().text('yes');
            break;
        }

    })
});
